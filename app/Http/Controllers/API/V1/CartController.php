<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Web\CartRequest;
use App\Services\Product\ProductService;
use App\Services\Currency\CurrencyService;
use App\Services\Product\Cart\CartService;
use App\Services\Response\ResponseService;
use App\Http\Controllers\Web\WebController;
use App\Services\Product\Order\OrderService;
use App\Services\Response\ApiResponseService;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $userCurrencyName ='L.E';

        $offer_ids = (new WebController())->cobonNow();
        $cart = (new CartService())->carts()['data'];
        $carts = $cart['carts'];
        $sub_total = round($cart['total_cart'], 2) ;
        $delivery = 0 ;
        $data['products_cart'] = CartResource::collection($carts); 
        $data['total_cart'] = $delivery + $sub_total;
        $data['sub_total'] = $sub_total;
        $data['delivery'] = $delivery;
        $data['tax'] = 0;
        $data['symbol']= 'L.E';
        
        return $data;
    }
    public function store(CartRequest $request)
    {
        $product = Product::find($request->product_id);
        if (!$product) {
            $message = __('web.failed');

            $response =
                [
                    'status' => 400,
                    'msg' => $message,
                    'data' => [],
                ];
        }
        $carts = (new CartService())->createCart($request->all());
        $message = __('web.success');

        $response =
            [
                'status' => 200,
                'msg' => $message,
                'data' => [],
            ];
        return ApiResponseService::response($response);
    }
    public function update(Request $request,$id) :JsonResponse
    {
        $carts = (new CartService())->editCart($request->all(),$id);
        $message = __('web.success');
        
        $response =
            [
                'status' => 200,
                'msg' => $message,
                'data' => [],
            ];
        return ApiResponseService::response($response);
    }
    public function destroy($id) :JsonResponse
    {
        $carts = (new CartService())->deleteCart($id);
        $message = __('web.success');
        
        $response =
            [
                'status' => 200,
                'msg' => $message,
                'data' => [],
            ];
        return ApiResponseService::response($response);
    }
    public function use_cobon(Request $request)
    {
        $calculate = (new OrderService())->calculate($request->all());

        $total = $calculate['total'];
        $data =[
            'total_cart'=>$total ,
            'products_cart'=>$calculate['total_products'] ,
            'delivery'=>$calculate['total_delivery'] ,
            'tax'=>$calculate['tax_value'] ,
            'cobon_discount'=>$calculate['cobon']['discount'] ,
            'offer_discount'=>$calculate['offer']['discount'] ,
            'cobon_id'=>$calculate['cobon']['cobon_id'],
            'offer_id'=>$calculate['offer']['offer_id'],
            'symbol'=> $request->user()->getCurrencyName() ?? 'L.E',
        ];
        if($request->total == $total){
            $message = __('web.failed');

            $response =
            [
                'status' => 400,
                'msg' => $message,
                'data' => [],
            ];
        }else{
            $message = __('web.success');

            $response =
            [
               'status' => 200,
               'msg' => $message,
                'data' => $data,
            ];
        }
        
        return ApiResponseService::response($response);

    }
}
