<?php

namespace App\Http\Controllers\Web;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Address;
use App\Models\Product;
use App\Models\Cobon;
use App\Models\OrderPayment;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Web\OrderRequest;
use App\Mail\orderMail;
use Illuminate\Support\Facades\Session;
use App\Services\Currency\CurrencyService;
use App\Services\Product\Cart\CartService;
use App\Services\Response\ResponseService;
use App\Services\Product\Order\OrderService;
use App\Services\Product\Payment\PaymentMethod;
use App\Services\Product\Payment\PaymobService;

class OrderController extends Controller
{
    private $view = 'web.order.';
    private $viewAjax = 'web.order.ajax.';

    public function index()
    {
        $user = Auth::user();
        $cart = (new CartService())->carts()['data'];
        $carts = $cart['carts'];
        $address = Address::where('user_id',$user->id)->where('default_address',1)->first();
        return view($this->view.'.index', get_defined_vars());
    }
    public function store(OrderRequest $request)
    {
        $user = Auth::user();
        $address = Address::where('user_id',$user->id)->first();
        if($address)
        {

            $currency = (new CurrencyService())->getCurrency();
            $calculate = (new OrderService())->calculate($request->all());
            $token = bcrypt(rand(11111,99999).time());
            $total = $calculate['total'];
            if($request->status == 'cardDeposit'){            
                $total = $calculate['total'] * 30 / 100;
            }
    
            $order = Order::create
            ([
                'status'=>'wait_pay',
                'total'=>$total * $currency->value,
                'total_products'=>$calculate['total_products'] * $currency->value,
                'total_delivery'=>$calculate['total_delivery'] * $currency->value,
                'tax_value'=>$calculate['tax_value'] * $currency->value,
                'cobon_discount'=>$calculate['cobon']['discount'] * $currency->value,
                'offer_discount'=>$calculate['offer']['discount'] * $currency->value,
                'cobon_id'=>$calculate['cobon']['cobon_id'],
                'offer_id'=>$calculate['offer']['offer_id'],
                'user_id'=>$user->id,
                'seller_id'=>$user->seller_id,
                'affiliate_profit'=>($total * $currency->value) * settings('affiliat_profit')
            ]);
            $carts = (new CartService())->carts()['data']['carts'];
            foreach ($carts as $cart)
            {
                OrderProduct::create
                ([
                    'order_id' => $order->id,
                    'count' => $cart->count,
                    'product_id' => $cart->product_id,
                    'total' => $cart->product->price['price'] * $currency->value,
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
                        'msg' => [__('web.failed')],
                        'data' => null,
                    ];
                return ResponseService::response($response);
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
                        'msg' => [__('web.failed')],
                        'data' => null,
                    ];
                return ResponseService::response($response);
            }
            if($iframe_id){
                $iframe_url = "https://accept.paymob.com/api/acceptance/iframes/".$iframe_id."?payment_token=".$payment_token;
                    
            }else{
                $iframe_url = "https://accept.paymobsolutions.com/iframe/".$payment_token;

            }
            
            session()->put('lang', getCurrentLocale());
            $res = view($this->view.'payment_method')
                ->with(
                    [
                        'iframe_url' => $iframe_url
                    ])
                ->render();
            $order->delete();
            
            $response =
                [
                    'status' => 200,
                    'msg' => __('web.success'),
                    'data' => $res,
                ];
        }else{
            $response =
                [
                    'status' => 400,
                    'msg' => [__('web.please_add_address_first')],
                    'data' => null,
                ];
        }
        return ResponseService::response($response);
    }
    public function callBack(Request $request)
    {
        $requestContent = $request->all();
        $lang = Session::get('lang');
        Session::forget('lang');
        if(isset($requestContent['success']))
        {
            if($requestContent['success'] == "true")
            {
                $order = Order::onlyTrashed()->where('token',$requestContent['order'])->first();
                $order->restore();
                $order->update([
                    'status'=>'paid',
                ]);
                OrderPayment::create([
                    'order_id' => $order->id,
                    'payment_id' => $requestContent['id'],
                    'payment_log' => json_encode($requestContent),
                    'payment_type'=>$requestContent['source_data_type']
                    ]);
                $order_products = OrderProduct::where('order_id',$order->id)->get();
                foreach($order_products as $order_product)
                {
                    $product = Product::find($order_product->product_id);
                    $product->update(['count'=>($product->count - $order_product->count)]);
                    Cart::where('user_id',$order->user_id)->where('product_id',$order_product->product_id)->delete();
                }

                $data['name']= Auth::user()->name;
                $data['subject']= 'FurnitureHub';
                $sendMail = Mail::to(Auth::user()->email)->send(new orderMail($data));
                return view('web.pages.fatora',get_defined_vars());
            }
        }
        return redirect($lang.'/account')->with('error',__('web.failed'));
    }
    public function calculate(Request $request)
    {
        $calculate = (new OrderService())->calculate($request->all());

        $res = view($this->view.'calculate')
            ->with(
                [
                    'response' => $calculate
                ])
            ->render();

        $response =
            [
                'status' => 200,
                'msg' => null,
                'data' => $res,
            ];
        return ResponseService::response($response);
    }
}