<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\AddressController;
use App\Http\Controllers\API\V1\ProfileController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['middleware' => 'ApiLang'], function () {
    Route::group(['prefix' => 'v1', 'namespace' => 'API\V1'], function () {
        Route::apiResource('products-api', 'ProductController')->except(['store', 'update', 'destroy']);
        Route::apiResource('blogs-api', 'BlogController')->except(['store', 'update', 'destroy']);
        Route::apiResource('categories-api', 'CategoryController')->except(['store', 'update', 'destroy']);
        Route::apiResource('home', 'HomeController')->except(['store', 'update', 'destroy']);
        Route::apiResource('currencies-api', 'CurrencyController')->only('index');
        Route::get('governorates-api', 'GovernorateController@index');
        Route::get('settings', 'HomeController@settings');
        Route::get('version', 'HomeController@version');

        Route::group(['middleware' => 'guestApi'], function () {
            Route::post('/register-api', 'AuthController@register');
            Route::post('/login-api', 'AuthController@login');
            Route::post('/send-code','AuthController@Send_code');
            Route::post('/verfiy-code','AuthController@verfiy_code');
            Route::post('/reset-password','AuthController@reset_password');
            Route::get('login/google/callback/{uid}', "AuthController@handleGoogleLogin");
            Route::get('login/facebook/callback/{uid}', "AuthController@handleFacebookLogin");
        });
        Route::group(['middleware' => ['auth:sanctum']], function () {
            Route::get('logout-api', 'AuthController@logout');
            Route::get('notifications-api', 'ProfileController@notification');
            Route::apiResource('/cart-api', 'CartController')->only('index', 'store', 'update', 'destroy');
            Route::post('/use-cobon', 'CartController@use_cobon');
            Route::post('order-api', 'OrderController@make_order');
            Route::post('/favourite-api', 'ProductController@favourite');
            Route::get('/favourites-api', 'ProductController@favourites');
            Route::get('/payment-method-api/{type}', 'OrderController@get_type');
            Route::controller(AddressController::class)->group(function () {
                Route::get('addresses-api', 'index');
                Route::post('address-api', 'store');
                Route::post('address-api/{id}', 'update');
                Route::post('address-default-api/{id}', 'default_address');
                Route::get('delete-address-api/{id}', 'delete_address');
            });
            Route::controller(ProfileController::class)->group(function () {
                Route::get('orders-api', 'orders');
                Route::post('update-profile-api', 'update');
                Route::post('update-currency-api', 'update_currency');
            });
        });
    });
});
Route::fallback(function () {
    return response()->json([
        'data' => [],
        'success' => false,
        'status' => 404,
        'message' => 'Invalid Route'
    ]);
});
