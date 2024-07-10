
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix' => LaravelLocalization::setLocale()],function(){
    Route::group(['namespace'=>'Web'],function(){

        Route::group(['middleware'=>['guest']],function(){

            Route::get('/login','AuthController@login')->name('web.login');
            Route::post('/login', 'AuthController@check')->name('web.login_check');

            Route::get('/forgetpassword','AuthController@forgetpassword')->name('web.forget_password');
            Route::post('/forgetpassword','AuthController@forgettinPpassword')->name('web.forgetting_password');

            Route::get('/verify/code','AuthController@verify')->name('web.verify_forget_password');
            Route::post('/verify/code','AuthController@verifying')->name('web.verifying_forget_password');

            Route::get('/resetpassword','AuthController@resetPassword')->name('web.reset_password');
            Route::post('/resetpassword','AuthController@resettingPassword')->name('web.resetting_password');

            Route::get('/register','AuthController@register')->name('web.register');
            Route::post('/register', 'AuthController@registerCheck')->name('web.register_check');

            Route::get('/social-login/redirect/{provider}', 'AuthController@redirectToProvider')->name('social.login');
            Route::get('/social-login/{provider}/callback', 'AuthController@handleProviderCallback')->name('social.callback');

        });
        Route::get('/','WebController@index')->name('web.index');
        Route::get('/change/currency/{id}','CurrencyController@setCurrency')->name('web.change_currency');
        Route::get('product/quick/{id}','ProductController@quickView')->name('web.quick_view');
        Route::get('/contact-us','WebController@contact')->name('web.contact');
        Route::get('/cobon' ,'WebController@cobon')->name('web.cobon');
        Route::post('/newsletter','WebController@newsletter')->name('web.newsletter');
        Route::get('/faq','FaqController@index')->name('web.faq');

        Route::get('/about_us','WebController@about_us')->name('web.about_us');

        Route::get('/condition' ,'WebController@condition')->name('web.condition');

        Route::get('/privacy' ,'WebController@privacy')->name('web.privacy');
        Route::get('/privacy-policy' ,'WebController@privacy_policy')->name('web.privacy_policy');
        Route::get('/return-policy' ,'WebController@return_policy')->name('web.return_policy');
        Route::get('/common-questions' ,'WebController@common_questions')->name('web.common_questions');
        Route::get('/why-furniture-hub' ,'WebController@why_furniture_hub')->name('web.why_furniture_hub');


        Route::get('/interest' ,'WebController@interest')->name('web.interest');

        Route::get('/installment','BankController@installment')->name('web.installment');
        Route::get('/installment-pay','BankController@installment_pay')->name('web.installment_pay');
        Route::get('/get-periods/{bank}', 'BankController@getPeriods');
        Route::post('/calculate-equation', 'BankController@calculate')->name('calculate.equation');

        Route::get('/affiliate-register','AffiliateController@affiliate_register')->name('web.affiliate_register');
        Route::post('/affiliate-register','AffiliateController@check')->name('web.affiliate_request');

        Route::group(['middleware'=>['UserLogged']],function() {

            Route::resource('/account','AccountController');
            Route::resource('/address', 'AddressController')->only('index', 'edit', 'update', 'store', 'destroy');
            Route::get('/default/{id}','AddressController@default_address')->name('default_address');
            Route::get('/calculate/order','OrderController@calculate')->name('order.calculate');

            Route::get('/logout', 'AuthController@logout')->name('web.logout');
            Route::resource('/cart','CartController')->only('index','store','update','destroy');
            Route::get('/cart/view','CartController@viewCart')->name('cart.view');
            Route::resource('/favorite','FavoriteController')->only('index','store','destroy');
            Route::get('/favorite/view','FavoriteController@viewFavorite')->name('favorite.view');
            Route::resource('/compare','CompareController')->only('index','store','destroy');
            Route::resource('/order','OrderController')->only('index','store','show');


        });

        // //////////////////////////////
        // ibrahim mohamed routes
        Route::get('/dashboard',function(){return view('web.pages.profile.dashboard');})->name('web.dashboard');
        Route::get('/profile',function(){return view('web.pages.profile.account');})->name('web.profile');
        Route::get('/addresses',function(){return view('web.pages.profile.address');})->name('web.addresses');
        Route::get('/download',function(){return view('web.pages.profile.download');})->name('web.download');
        Route::get('/orders',function(){return view('web.pages.profile.orders');})->name('web.orders');

        ////////////////////////////////
    
        Route::get('/wishlist','WebController@wishlist')->name('web.wishlist');

    
        Route::get('/checkout','WebController@checkout')->name('web.checkout');

        Route::post('/message/send','WebController@send_message')->name('message.send');
    
        
        Route::get('/customization','CustomizationController@index')->name('web.customization');
        Route::post('/customization','CustomizationController@check')->name('web.customization.check');

        Route::get('/web/addphoto', 'CustomizationController@addphoto');
        Route::get('/web/addextension', 'CustomizationController@addextension');
        


        Route::get('/callback', 'OrderController@callback');
    
        Route::get('/seller-register','SellerController@seller_register')->name('web.seller_register');
        Route::post('/seller-register','SellerController@check')->name('web.seller_request');
        Route::get('/web/seller/addphoto', 'SellerController@addphoto');
    
        Route::get('/quantities','QuantitiesController@index')->name('web.quantities');
        Route::post('/quantities','QuantitiesController@quantities_check')->name('web.quantities_check');
        Route::get('/web/quantities/addphoto', 'QuantitiesController@addphotoquantities');

    
        Route::get('/soon','WebController@soon')->name('web.soon');
        Route::get('/offers','OfferController@offers')->name('web.offers');
    

        Route::get('/shop/{title?}','ProductController@index')->name('web.shop')->where('title', '.*');
        Route::get('/pd/{title}','ProductController@product_details')->name('web.product_details')->where('title', '.*');
    
    
        Route::get('/blog','BlogController@index')->name('web.blog');
        Route::get('/blog-details/{title}','BlogController@blog_details')->name('web.blog_details')->where('title', '.*');
    });

});
Route::fallback(function(){
    return redirect()->route('web.index');
});
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    // Artisan::call('config:cache');
    Artisan::call('view:clear');
    return back();
})->name('clear');