<?php

namespace App\Http\Controllers\Web;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Cobon;

use App\Models\ProductView;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Product\ProductService;
use App\Services\Currency\CurrencyService;
use App\Services\Response\ResponseService;
use Illuminate\Support\Facades\Crypt;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductController extends Controller
{
    private $view = 'web.product.';
    private $ajax = 'web.product.ajax.';
    private $take = 28;
    /**
     * view of all products
     * @return view
     */


    public function index(Request $request, $title = null)
    {

        if ($title != null) {
            $array = explode('/', $title);
            $title = Category::withDescription()->where('slug', end($array))->pluck('ad.title')->first();
            $category_ids = Category::where('slug', end($array))->pluck('id')->toArray();
            $request['category_id'] = $category_ids;
        } else {
            $title = __('web.products');
        }
        $query = Product::withDescription()->whereNotIn('products.category_id', [10, 16, 18, 20, 21]);
        $banners = Cache::remember(LaravelLocalization::getCurrentLocale() . 'banners_products', 600000, function () {
            return Slider::withDescription([33])->get();
        });

        $filter = $this->filter($request, $query);
        $categories = Category::withDescription()->where('categories.category_id', $request->category_id)->cursor();
        $category_one = Category::withDescription()->where('categories.id', $request->category_id)->first();

        $model = Category::withDescription()->where('categories.id', $request->model_id)->first();
        $offer_ids = (new WebController())->cobonNow()['ids'];
        $cobonCategory = Cobon::where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->where('type', 'category')->orderBy('id', 'DESC')->first();
        $high = Product::orderBy('cost', 'desc')->value('cost');
        $low = Product::orderBy('cost', 'asc')->value('cost');
        $currency = (new CurrencyService())->getCurrency();
        $global_min = $query->clone()->min("products.cost");
        $global_max = $query->clone()->max('products.cost');
        $high_cost = round($filter['max_price'] , 2);
        $low_cost = round($filter['min_price'] , 2);
        $range = $high_cost - $low_cost;
        $number_of_ranges = 4;

        $step = $range / $number_of_ranges;

        $price_ranges = [];

        for ($i = 0; $i < $number_of_ranges; $i++) {
            $start = $low_cost + ($i * $step);

            $end = $start + $step;

            $price_ranges[] = ['start' => round($start, 2), 'end' => round($end, 2)];
        }
        $categories_all = Cache::remember(LaravelLocalization::getCurrentLocale() . 'categories_all',60000, function () {
            return Category::withDescription()->where('categories.category_id', null)->orderByDesc('id')->get();
        });
        $products = $query->get();
        if ($request->ajax()) {
            $res_filter = view($this->ajax . 'filtering')
                ->with(
                    [
                        'products' => $products,
                        'offer_ids' => $offer_ids,
                        'cobonCategory' => $cobonCategory,
                        'num' => $filter['num'],
                        'category' => $filter['category'],
                        'orderBy' => $filter['orderBy'],
                        'priceBy' => $filter['priceBy'],
                        'paginates' => $filter['paginates'],
                        'count_products' => $filter['count_products'],
                    ]
                )
                ->render();

            $res =
                [
                    'msg' => null,
                    'data' =>
                        [
                            'res' => $res_filter,
                            'filter' => $filter
                        ],
                    'status' => 200
                ];

            return ResponseService::response($res);
        }

        $random_products = (new ProductService())->suggestProducts();

        return view($this->view . 'shop', get_defined_vars());
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
        $take = $this->take;
        $orderBy = null;
        $priceBy = null;
        if ($request->take) {
            $take = $request->take;
        }
        if ($request->offer) {
            foreach ($request->offer as $row) {
                if ($row == 'sale') {
                    $ids = $this->saleIds();
                    $query->whereRaw("products.id IN (" . implode(',', $ids) . ")");
                }
                if ($row == 'best_selling') {
                    $ids = $this->orderIds();
                    $query->whereRaw("products.id IN (" . implode(',', $ids) . ")");
                }
            }
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

            $query->whereIn('products.category_id', $category_ids)->orderBy('products.category_id', 'ASC');
        }

        if ($request->model && $request->category) {
            $query->where('products.category_id', $request->model);
        } elseif ($request->category) {
            $category_ids = [];
            array_push($category_ids, $request->category);
            $ids = Category::where('category_id', $request->category)->pluck('id')->toArray();
            $category_ids = array_merge($category_ids, $ids);
            $query->whereIn('products.category_id', $category_ids)->orderBy('products.category_id', 'ASC');
        }

        if (!$request->ajax()) {
            if ($request->model_id) {
                $query->where('products.category_id', $request->model_id)->orderBy('products.category_id', 'ASC');
            }
        }

        if ($request->shipping) {
            $days = [];
            foreach ($request->shipping as $row) {
                if ($row == 3) {
                    array_push($days, 2);
                    array_push($days, 3);
                } else {
                    array_push($days, $row);
                }
            }
            $query->whereIn('products.shipping', $days);
        }
        if ($request->max_price || $request->min_price) {

            $query->where(function($query) use ($request) {

                // Case 1: If cost_discount is not null, compare with the cost_discount field
                $query->where(function($query) use ($request) {
                    $query->whereNotNull('products.cost_discount')
                        ->whereBetween('products.cost_discount', [$request->min_price, $request->max_price]);
                })
                    // Case 2: If cost_discount is null, use the cost field instead
                    ->orWhere(function($query) use ($request) {
                        $query->whereNull('products.cost_discount')
                            ->whereBetween('products.cost', [$request->min_price, $request->max_price]);
                    });

            });

        }

        if ($request->product) {
            $array = explode(' ', $request->product);

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

        if ($request->orderBy || $request->priceBy) {
            if ($request->orderBy == 'ASC') {
                $query->orderBy('products.id', 'ASC');
            } elseif ($request->orderBy == 'DESC') {
                $query->orderBy('products.id', 'DESC');
            } elseif ($request->priceBy == 'ASC') {
                $query->orderBy(DB::raw('COALESCE(products.cost_discount, products.cost)'), 'ASC');
            } elseif ($request->priceBy == 'DESC') {
                $query->orderBy(DB::raw('COALESCE(products.cost_discount, products.cost)'), 'DESC');

            }
        } else {
            $query->orderBy('products.id', 'DESC');
        }


        $count_products = $query->count();

        $paginates = $query->count() / $take;
        $num = 1;

        if ($request->num) {
            $num = $request->num;
        }

        $query->skip(($num - 1) * $take)->take($take);
        $max_price = $query->clone()->max(DB::raw('COALESCE(products.cost_discount, products.cost)'));
        $min_price = $query->clone()->min(DB::raw('COALESCE(products.cost_discount, products.cost)'));



        $products = $query->get();
        $category = ($request->category) ? $request->category : 'null';
        return [
            'num' => $num,
            'take' => $take,
            'max_price' => $max_price,
            'min_price'=>$min_price,
            'category' => $category,
            'orderBy' => $orderBy,
            'priceBy' => $priceBy,
            'products' => $products,
            'paginates' => ceil($paginates),
            'count_products' => $count_products,
        ];
    }
    private function saleIds()
    {
        $product_ids = Product::where('cost_discount', '!=', null)->pluck('id')->toArray();
        if (count($product_ids) == 0) {
            $product_ids = ['0'];
        }
        return $product_ids;
    }
    private function orderIds()
    {
        $product_ids = OrderProduct::pluck('product_id')->toArray();
        if (count($product_ids) == 0) {
            $product_ids = ['0'];
        }
        return $product_ids;
    }
    /**
     * view of product details
     * @return \Illuminate\Http\JsonResponse
     */
    public function quickView($id): \Illuminate\Http\JsonResponse
    {
        $product = Product::withDescription()
            ->with([
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
            ->find($id);

        if (!$product) {
            return ResponseService::notFound();
        }

        // Render the product modal view and return it as part of the JSON response
        $res = view('web.component.product.productModal')->with(['product' => $product])->render();

        return response()->json([
            'status' => 'success',
            'data' => $res
        ]);
    }

    public function product_details($title): view
    {
        $array = explode('/', $title);
        if (count($array) < 2) {
            abort(404);
        }
        $sku_code = $array[1];
        $product = Product::withDescription()
            ->with([
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
                'extensions'
            ])

            ->where('products.sku_code', $sku_code)
            ->firstOrFail();
        $title  = $product->name;

        $releated_products = Product::withDescription()->where('products.only_offer','no')
            ->where('products.sku_code', '!=', $sku_code)
            ->where('products.category_id', $product->category_id)
            ->paginate(4);

        $offer_product_ids = (new WebController())->cobonproductsNow()['ids'];
        $offer_category_ids = (new WebController())->cobonNow()['ids'];
        $offer_ids = collect($offer_product_ids)->merge($offer_category_ids)->all();
        $cobonProduct = Cobon::where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->where('type','product')->orderBy('id', 'DESC')->first();
        $cobonCategory = Cobon::where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->where('type','category')->orderBy('id', 'DESC')->first();
        $random_products = Product::withDescription()->where('products.only_offer','no')
            ->where('products.sku_code', '!=', $sku_code)
            ->inRandomOrder()
            ->paginate(4);
        $view_products = [];
        if (Auth::user()) {
            $ids = ProductView::where('user_id', Auth::user()->id)->pluck('product_id')->toArray();
            if (count($ids) == 0) {
                $ids = ['0'];
            }
            $view_products = Product::withDescription()->where('products.only_offer','no')
                ->whereRaw("products.id IN (" . implode(',', $ids) . ")")
                ->orderByRaw("field(products.id," . implode(',', $ids) . ")")
                ->where('products.sku_code', '!=', $sku_code)
                ->limit(5)->orderBy('id', 'DESC')
                ->get();
            ProductView::create([
                'product_id' => $product->id,
                'user_id' => Auth::user()->id
            ]);
        }
        return view($this->view . 'product_details', get_defined_vars());
    }
}
