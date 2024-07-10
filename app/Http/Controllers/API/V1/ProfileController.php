<?php

namespace App\Http\Controllers\API\V1;

use App\Models\User;
use App\Models\Order;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Web\AccountRequest;
use App\Http\Requests\API\CurrencyRequest;
use App\Http\Resources\Profile\OrderResource;
use App\Services\Response\ApiResponseService;
use App\Http\Resources\Profile\NotificationResource;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProfileController extends Controller
{
    public function notification(Request $request){
        $user = Auth::guard('sanctum')->user();

        $query_notification = Notification::latest()
            ->join('notification_descriptions AS nd', 'notifications.id', 'nd.notification_id')
            ->join('languages', 'languages.id', 'nd.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->where('notifications.deleted_at', null)
            ->where('notifications.user_id', $user->id)
            ->select(['nd.*', 'notifications.*']);
        $notifications = $query_notification->paginate(5);
        return NotificationResource::collection($notifications);

        
    }
    public function orders(Request $request){
        $query_order = Order::latest()
        ->where('orders.deleted_at',null)
        ->where('orders.user_id',$request->user()->id)
        ->select(['orders.*'])
        ->with('products','payment');
        $orders = $query_order->paginate(5);

        return OrderResource::collection($orders);
    }
    
    
    public function update(AccountRequest $request)
    {
        $content = $request->except('password');
        $user = User::FindOrFail($request->user()->id);
        $update = $user->update($content);
        if ($update) {
            $status = 200;
            $msg = __('web.success');
            $target = 
                new UserResource($user)
            ;

        } else {
            $status = 400;
            $msg = [__('web.failed')];
            $target =[];

        }

        $response =
            [
            'status' => $status,
            'msg' => $msg,
            'data' => $target,
        ];
        return ApiResponseService::response($response);
    }
    public function update_currency(CurrencyRequest $request)
    {
        $user = User::where('id',$request->user()->id)->first();
        if($user){
            $user->update([
                'currency_id'=>$request->currecny_id
            ]);
            $status = 200;
            $msg = __('web.success');
            $target = new UserResource($user);
        }else{
            $status = 400;
            $msg = [__('web.failed')];
            $target =[];
        }
        $response =
            [
            'status' => $status,
            'msg' => $msg,
            'data' => $target,
        ];
        return ApiResponseService::response($response);

    } 
}
