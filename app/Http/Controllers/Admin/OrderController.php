<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\OrderPayment;
use App\Models\OrderProduct;
use App\Models\ProductDescription;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    private $view = 'admin.orders.';
    private $redirect = '/admin/orders/';
    private $routes = 'orders';

    public function index(Request $request): View
    {
        $title = __('orders.index');
        $query = Order::latest();
        $ratings = [1, 2, 3, 4, 5];
        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $orders = $filter['orders'];
        $count = $filter['count'];
        $sum = $filter['sum'];
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
            $ids = User::where('name', 'LIKE', '%' . $request->name . '%')->pluck('id');
            $query->whereIn('user_id', $ids);
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
            $count = $query->onlyTrashed()->count();
            $sum = $query->onlyTrashed()->sum('total');
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $orders = $query->paginate($paginate);
            $count = $query->count();
            $sum = $query->sum('total');
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'orders' => $orders,
            'count' => $count,
            'sum' => $sum,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }

    public function show(Order $order)
    {
        $title = __('orders.show');
        $order_id = $order->id;
        $label_message = $order->label_message;
        $products = OrderProduct::where('order_id', $order->id)->cursor();
        $payment = OrderPayment::where('order_id', $order->id)->first();
        $address = Address::where('user_id', $order->user_id)->first();

        return view($this->view . 'form', get_defined_vars());
    }


    /**
     * Remove Or Return the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $order = Order::where('id', $id)->withTrashed()->first();

        if (is_null($order->deleted_at)) {
            $order->delete();
        } else {
            $order->restore();
        }
        return redirect(getCurrentLocale() . $this->redirect);
    }
    public function confirm($id)
    {
        $order = Order::where('id', $id)->first();
        $order->update([
            'label' => Auth::user()->name
        ]);


        return back();
    }
    public function label_text(Request $request)
    {
        $order = Order::where('id', $request->id)->first();
        $order->update([
            'label'=>Auth::user()->name,
            'label_message' => $request->message
        ]);

        return back();
    }
}
