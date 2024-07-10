<?php


use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function(){
    
    Route::group([ 'prefix'=> 'affiliate', 'namespace' => 'Affiliate'], function () {
        Route::group( ['middleware'=>['AffiliateGuest']] , function() {
            Route::get('login','DashboardController@login');
            Route::post('login', 'DashboardController@check')->name('login_check_affiliate');
        });

        Route::group( ['middleware'=>['AffiliateAuth']] , function() {
            Route::get('/', 'DashboardController@index')->name('affiliate_home');
            Route::get('/logout', 'DashboardController@logout')->name('affiliate_logout');

            Route::group([ 'middleware' => ['ModuleCheck']], function () {
                Route::resource('affiliateusers','AffiliateUserController');
                Route::resource('profile_affiliate','ProfileController')->only('index','store');
                Route::resource('affiliateorders','OrderController')->only('index','show','destroy');

            });
        });
    });
});
