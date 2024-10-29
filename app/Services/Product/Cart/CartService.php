<?php
namespace App\Services\Product\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Services\Product\ProductService;
use App\Services\Response\ResponseService;

class CartService
{

    public function carts($message = ''):array
    {
        $user = Auth::user() ?? app(Request::class)->user('sanctum');
        $carts = Cart::withattr()->where('user_id',$user->id)->orderBy('id','DESC')->get();
        $total_cart = $this->totalCart();
        $status = 200;
        $content =
        [
            'msg' => $message,
            'status' => $status,
            'data' => [
                'carts'=>$carts,
                'total_cart'=>$total_cart
            ],
        ];

        return $content;
    }
    public function totalCart()
    {
        $user = Auth::user() ?? app(Request::class)->user('sanctum');
        $carts = Cart::withattr()->where('user_id',$user->id)->orderBy('id','DESC')->get();
        $total_cart = 0;
        foreach ($carts as $row)
        {
            $total_cart += ($row->product->price['price'] * $row->count);
            if($row->extensions()){
                foreach ($row->extensions as $extension){
                    $total_cart += ($extension->value);
                }

            }
        }
        return $total_cart;
    }
    public function createCart($requestContent)
    {
        $user = Auth::user() ?? app(Request::class)->user('sanctum');
        $requestContent['user_id'] = $user->id;
        $product = Product::find($requestContent['product_id']);
        $checkCount = (new ProductService($product))->productCount();
        // dd($checkCount);
        if($checkCount['status'] != 200)
        {
            return ResponseService::response($checkCount);
        }

        $cart = Cart::where('product_id',$requestContent['product_id'])->where('user_id',$user->id)->first();
        if(!$cart)
        {
            $checkAvailable = (new ProductService($product))->checkAvailable($requestContent['count']);
            if($checkAvailable['status'] != 200)
            {
                return ResponseService::response($checkAvailable);
            }
            $cart = Cart::create($requestContent);
            if (isset($requestContent['extensions']) && !empty($requestContent['extensions'])) {
                $cart->extensions()->attach($requestContent['extensions']);
            }

        }
        else
        {
            $count = $cart->count + $requestContent['count'];
            $checkAvailable = (new ProductService($product))->checkAvailable($count);
            if($checkAvailable['status'] != 200)
            {
                return ResponseService::response($checkAvailable);
            }
            $cart->update(['count'=>$count]);
        }
        $message = __('web.success');
        $response = $this->carts($message);
        return ResponseService::response($response);
    }


    public function editCart($requestContent,$cart_id)
    {
        $user = Auth::user() ?? app(Request::class)->user('sanctum');
        $cart = Cart::where('user_id',$user->id)->where('id',$cart_id)->first();
        if(!$cart)
        {
            $content =
                [
                    'msg' => [__('web.not_found')],
                    'data' => '',
                    'status' => 404,
                ];
            return ResponseService::response($content);
        }

        $product = Product::find($cart->product_id);
        $checkCount = (new ProductService($product))->productCount($requestContent['count']);
        if($checkCount['status'] != 200)
        {
            return ResponseService::response($checkCount);
        }

        $count =  $requestContent['count'];

        $checkAvailable =  (new ProductService($product))->checkAvailable($count);

        if($checkAvailable['status'] != 200)
        {
            return ResponseService::response($checkAvailable);
        }
        $cart->update(['count'=>$requestContent['count']]);

        $message = __('web.success');
        $response = $this->carts($message);
        return ResponseService::response($response);
    }

    public function deleteCart($id)
    {
        $user = Auth::user() ?? app(Request::class)->user('sanctum');
        $cart = Cart::where('user_id',$user->id)->where('id',$id)->first();
        if(!$cart)
        {
            $content =
            [
                'msg' => [__('web.not_found')],
                'data' => '',
                'status' => 400,
            ];
            return ResponseService::response($content);
        }
        $cart->delete();
        $message = __('web.success');
        $response = $this->carts($message);
        return ResponseService::response($response);
    }
}
