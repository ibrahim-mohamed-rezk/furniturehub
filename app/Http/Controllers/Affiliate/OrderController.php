<?php

namespace App\Http\Controllers\Affiliate;

use App\Models\User;
use App\Models\Order;
use Illuminate\View\View;
use App\Models\OrderPayment;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
        /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    private $view = 'affiliate.orders.';
    private $redirect = '/affiliate/orders/';
    private $routes = 'affiliateorders';

    public function index(Request $request): View
    {
        $title = __('orders.index');
        $user_affiliate = User::where('email', Auth::user()->email)->where('role', 'affiliate')->first();
        $users_ids = User::where('affiliate_id', $user_affiliate->id)->pluck('id');

        $query = Order::latest()->whereIn('user_id', $users_ids);
        $ratings = [1,2,3,4,5];
        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $orders = $filter['orders'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $order_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->id) {
            $query->where('id', $request->id);
        }

        if ($request->user) {
            $ids = User::where('name', 'LIKE', '%'.$request->name.'%')->pluck('id');
            $query->whereIn('user_id',$ids);
        }
        if ($request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $orders = $query->onlyTrashed()->paginate($paginate);
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $orders = $query->paginate($paginate);
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'orders' => $orders,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }
    public function show(Order $order)
    {
        $title = __('orders.show');
        $products = OrderProduct::where('order_id',$order->id)->cursor();
        $payment = OrderPayment::where('order_id',$order->id)->first();

        return view($this->view . 'form', get_defined_vars());
    }
}
