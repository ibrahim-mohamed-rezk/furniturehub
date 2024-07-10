<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Cobon;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebController;
use App\Http\Resources\CobonResource;
use App\Http\Resources\Home\SliderResource;
use App\Http\Resources\Home\ProductResource;
use App\Http\Resources\ProductResource as PR;
use App\Http\Resources\Home\CategoryResource;
use App\Http\Resources\Home\CategoyProductResource;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::withDescription([56,57,91])->get();
        $categories = Category::withDescription()->whereNull('categories.category_id')->with([
            'models'=>function($query){
                $query->with('details');
            }
        ])
        ->get();
        $banner2 = Slider::withDescription(47)->get();
        $sold_ids = $this->soldIds();
        $best = Product::withDescription()->whereRaw("products.id IN (" . implode(',', $sold_ids) . ")")
        ->orderByRaw("field(products.id," . implode(',', $sold_ids) . ")")->where('products.page_offer', 'no')->cursor();
        $hotdeals = Product::withDescription()->where('products.cost_discount', '!=', null)->where('products.page_offer','no')
        ->orderBy('id', 'DESC')->take(3)->cursor();
        $offer_ids = (new WebController)->cobonproductsNow()['ids'];
        $cobonProduct = Cobon::where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->where('type','product')->orderBy('id', 'DESC')->first();
        $shipping_products = Product::withDescription()->whereRaw("products.id IN (" . implode(',', $offer_ids) . ")")->orderByRaw("field(products.id," . implode(',', $offer_ids) . ")")->take(6)->get();        
        $only_product_offer = Product::withDescription()->where('products.only_offer','yes')->first();
        $category_banners = Slider::withDescription([58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,78,80,81,82,83])->get();
        $data['banner1'] = SliderResource::collection($sliders);
        $data['banner2'] = SliderResource::collection($banner2);
        $data['category_banners'] = SliderResource::collection($category_banners);

        $data['categories'] = CategoryResource::collection($categories);

        $data['best_products']= ProductResource::collection($best);
        $data['only_product_offer']= new PR($only_product_offer);
        $data['cobon_products']= ProductResource::collection($shipping_products)?? [];
        $data['cobon']= new CobonResource($cobonProduct);

        $data['hot_deals'] = ProductResource::collection($hotdeals);
        $data['category_products']=CategoyProductResource::collection($categories);

        return $data;
    }
    private function soldIds()
    {
        $product_ids = OrderProduct::select('product_id', DB::raw('sum(count) as count'))
            ->groupBy('product_id')
            ->orderBy('count', 'DESC')
            ->take(4)
            ->pluck('product_id')->toArray();
        if (count($product_ids) == 0) {
            $product_ids = ['0'];
        }
        return $product_ids;
    }
    public function settings(Request $request)
    {
        $lang = $request->header('lang');

        if($lang == 'en' ){
            $privacy = settings('privacy_policy_des_en');
            $return = settings('return_policy_des_en');
        }else{
            $privacy = settings('privacy_policy_des_ar');
            $return = settings('return_policy_des_ar');

        }
        return response()->json([
            'whatsapp'=>settings('whatsapp'),
            'messenger'=>settings('messenger'),
            'privacy'=>$privacy ,
            'return'=>$return ,

        ]);
    }
    public function version()
    {
        return response()->json([
            'Android version'=> Setting::where('key','Android version')->value('value'),
            'Apple version'=> Setting::where('key','Apple version')->value('value')
            ]);
    }
}
