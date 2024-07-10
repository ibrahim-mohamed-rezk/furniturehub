<?php

namespace App\Http\Controllers\Affiliate;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\AffiliateSystem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Admin\LoginRequest;

class DashboardController extends Controller
{
    private $viewDirectory = 'affiliate.';

    /**
     * View Home Screen.
     * @return view
     */
    public function index(Request $request): View
    {
        $title = __('affiliates.affiliate');
        $user_affiliate = User::where('email', Auth::user()->email)->where('role', 'affiliate')->first();
        $affiliate_count = AffiliateSystem::where('user_id', $user_affiliate->id)->first();
        $users = User::where('affiliate_id', $user_affiliate->id)->get();
        $users_ids = User::where('affiliate_id', $user_affiliate->id)->pluck('id');
        $query = Order::whereIn('user_id', $users_ids);
        $orders = $query->get();
        $orders_count = $query->count();
        $users_chart = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))->whereNull('deleted_at')
            ->groupBy('month')
            ->orderBy('month')
            ->where('affiliate_id', $user_affiliate->id)
            ->get();
        $orders_chart = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))->whereNull('deleted_at')
            ->groupBy('month')
            ->orderBy('month')
            ->whereIn('user_id', $users_ids)
            ->get();
        $data_users = [];
        $data_orders = [];
        for ($i = 1; $i < 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $count = 0;
            foreach ($users_chart as $user) {
                if ($user->month == $i) {
                    $count = $user->count;
                    break;
                }
            }
            array_push($data_users, $count);
        }

        for ($i = 1; $i < 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $count = 0;
            foreach ($orders_chart as $order) {
                if ($order->month == $i) {
                    $count = $order->count;
                    break;
                }
            }
            array_push($data_orders, $count);
        }
        $visitors = json_encode($data_users);
        $sales = json_encode($data_orders);




        return view($this->viewDirectory . 'index', get_defined_vars());
    }
    public function createAndUpdate(Request $request)
    {
        $theme = $request->input('theme');

        if ($theme && in_array($theme, ['dark', 'light'])) {
            $cookie = cookie('theme', $theme, 60 * 24 * 365);
        }
        return back()->withCookie($cookie);
    }
    /**
     * View Login Screen.
     * @return view
     */
    public function login(): View
    {
        $action = route('login_check_affiliate');
        return view($this->viewDirectory . 'login', get_defined_vars());
    }

    /**
     * Function for Admin login to the cms.
     * @param LoginRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function check(LoginRequest $request): RedirectResponse
    {
        $remember = $request->has('remember') ? true : false;
        $userLogin = User::where('email', $request->email)->where('role', 'affiliate')->first();
        if ($userLogin) {
            if (Auth::attempt(['email' => request('email'), 'password' => request('password')], $remember)) {
                
                return Redirect::to(getCurrentLocale() . '/affiliate');
            }
        }
        return Redirect::back()->with('error', __('web.not_exist'));
    }

    /**
     * Admin logout.
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return Redirect::to(getCurrentLocale() . '/affiliate/login');
    }

    /**
     * Change lang
     * @param Request $request
     * @return view
     */
    public function set($lang, Request $request)
    {
        $acceptedLang = ['en', 'ar'];
        if (!in_array($lang, $acceptedLang)) {
            $lang = "ar";
        }
        $request->session()->put('lang', $lang);
        return back();
    }
}
