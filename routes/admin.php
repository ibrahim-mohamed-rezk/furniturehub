<?php

use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function(){

    Route::group([ 'prefix'=> 'admin', 'namespace' => 'Admin'], function () {
        Route::group( ['middleware'=>['AdminGuest']] , function() {
            Route::get('login','DashboardController@login');
            Route::post('login', 'DashboardController@check')->name('login_check');
        });

        Route::group( ['middleware'=>['AdminAuth']] , function() {
            Route::get('/', 'DashboardController@index')->name('admin_home');
            Route::post('/cookie/create/update','DashboardController@createAndUpdate')->name('create-update');

            Route::get('/logout', 'DashboardController@logout')->name('admin_logout');

            Route::get('/addphoto', 'FetchController@addphoto');
            Route::get('/removephoto', 'FetchController@removephoto');
            Route::get('/addsection', 'FetchController@addsection');
            Route::get('/addpoint', 'FetchController@addpoint');
            Route::get('/additem', 'FetchController@additem');
            Route::get('/addtag', 'FetchController@addtag');
            Route::post('/upload-ckeditor','FetchController@upload_ckeditor')->name('ckeditor.upload');
            Route::get('/show-category-stat','CategoryController@see_more_category')->name('more_category');
            Route::get('/search/category', 'FetchController@searchCategory');
            Route::get('/search/product', 'FetchController@searchProduct');

            Route::get('affiliate/accept/{id}','AffiliateController@accept')->name('affiliate.accept');
            Route::get('affiliate/refuse/{id}','AffiliateController@refuse')->name('affiliate.refuse');
            Route::get('carts/confirm/{id}','CartController@confirm')->name('web.confirm');
            Route::post('carts/label_text','CartController@label_text')->name('Carts.confirm_message');
            Route::post('orders/label_text','OrderController@label_text')->name('orders.confirm_message');
            Route::get('orders/confirm/{id}','OrderController@confirm')->name('orders.confirm');
            Route::get('users/track/{id}','UserController@track')->name('users.track');
            Route::post('users/track/{user}','UserController@make_task')->name('users.create_task');
            Route::get('/export_carts_pdf','CartController@export')->name('export_carts_pdf');
            Route::group([ 'middleware' => ['ModuleCheck']], function () {
                Route::resource('users','UserController');
                Route::resource('members','MemberController');
                Route::resource('profile','ProfileController')->only('index','store');
                Route::resource('accepts','AcceptController')->only('index','edit','update');
                Route::resource('demands','DemandController')->only('index','show');
                Route::resource('affiliates','AffiliateController')->only('index','show','destroy');
                Route::resource('articles','ArticleController');
                Route::get('articles/show-article/{id}','ArticleController@show_article')->name('articles.show_article');
                Route::resource('branches','BranchController');
                Route::resource('categories','CategoryController');
                Route::resource('subcategories','SubCategoryController');
                Route::resource('cobons','CobonController');
                Route::resource('countries','CountryController');
                Route::resource('governorates','GovernorateController');
                Route::resource('sellerrequests','RequestSellerController');
                Route::resource('carts','CartController');
                Route::resource('faqs','FaqController');
                Route::resource('offers','OfferController');
                Route::resource('sellers','SellerController');
                Route::resource('sliders','SliderController');
                Route::resource('quantities','QuantityController');
                Route::resource('banners','BannerController');
                Route::resource('banks','BankController');
                Route::resource('teams','TeamController');
                Route::resource('types','TypeController');
                Route::resource('currencies','CurrencyController');
                Route::resource('products','ProductController');
                Route::resource('statistics','StatisticController');
                Route::delete('product-force-delete/{id}','ProductController@force_delete')->name('products.force_delete');
                Route::resource('notifications','NotificationController')->only('index','store');
                Route::resource('rates','RateController')->only('index','show','destroy');
                Route::resource('orders','OrderController')->only('index','show','destroy');
                Route::resource('pages','PageController')->only('index','edit','update');
                Route::resource('contacts','ContactController')->only('index','edit','destroy');
                Route::resource('mails','MailController')->only('index','destroy');
                Route::resource('settings','SettingController')->only('index','store');
                Route::resource('site-map','SiteMapController')->only('index','store');
                Route::get('mobile-notifications','NotificationController@mobile_notification')->name('notifications.mobile_notification');
                Route::post('mobile-notifications','NotificationController@mobile_notification_store')->name('notifications.mobile_notification_store');
            });
        });
    });
});
Route::get('/site-map', function () {
    ini_set('max_execution_time', 180);

    Artisan::call('sitemap:generate');
    return back();
})->name('admin.site_map');