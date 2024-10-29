<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Product;
use App\Models\Category;
use function Aws\filter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductView;
use App\Models\Slider;
use App\Http\Resources\ProductResource;
use App\Http\Requests\Web\FavoriteRequest;
use App\Http\Resources\FavouritesResource;
use App\Http\Resources\Home\ProductResource as PR;
use App\Models\Favorite;
use App\Services\Product\Favorite\FavoriteService;
use App\Services\Response\ApiResponseService;
use App\Http\Resources\Home\SliderResource;

class ProductController extends Controller
{
    private $take = 20;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::withDescriptionApp();
        $filter = $this->filter($request, $query);
        $sliders = Slider::withDescription([84,85,86])->get();

        $products = $filter['products'];
        $max_price = $filter['max_price'];
        $data['products'] = PR::collection($products);
        $data['pagination'] = [
            'total' => $products->total(),
            'per_page' => $products->perPage(),
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
            'from' => $products->firstItem(),
            'to' => $products->lastItem(),
        ];
        $data['max_price']= $max_price;
        $data['sliders'] = SliderResource::collection($sliders);
        return $data;
    }
    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $product_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = $this->take;
        if ($request->title) {
            $array = explode(' ', $request->title);

            $query->where(function ($query) use ($array) {
                foreach ($array as $one) {
                    $query->orWhere(function ($query) use ($one) {
                        $query->where('ad.name', 'LIKE', '%' . $one . '%')
                            ->orWhere('products.sku_code', 'LIKE', '%' . $one . '%')
                            ->where('ad.language_id', currentLanguage()->id);
                    });
                }
            });
        }
        if ($request->sku) {
            $query->Where('products.sku_code', 'LIKE', '%' . $request->sku . '%');
        }
        if ($request->category_id) {
            $category_ids = [];
            if (is_array($request->category_id)) {
                foreach ($request->category_id as $row) {
                    array_push($category_ids, $row);
                    $category = Category::find($row);
                    if (is_null($category->category_id)) {
                        $ids = Category::where('category_id', $row)->pluck('id')->toArray();
                        $category_ids = array_merge($category_ids, $ids);
                    }
                }
            } else {
                array_push($category_ids, $request->category_id);
                $ids = Category::where('category_id', $request->category_id)->pluck('id')->toArray();
                $category_ids = array_merge($category_ids, $ids);
            }

            $query->whereIn('products.category_id', $category_ids);
            
        }
        if ($request->model && $request->category) {
            $query->where('products.category_id', $request->model);
        } elseif ($request->category) {
            $category_ids = [];
            array_push($category_ids, $request->category);
            $ids = Category::where('category_id', $request->category)->pluck('id')->toArray();
            $category_ids = array_merge($category_ids, $ids);
            $query->whereIn('products.category_id', $category_ids);
        }
        if ($request->max_price || $request->min_price) {
            $query->where('products.cost', '>=', $request->min_price)->where('products.cost', '<=', $request->max_price);
        }
        if ($request->start_date) {
            $query->whereDate('products.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('products.created_at', '<=', $request->end_date);
        }
        if($request->priceBy)
        {
            $query->orderBy('products.cost',$request->priceBy);
        }
        if ($request->orderBy) {
            
        } else{
            $query->orderBy('products.id', 'DESC');
        }

        $max_price = $query->clone()->max('products.cost');




        $products = $query->latest()->paginate($paginate);

        return [
            'products' => $products,
            'max_price' => $max_price,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show($id,Request $request)
    {
        $product = Product::withDescription()->with([
            'photos',
            'items' => function ($query) {
                $query->with('details');
            },
            'points' => function ($query) {
                $query->with('details');
            },
            'sections' => function ($query) {
                $query->with('details');
            },
            'tags' => function ($query) {
                $query->with('details');
            },
            'category' => function ($query) {
                $query->with('details');
            },
        ])
            ->where('products.id', $id)
            ->first();
        $releated_products = Product::withDescription()
            ->where('products.id', '!=', $id)
            ->where('products.category_id', $product->category_id)
            ->take(4)->get();
        $random_products = Product::withDescription()->where('products.only_offer','no')
            ->where('products.id', '!=', $id)
            ->inRandomOrder()
            ->paginate(4);
        $view_products = [];
        if ($request->user('sanctum')) {
            $ids = ProductView::where('user_id', $request->user('sanctum')->id)->pluck('product_id')->toArray();
            if (count($ids) == 0) {
                $ids = ['0'];
            }
            $view_products = Product::withDescription()->where('products.only_offer','no')
                ->whereRaw("products.id IN (" . implode(',', $ids) . ")")
                ->orderByRaw("field(products.id," . implode(',', $ids) . ")")
                ->where('products.id', '!=', $id)
                ->limit(5)->orderBy('id', 'DESC')
                ->get();
            ProductView::create([
                'product_id' => $product->id,
                'user_id' => $request->user('sanctum')->id
            ]);
        }
        $data['product'] = new ProductResource($product);
        $data['releated_products'] = PR::collection($releated_products);
        $data['random_products'] = PR::collection($random_products);
        $data['view_products'] = PR::collection($view_products);
        return $data;
    }
    public function favourite(FavoriteRequest $request)
    {
        $product = Product::find($request->product_id);
        if ($product) {
            $favorite = Favorite::where('product_id', $product->id)->first();
            if ($favorite) {
                $favorite->delete();
                $favorites = Favorite::where('user_id', $request->user()->id)->get();
                $message = __('web.success');
                $response = [
                    'status' => 200,
                    'msg' => $message,
                    'data' => FavouritesResource::collection($favorites),
                ];
            } else {
                $message = __('web.success');
                Favorite::create([
                    'user_id' => $request->user()->id,
                    'product_id' => $product->id

                ]);
                $favorites = Favorite::where('user_id', $request->user()->id)->get();
                $response = [
                    'status' => 200,
                    'msg' => $message,
                    'data' => FavouritesResource::collection($favorites),
                ];
            }
        }
        return ApiResponseService::response($response);
    }
    public function favourites(Request $request)
    {
        $favorites = Favorite::where('user_id', $request->user()->id)->get();
        return FavouritesResource::collection($favorites);
    }
}
