<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Resources\PaymentResource;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Address;
use App\Models\PaymentMethod as PM;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\OrderRequest;
use App\Services\Currency\CurrencyService;
use App\Services\Product\Cart\CartService;
use App\Services\Product\Order\OrderService;
use App\Services\Product\Payment\PaymentMethod;
use App\Services\Product\Payment\PaymobService;
use App\Services\Response\ApiResponseService;

class OrderController extends Controller
{
    public function make_order(OrderRequest $request)
    {
        $user = $request->user();
        $address = Address::where('user_id',$user->id)->first();
        if($address)
        {

            $calculate = (new OrderService())->calculate($request->all());
            $token = bcrypt(rand(11111,99999).time());
            $total = $calculate['total'];
            if($request->status == 'cardDeposit'){            
                $total = $calculate['total'] * 30 / 100;
            }
    
            $order = Order::create
            ([
                'status'=>'wait_pay',
                'total'=>$total ,
                'total_products'=>$calculate['total_products'] ,
                'total_delivery'=>$calculate['total_delivery'] ,
                'tax_value'=>$calculate['tax_value'] ,
                'cobon_discount'=>$calculate['cobon']['discount'] ,
                'offer_discount'=>$calculate['offer']['discount'] ,
                'cobon_id'=>$calculate['cobon']['cobon_id'],
                'offer_id'=>$calculate['offer']['offer_id'],
                'user_id'=>$user->id,
                'seller_id'=>$user->seller_id,
                'affiliate_profit'=>($total ) * settings('affiliat_profit')
            ]);
            $carts = (new CartService())->carts()['data']['carts'];
            foreach ($carts as $cart)
            {
                OrderProduct::create
                ([
                    'order_id' => $order->id,
                    'count' => $cart->count,
                    'product_id' => $cart->product_id,
                    'total' => $cart->product->price['price'] ,
                ]);
            }
            
            $integration = new PaymentMethod($request->status);
            $integration_id = $integration->getId();
            $iframe_id = $integration->getIframe();
            
            $payment = new PaymobService($order,$user,$iframe_id,$integration_id);
    
            $token = $payment->getId();
            if(is_null($token))
            {
                $response =
                    [
                        'status' => 400,
                        'msg' => __('web.failed'),
                        'data' => null,
                    ];
                return ApiResponseService::response($response);
            }
            $order->update([
                'token' => $token
            ]);
            
            $payment_token = $payment->generateTokenPay();
            if(is_null($payment_token))
            {
                $response =
                    [
                        'status' => 400,
                        'msg' => __('web.failed'),
                        'data' => null,
                    ];
                return ApiResponseService::response($response);
            }
            
            if($iframe_id){
                $iframe_url = "https://accept.paymob.com/api/acceptance/iframes/".$iframe_id."?payment_token=".$payment_token;
                    
            }else{
                $iframe_url = "https://accept.paymobsolutions.com/iframe/".$payment_token;

            }            
            session()->put('lang', getCurrentLocale());
            $order->delete();
            
            $response =
                [
                    'status' => 200,
                    'msg' => __('web.success'),
                    'data' => [
                        'link'=>$iframe_url
                    ],
                ];
        }else{
            $response =
                [
                    'status' => 400,
                    'msg' => __('web.please_add_address_first'),
                    'data' => null,
                ];
        }
        return ApiResponseService::response($response);
    }
    public function get_type($type)
    {

        $payments = PM::where('type',$type)->get();
        return PaymentResource::collection($payments);


    }
}
