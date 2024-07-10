<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\AccountRequest;
use App\Models\Address;
use App\Models\Notification;
use App\Models\Order;
use App\Models\User;
use App\Services\Response\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $redirect = '/account';

    public function index(): View
    {
        $title = __('web.account_page');

        $query_notification = Notification::latest()
            ->join('notification_descriptions AS nd', 'notifications.id', 'nd.notification_id')
            ->join('languages', 'languages.id', 'nd.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->where('notifications.deleted_at', null)
            ->where('notifications.user_id', Auth::user()->id)
            ->select(['nd.*', 'notifications.*']);

        $query_order = Order::latest()
        ->where('orders.deleted_at',null)
        ->where('orders.user_id',Auth::user()->id)
        ->select(['orders.*'])
        ->with('products','payment');

        $query_address = Address::latest()
            ->where('deleted_at', null)
            ->where('user_id', Auth::user()->id);

        $user = Auth::user();

        $action = route('account.update', $user);

        $notifications = $query_notification->paginate(5);
        $orders = $query_order->paginate(5);
        $addresses = $query_address->take(5)->get();
        return view('web.pages.account', get_defined_vars());
    }

    public function notification(Request $request){
        $query_notification = Notification::latest()
            ->join('notification_descriptions AS nd', 'notifications.id', 'nd.notification_id')
            ->join('languages', 'languages.id', 'nd.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->where('notifications.deleted_at', null)
            ->where('notifications.user_id', Auth::user()->id)
            ->select(['nd.*', 'notifications.*']);
        $notifications = $query_notification->paginate(5);
        return view('web.Ajax.notification', get_defined_vars())->render();

        
    }
    public function orders(){
        $query_order = Order::latest()
        ->where('orders.deleted_at',null)
        ->where('orders.user_id',Auth::user()->id)
        ->select(['orders.*'])
        ->with('products','payment');
        $orders = $query_order->paginate(5);

        return view('web.Ajax.orders', get_defined_vars())->render();

    }
    
    
    public function update(AccountRequest $request, $id)
    {
        $user = User::FindOrFail($id);
        $update = $user->update($request->all());
        if ($update) {
            $status = 200;
            $msg = [__('web.success')];
            $target = route('account.index');

        } else {
            $status = 400;
            $msg = [__('web.failed')];
            $target = route('account.index');

        }

        $response =
            [
            'status' => $status,
            'msg' => $msg,
            'data' => $target,
        ];
        return ResponseService::response($response);
    }

}

