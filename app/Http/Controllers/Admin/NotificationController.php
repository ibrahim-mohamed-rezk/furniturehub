<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NotificationRequest;
use App\Models\Article;
use App\Models\User;
use App\Services\Notification\NotificationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    private $view = 'admin.notifications.';
    private $redirect = '/admin/notifications/';
    private $routes = 'notifications';

    public function index(Request $request): View
    {
        $users = User::cursor();
        $title = __('notifications.index');
        $action = route('notifications.store');
        $routes = $this->routes;

        return view($this->view . 'index', get_defined_vars());
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

        if($request->user_id)
        {
            $user = User::where('id', $request->user_id)->first();
            $notification->sendNotification($status,$request->user_id,$request->name_ar,$request->name_en,$request->description_ar,$request->description_en,null,null,null);
            // $notification->sendNotificationToUser($user,$request->name_ar,$request->description_ar,);
        }
        else
        {
            $users = User::cursor();
            foreach($users as $user)
            {
                $notification->sendNotification($status,$user->id,$request->name_ar,$request->name_en,$request->description_ar,$request->description_en,null,null,null);
            }
            
        }

        return redirect(getCurrentLocale().$this->redirect);
    }
}