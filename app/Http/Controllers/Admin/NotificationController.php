<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NotificationRequest;
use App\Http\Requests\Admin\MobileNotificationRequest;
use App\Models\Article;
use App\Models\User;
use App\Services\Notification\NotificationService;
use App\Services\Notification\mobileNotificationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\Upload\ImageService;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    private $view = 'admin.notifications.';
    private $redirect = '/admin/notifications/';
    private $redirectMobile = '/admin/mobile-notifications/';
    private $routes = 'notifications';

    public function index(Request $request): View
    {
        // $users = User::cursor();
        $users = User::whereNot('email', 'LIKE', '%info%')->cursor();
        $title = __('notifications.index');
        $action = route('notifications.store');
        $routes = $this->routes;

        return view($this->view . 'index', get_defined_vars());
    }
    public function mobile_notification(Request $request): view
    {
        // $users = User::cursor();
        $users = User::whereNot('email', 'LIKE', '%info%')->cursor();
        $title = __('notifications.mobile_notifications');
        $action = route('notifications.mobile_notification_store');
        $routes = $this->routes;

        return view($this->view . 'mobile', get_defined_vars());

    }
    public function mobile_notification_store(MobileNotificationRequest $request): RedirectResponse
    {
        $status = 'management';
        $notification = new mobileNotificationService();
        if ($request->has('user_id') && is_numeric($request->user_id) && intval($request->user_id) == $request->user_id) {
            // dd($request->all());
            $user = User::where('id', $request->user_id)->first();
            $image = ImageService::uploadImageNotification($request->link) ?? null;

            $notification->sendNotificationToUser($user, $request->name, $request->description,$image);
        } elseif ($request->user_id == 'registered') {
            $image = ImageService::uploadImageNotification($request->link) ?? null;
            $notification->sendPushNotification('registered', $request->name, $request->description,$image);
        } elseif ($request->user_id == 'not_registered') {
            $image = ImageService::uploadImageNotification($request->link) ?? null;

            $notification->sendPushNotification('not_registered', $request->name, $request->description,$image);
        } else {
            $image = ImageService::uploadImageNotification($request->link) ?? null;

            $notification->sendPushNotification('all', $request->name, $request->description,$image);
        }
        return redirect(getCurrentLocale() . $this->redirectMobile);
    }


    /**
     * Store a newly created resource in storage.
     * @param NotificationRequest $request
     * @return RedirectResponse
     */
    public function store(NotificationRequest $request): RedirectResponse
    {
        $status = 'management';
        $notification = new NotificationService();
        if ($request->has('user_id')) {
            $user = User::where('id', $request->user_id)->first();
            $notification->sendNotification($status, $request->user_id, $request->name_ar, $request->name_en, $request->description_ar, $request->description_en, null, null, null);
        }else {
            $users = User::cursor();
            foreach ($users as $user) {
                $notification->sendNotification($status, $user->id, $request->name_ar, $request->name_en, $request->description_ar, $request->description_en, null, null, null);
            }
        }

        return redirect(getCurrentLocale() . $this->redirect);
    }
}
