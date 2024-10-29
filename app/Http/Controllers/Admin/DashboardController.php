<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\Governorate;

class DashboardController extends Controller
{
    private $viewDirectory = 'admin.';

    /**
     * View Home Screen.
     * @return view
     */
    public function index(): View
    {

        return view($this->viewDirectory . 'index');
    }
    public function createAndUpdate(Request $request)
    {
        $theme = $request->input('theme');

        if($theme && in_array($theme,['dark','light']))
        {
            $cookie = cookie('theme',$theme,60*24*365);
        }
        return back()->withCookie($cookie);
    }

    /**
     * View Login Screen.
     * @return view
     */
    public function login(): View
    {
        $action = route('login_check');
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
        $userLogin = User::where('email', $request->email)->whereIn('role', ['admin', 'super_admin', 'sub_admin'])->first();
        if ($userLogin) {
            if (Auth::attempt(['email' => request('email'), 'password' => request('password')], $remember)) {
                return Redirect::to(getCurrentLocale() . '/admin');
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
        return Redirect::to(getCurrentLocale() . '/admin/login');
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
