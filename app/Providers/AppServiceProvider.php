<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\User;
use App\Models\Module;
use App\Models\Slider;
use App\Models\Country;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Language;
use App\Models\UserModule;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Services\Currency\CurrencyService;
use App\Services\Product\Cart\CartService;
use App\Services\Product\Favorite\FavoriteService;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        \URL::forceScheme('https');

        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        // CMS Supported Languages
        View::composer('*', function ($view) {
            // Current Lang
            $theme = request()->cookie('theme', 'default-theme');
            $view->with('theme', $theme);
            $shipping_cost = 0 ;
            $view->with('shipping_cost', $shipping_cost);
            $user_info = Auth::user();
            $view->with('user_info', $user_info);

            $footer_cards = Page::withDescription([1, 2, 3, 4, 5])->cursor();
            $view->with('footer_cards', $footer_cards);

            // Current User Info
            $userInfo = (object) ['photo' => 'uploads/avatar.png'];
            if (Auth::check()) {
                $cart = (new CartService())->carts()['data'];
                $carts = $cart['carts'];
                $view->with('carts', $carts);
            }
            if (Auth::check() && Auth::user()->role != 'user') {
                $ids = UserModule::where('user_id', Auth::user()->id)->pluck('module_id');
                $userNodules = Module::find($ids);
                $view->with('userNodules', $userNodules);
                $view->with('CurrentUserInfo', $userInfo);
                $special_modules = ['affiliateusers', 'statistics', 'affiliates', 'affiliateorders', 'sellerrequests', 'quantities', 'carts', 'settings', 'pages', 'mails', 'contacts', 'rates', 'orders', 'notifications', 'banners', 'accepts', 'demands'];
                $stop_modules = ['profile', 'subcategories', 'site-map'];
                $sub_modules = ['categories'];
                $view->with('special_modules', $special_modules);
                $view->with('stop_modules', $stop_modules);
                $view->with('sub_modules', $sub_modules);
            }
        });
    }
}
