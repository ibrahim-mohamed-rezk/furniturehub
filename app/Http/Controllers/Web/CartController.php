<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\Web\CartRequest;
use App\Http\Requests\Web\EditCartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Cobon;
use App\Services\Currency\CurrencyService;
use App\Services\Product\ProductService;
use App\Services\Response\ResponseService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Product\Cart\CartService;
use App\Mail\cartMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    private $view = 'web.cart.';
    private $viewAjax = 'web.cart.ajax.';

    public function index(): View
    {
        $title = __('web.cart');
        $offer_ids = (new WebController())->cobonNow()['ids'];
        $cobonCategory = Cobon::where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->where('type','category')->orderBy('id', 'DESC')->first();
        $cart = (new CartService())->carts()['data'];
        $carts = $cart['carts'];
        $currency = (new CurrencyService())->getCurrency();
        $total_cart = round($cart['total_cart'] ,2);
        $views_products = (new ProductService())->viewBefore();
        $suggest_products = (new ProductService())->suggestProducts();
        return view($this->view.'index', get_defined_vars());
    }
    public function viewCart()
    {
        $carts = (new CartService())->carts()['data'];
        $res = view($this->viewAjax.'carts')->with(['carts'=>$carts['carts']])->render();

        $carts['data'] =
            [
                'count_products' => count($carts['carts']),
                'total_cart' => $carts['total_cart'],
                'products' => $res
            ];
        return $carts;
    }
    public function store(CartRequest $request)
    {
        $product = Product::withDescription()->find($request->product_id);
        if(!$product)
        {
            return ResponseService::notFound();
        }
        $carts = (new CartService())->createCart($request->all());
 
        $data['subject'] = 'FurnitureHub';
        $data['name'] = Auth::user()->name;
        $data['productName'] = $product->name;
        $data['productImage'] = $product->image;
        $data['productsku'] = $product->sku_code;

        return $carts;
    }
    public function update(Request $request,$id) :JsonResponse
    {
        $carts = (new CartService())->editCart($request->all(),$id);
        return $carts;
    }
    public function destroy($id) :JsonResponse
    {
        $carts = (new CartService())->deleteCart($id);
        return $carts;
    }
}
