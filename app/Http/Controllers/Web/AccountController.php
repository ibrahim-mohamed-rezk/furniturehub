<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use Illuminate\View\View;
use App\Models\Governorate;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Web\AccountRequest;
use App\Http\Requests\Web\UpdatePhoneRequest;
use App\Services\Response\ResponseService;
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
        return view('web.pages.profile.dashboard', get_defined_vars());
    }

    public function notification(Request $request)
    {
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
    public function orders()
    {
        $title = __('web.orders');
        $query_order = Order::latest()
            ->where('orders.deleted_at', null)->whereNotNull('token')
            ->where('orders.user_id', Auth::user()->id)
            ->select(['orders.*'])
            ->with('products', 'payment');
        $orders = $query_order->paginate(5);

        return view('web.pages.profile.orders', get_defined_vars())->render();
    }


    public function update(AccountRequest $request, $id)
    {
        $user = User::FindOrFail($id);
        $update = $user->update($request->all());
        if ($update) {
            $status = 200;
            $msg = [__('web.success')];
            $target = route('web.profile');
        } else {
            $status = 400;
            $msg = [__('web.failed')];
            $target = route('web.profile');
        }

        $response =
            [
                'status' => $status,
                'msg' => $msg,
                'data' => $target,
            ];
        return ResponseService::response($response);
    }

    public function profile()
    {
        $title = __('web.account');

        $governorates = Governorate::withDescription()->cursor();

        $user = Auth::user();

        $action = route('account.update', $user);
        return view('web.pages.profile.account', get_defined_vars());
    }
    public function addresses()
    {
        $title = __('web.addresses');

        $governorates = Governorate::latest()
            ->join('governorate_descriptions AS gd', 'governorates.id', 'gd.governorate_id')
            ->join('languages', 'languages.id', 'gd.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->where('governorates.deleted_at', null)
            ->select('gd.*', 'governorates.*')->get();
        $action = route('address.store');
        $query_address = Address::latest()
            ->where('deleted_at', null)
            ->where('user_id', Auth::user()->id);
        $addresses = $query_address->take(5)->get();
        $default_address = Address::where('user_id', auth()->user()->id)->where('default_address', 1)->first();

        return view('web.pages.profile.address', get_defined_vars());
    }
    public function update_phone(UpdatePhoneRequest $request){
        $data = $request->validated();
        $user = auth()->user();
        $update = $user->update([
            'phone'=>$data['country_code'].$data['phone']
        ]);
        if ($update) {
            $status = 200;
            $msg = [__('web.success')];
            $target = route('web.index');
        } else {
            $status = 400;
            $msg = [__('web.failed')];
            $target = route('web.index');
        }

        $response =
            [
                'status' => $status,
                'msg' => $msg,
                'data' => $target,
            ];
        return ResponseService::response($response);


    }
    public function download()
    {
        return view('web.pages.profile.download');
    }
}
