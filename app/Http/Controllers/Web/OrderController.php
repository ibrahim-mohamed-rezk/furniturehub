<?php

namespace App\Http\Controllers\Web;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Address;
use App\Models\Product;
use App\Models\Cobon;
use App\Models\OrderPayment;
use App\Models\OrderProduct;
use App\Services\Product\Payment\PaymobServiceNew;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Web\OrderRequest;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Session;
use App\Services\Currency\CurrencyService;
use App\Services\Product\Cart\CartService;
use App\Services\Response\ResponseService;
use App\Services\Product\Order\OrderService;
use App\Services\Product\Payment\PaymentMethod;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use PDF;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    private $view = 'web.order.';
    private $viewAjax = 'web.order.ajax.';
    private $cartService;
    private $orderService;
    private $currencyService;

    public function __construct(CartService $cartService, OrderService $orderService, CurrencyService $currencyService)
    {
        $this->cartService = $cartService;
        $this->orderService = $orderService;
        $this->currencyService = $currencyService;
    }

    public function index()
    {
        $title = __('web.order_details');
        $user = Auth::user();
        $cartData = $this->cartService->carts()['data'];
        $carts = $cartData['carts'];
        $address = Address::where('user_id', $user->id)->where('default_address', 1)->first();

        return view($this->view . 'index', compact('title', 'user', 'carts', 'address'));
    }

    public function store(OrderRequest $request)
    {
        $user = Auth::user();
        $cartCount = Cart::where('user_id', $user->id)->count();

        if ($cartCount == 0) {
            return ResponseService::response([
                'status' => 400,
                'msg' => [__('web.cart_is_empty')],
                'data' => null,
            ]);
        }

        $address = Address::where('user_id', $user->id)->first();

        if (!$address) {
            return ResponseService::response([
                'status' => 400,
                'msg' => [__('web.please_add_address_first')],
                'data' => null,
            ]);
        }

        // Start a database transaction to ensure all operations succeed together
        DB::beginTransaction();
        try {
            $currency = $this->currencyService->getCurrency();
            $calculate = $this->orderService->calculate($request->all());

            // Calculate the order's total and remaining amount based on payment status
            $total = $request->status == 'cardDeposit'
                ? $calculate['total'] * 0.3
                : $calculate['total'];
            $remain = $calculate['total'] - $total;

            // Create the order
            $order = Order::create([
                'status' => 'wait_pay',
                'total' => $total * $currency->value,
                'remain' => $remain * $currency->value,
                'total_products' => $calculate['total_products'] * $currency->value,
                'total_delivery' => $calculate['total_delivery'] * $currency->value,
                'tax_value' => $calculate['tax_value'] * $currency->value,
                'cobon_discount' => $calculate['cobon']['discount'] * $currency->value,
                'offer_discount' => $calculate['offer']['discount'] * $currency->value,
                'cobon_id' => $calculate['cobon']['cobon_id'],
                'offer_id' => $calculate['offer']['offer_id'],
                'user_id' => $user->id,
                'seller_id' => $user->seller_id,
                'affiliate_profit' => ($total * $currency->value) * settings('affiliate_profit'),
            ]);

            // Process each cart item and add to the order
            $carts = $this->cartService->carts()['data']['carts'];
            foreach ($carts as $cart) {
                $productTotal = ($cart->product->cost_discount ?? $cart->product->cost) * $currency->value;
                OrderProduct::create([
                    'order_id' => $order->id,
                    'count' => $cart->count,
                    'product_id' => $cart->product_id,
                    'total' => $productTotal,
                ]);
            }

            // Payment integration
            $integration = new PaymentMethod($request->status);
            $payment = new PaymobServiceNew($order, $user, $integration->getIframe(), $integration->getId(), $carts);
            $token = $payment->intention();

            if (is_null($token['id'])) {
                throw new \Exception(__('web.failed'));
            }

            $order->update(['token' => $token['id']]);
            $iframeUrl = "https://accept.paymob.com/unifiedcheckout/?publicKey={$payment->getPublicKey()}&clientSecret={$token['client_secret']}";

            // Commit the transaction
            DB::commit();

            return ResponseService::response([
                'status' => 200,
                'msg' => __('web.success'),
                'data' => $iframeUrl,
            ]);
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollBack();
            return ResponseService::response([
                'status' => 400,
                'msg' => [$e->getMessage()],
                'data' => null,
            ]);
        }
    }

    public function callBack(Request $request)
    {
        $requestContent = $request->all();
        $lang = Session::get('lang');
        LaravelLocalization::setLocale($lang);
        Session::forget('lang');

        if (isset($requestContent['success']) && $requestContent['success'] == "true") {
            DB::transaction(function () use ($requestContent) {
                $order = Order::onlyTrashed()->where('token', $requestContent['order'])->first();

                if ($order) {
                    $order->restore();
                    $order->update(['status' => 'paid']);

                    // Create an OrderPayment record
                    OrderPayment::create([
                        'order_id' => $order->id,
                        'payment_id' => $requestContent['id'],
                        'payment_log' => json_encode($requestContent),
                        'payment_type' => $requestContent['source_data_type']
                    ]);

                    // Update product stock and clean the cart
                    $orderProducts = OrderProduct::where('order_id', $order->id)->get();
                    foreach ($orderProducts as $orderProduct) {
                        $product = Product::find($orderProduct->product_id);
                        if ($product) {
                            $product->decrement('count', $orderProduct->count);
                            Cart::where('user_id', $order->user_id)->where('product_id', $orderProduct->product_id)->delete();
                        }
                    }

                    // Send order confirmation email
                    Mail::to(Auth::user()->email)->send(new OrderMail([
                        'name' => Auth::user()->name,
                        'subject' => 'FurnitureHub',
                    ]));
                }
            });

            return view('web.receipt.index');
        }

        return redirect($lang . '/account')->with('error', __('web.failed'));
    }

    public function calculate(Request $request)
    {
        $calculate = $this->orderService->calculate($request->all());

        $res = view($this->view . 'calculate', ['response' => $calculate])->render();

        return ResponseService::response([
            'status' => 200,
            'msg' => null,
            'data' => $res,
        ]);
    }

    public function generatePDF(Request $request)
    {
        $order = Order::find($request->order_id);
        $orderProducts = OrderProduct::where('order_id', $order->id)->get();

        $pdf = PDF::loadView('web.receipt.pdf', [
            'order' => $order,
            'order_products' => $orderProducts,
            'user' => Auth::user(),
        ]);

        return $pdf->download('receipt.pdf');
    }
}
