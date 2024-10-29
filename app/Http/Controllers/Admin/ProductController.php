<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

use App\Models\Seller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use App\Models\ProductTag;
use App\Models\ProductItem;
use Illuminate\Support\Str;
use App\Models\ProductPhoto;
use App\Models\ProductPoint;
use Illuminate\Http\Request;
use App\Models\ProductSection;
use App\Models\ProductDescription;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductTagDescription;
use App\Services\Upload\ImageService;
use Illuminate\Http\RedirectResponse;
use App\Models\ProductItemDescription;
use App\Models\ProductPointDescription;
use App\Models\ProductSectionDescription;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Rate;
use App\Models\Extension;
use App\Models\UserProducts;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    private $view = 'admin.products.';
    private $redirect = '/admin/products/';
    private $routes = 'products';
    public function index(Request $request): View
    {
        $title = __('products.index');
        $query = Product::join('product_descriptions AS ad', 'products.id', 'ad.product_id')
            ->join('languages', 'languages.id', 'ad.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->select(['ad.*', 'products.*']);
        $categories = Category::withDescription()->get();

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $products = $filter['products'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
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
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';


        if ($request->offer) {
            if (in_array($request->offer, ['yes', 'no'])) {
                $query->where('page_offer', $request->offer);
            }
        }
        if ($request->title) {
            $query->where('ad.name', 'LIKE', '%' . $request->title . '%');
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
        if ($request->start_date) {
            $query->whereDate('products.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('products.created_at', '<=', $request->end_date);
        }



        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $products = $query->onlyTrashed()->latest('deleted_at')->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $products = $query->latest()->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'products' => $products,
            'count' => $count,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }

    /**
     * Show the form for creating a new resource.
     * @return view
     */
    public function create(): View
    {
        $title = __('products.create');
        $action = route('products.store');

        $sellers = Seller::cursor();
        $categories = Category::withDescription()->cursor();
        $count_sections = 0;
        $count_photos = 0;
        $count_points = 0;
        $count_items = 0;
        $count_tags = 0;
        $extensions = Extension::get();
        $product_extensions = [];
        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        $image = ImageService::uploadImage($request->image);
        $content = [
            'image' => $image,
            'count' => $request->count,
            'cost' => $request->cost,
            'cost_discount' => $request->cost_discount,
            'seller_id' => $request->seller_id,
            'category_id' => $request->category_id,
            'sku_code' => $request->sku_code,
            'admin_id' => Auth::user()->id,
            'page_offer' => $request->page_offer,
            'type' => $request->type_product
        ];



        $product = Product::create($content);
        UserProducts::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'type' => 'create'
        ]);
        Rate::create([
            "rate" => random_int(3, 5),
            "user_id" => 1068,
            "product_id" => $product->id
        ]);
        $product->extensions()->attach($request->extensions);

        $this->saveData($request, $product->id);

        return redirect(getCurrentLocale() . $this->redirect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return View
     */
    public function edit(Product $product): View
    {
        $title = __('products.edit');
        $action = route('products.update', $product->id);

        $query = ProductDescription::where('product_id', $product->id)
            ->join('languages', 'languages.id', 'product_descriptions.language_id')
            ->select(['product_descriptions.*', 'languages.local']);

        $sellers = Seller::cursor();
        $categories = Category::withDescription()->cursor();


        $productDescription = $query->get();

        foreach ($productDescription as $row) {
            $product[$row->local] = $row;
        }

        $query = ProductSection::where('product_id', $product->id);
        $sections = $query->cursor();
        $count_sections = $query->count();

        $query = ProductPhoto::where('product_id', $product->id);
        $photos = $query->cursor();
        $count_photos = $query->count();

        $query = ProductPoint::where('product_id', $product->id);
        $points = $query->cursor();
        $count_points = $query->count();

        $query = ProductItem::where('product_id', $product->id);
        $items = $query->cursor();
        $count_items = $query->count();

        $query = ProductTag::where('product_id', $product->id);
        $tags = $query->cursor();
        $count_tags = $query->count();
        $extensions = Extension::get();

        $product_extensions = old('extensions',  $product->extensions()->pluck('extensions.id')->toArray() ?? []);

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $content = [
            'count' => $request->count,
            'cost' => $request->cost,
            'seller_id' => $request->seller_id,
            'cost_discount' => $request->cost_discount,
            'category_id' => $request->category_id,
            'sku_code' => $request->sku_code,
            'admin_update_id' => Auth::user()->id,
            'page_offer' => $request->page_offer,
            'type' => $request->type_product

        ];
        if ($request->file('image')) {

            $image = ImageService::uploadImage($request->image);

            $content['image'] = $image;
        }

        $content['type_id'] = $request->type;



        $product->update($content);
        UserProducts::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'type' => 'update'
        ]);

        if (isset($request->images)) {
            $photos_ids = array_column($request->images, 'id');
            ProductPhoto::where('product_id', $product->id)->whereNotIn('id', $photos_ids)->delete();
        }

        if (isset($request->tags)) {
            $tags_ids = array_column($request->tags, 'id');
            ProductTag::where('product_id', $product->id)->whereNotIn('id', $tags_ids)->delete();
        }

        ProductDescription::where('product_id', $product->id)->delete();
        ProductSection::where('product_id', $product->id)->delete();
        ProductPoint::where('product_id', $product->id)->delete();
        ProductItem::where('product_id', $product->id)->delete();

        $this->saveData($request, $product->id);
        $this->clearProductCache($product);
        $product->extensions()->sync($request->extensions);

        return redirect(getCurrentLocale() . $this->redirect);
    }
    /**
     * Handle Save form data
     *
     * @param ProductRequest $request
     * @param int $product_id
     * @return void
     */
    private function saveData(ProductRequest $request, int $product_id): void
    {
        $requestData = $request->all();

        foreach (languages() as $lang) {
            $data = [
                'product_id' => $product_id,
                'language_id' => $lang->id,
                'name' => $requestData['name_' . $lang->local],
                'slug' => $requestData['slug_' . $lang->local],
                'meta_description' => $requestData['meta_description_' . $lang->local],
                'keywords' => $requestData['keywords_' . $lang->local],
                'description' => $requestData['description_' . $lang->local],
                'material' => $requestData['material_' . $lang->local],
                'dimensions' => $requestData['dimensions_' . $lang->local],
                'color' => $requestData['color_' . $lang->local],
                'delivery' => $requestData['delivery_' . $lang->local],
                'made_in' => $requestData['made_in_' . $lang->local],
            ];
            ProductDescription::create($data);
        }
        if (isset($requestData['items'])) {
            foreach ($requestData['items'] as $row) {
                $item = ProductItem::create(['product_id' => $product_id]);

                foreach (languages() as $lang) {
                    $data = [
                        'product_item_id' => $item->id,
                        'language_id' => $lang->id,
                        'name' => $row['name_' . $lang->local],
                    ];
                    ProductItemDescription::create($data);
                }
            }
        }

        if (isset($requestData['points'])) {
            foreach ($requestData['points'] as $row) {
                $point = ProductPoint::create(['product_id' => $product_id]);

                foreach (languages() as $lang) {
                    $data = [
                        'product_point_id' => $point->id,
                        'language_id' => $lang->id,
                        'key' => $row['key_' . $lang->local],
                        'value' => $row['value_' . $lang->local],
                    ];
                    ProductPointDescription::create($data);
                }
            }
        }

        if (isset($requestData['sections'])) {
            foreach ($requestData['sections'] as $row) {
                $section = ProductSection::create(['product_id' => $product_id]);

                foreach (languages() as $lang) {
                    $data = [
                        'product_section_id' => $section->id,
                        'language_id' => $lang->id,
                        'key' => $row['key_' . $lang->local],
                        'value' => $row['value_' . $lang->local],
                    ];
                    ProductSectionDescription::create($data);
                }
            }
        }

        if (isset($requestData['tags'])) {
            foreach ($requestData['tags'] as $row) {
                $image = null;
                if (isset($row['image'])) {
                    $image = ImageService::uploadImage($row['image']);
                }
                if (array_key_exists('id', $row)) {
                    $tag = ProductTag::find($row['id']);
                    if ($tag && $image) {
                        $tag->update(['image' => $image]);
                    }
                    ProductTagDescription::where('product_tag_id', $tag->id)->delete();
                } else {
                    $tag = ProductTag::create(['product_id' => $product_id, 'image' => $image]);
                }
                foreach (languages() as $lang) {
                    $data = [
                        'product_tag_id' => $tag->id,
                        'language_id' => $lang->id,
                        'name' => $row['name_' . $lang->local],
                        'description' => $row['description_' . $lang->local],
                    ];
                    ProductTagDescription::create($data);
                }
            }
        }

        if (isset($requestData['images'])) {
            foreach ($requestData['images'] as $row) {
                $image = null;
                if (isset($row['image'])) {
                    $image = ImageService::uploadImage($row['image']);
                }

                if (array_key_exists('id', $row)) {
                    $photo = ProductPhoto::find($row['id']);
                    if ($photo && $image) {
                        $photo->update(['image' => $image]);
                    }
                } else {
                    ProductPhoto::create(['product_id' => $product_id, 'image' => $image]);
                }
            }
        }
    }

    /**
     * Remove Or Return the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $product = Product::where('id', $id)->withTrashed()->first();

        if (is_null($product->deleted_at)) {
            $product->delete();
        } else {
            $product->restore();
        }
        return redirect(getCurrentLocale() . $this->redirect);
    }
    public function force_delete($id): RedirectResponse
    {
        $product = Product::where('id', $id)->withTrashed()->first();
        $product->forceDelete();

        return redirect(getCurrentLocale() . $this->redirect);

    }
    private function clearProductCache(Product $product)
    {
        $ratesCacheKey = 'rates_attribute_' . $product->id;
        $priceCacheKey = 'price_attribute_' . $product->id;

        // Forget the cache for rates and price for the specific product
        Cache::forget($ratesCacheKey);
        Cache::forget($priceCacheKey);
    }
}
