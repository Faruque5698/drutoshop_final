<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[\App\Http\Controllers\Api\AuthController::class,'register']);
Route::post('login',[\App\Http\Controllers\Api\AuthController::class,'login']);

Route::post('reset-password/email', [\App\Http\Controllers\Api\UserPasswordResetController::class, 'resetPassword']);
Route::post('reset-token/check', [\App\Http\Controllers\Api\UserPasswordResetController::class, 'resetToken']);
Route::post('password-change', [\App\Http\Controllers\Api\UserPasswordResetController::class, 'changePassword']);

Route::get('banner',[\App\Http\Controllers\Api\BannerController::class,'banner']);
Route::get('ads',[\App\Http\Controllers\Api\BannerController::class,'ads']);
Route::get('brand',[\App\Http\Controllers\Api\CategoryController::class,'brand']);
Route::get('category',[\App\Http\Controllers\Api\CategoryController::class,'category']);
Route::get('subcat-product/{id}',[\App\Http\Controllers\Api\CategoryController::class,'subcatProduct']);
Route::get('brand-product/{id}',[\App\Http\Controllers\Api\CategoryController::class,'brandProduct']);
Route::get('all-products',[\App\Http\Controllers\Api\ProductController::class,'product']);
Route::get('just-landed',[\App\Http\Controllers\Api\ProductController::class,'justLanded']);

//Route::get('product/trending',[\App\Http\Controllers\Api\ProductController::class,'trending']);
Route::get('product/popular',[\App\Http\Controllers\Api\ProductController::class,'popular']);
Route::get('product/exclusive',[\App\Http\Controllers\Api\ProductController::class,'exclusive']);

Route::get('product/details/{id}',[\App\Http\Controllers\Api\ProductController::class,'pro_details']);




Route::group(["middleware" => ["auth:api"]], function(){

    Route::post('device-token', [App\Http\Controllers\Api\AuthController::class, 'deviceToken']);

    Route::get("profile", [\App\Http\Controllers\Api\AuthController::class, "profile"]);
    Route::post("profile/edit", [\App\Http\Controllers\Api\AuthController::class, "edit"]);
    Route::post("profile/image/update", [\App\Http\Controllers\Api\AuthController::class, "imageUpdate"]);
    Route::post("change-password", [\App\Http\Controllers\Api\AuthController::class, "changePassword"]);

    Route::post('address/save',[\App\Http\Controllers\Api\AddressController::class,'save']);
    Route::get('address/all',[\App\Http\Controllers\Api\AddressController::class,'all']);
    Route::get('address/remove/{id}',[\App\Http\Controllers\Api\AddressController::class,'remove']);

    Route::post("logout", [\App\Http\Controllers\Api\AuthController::class, "logout"]);



    Route::post('product/favourite/add',[\App\Http\Controllers\Api\FavouriteProductController::class,'favproduct']);

    Route::get('product/favourite',[\App\Http\Controllers\Api\FavouriteProductController::class,'favproductlist']);
    Route::get('product/favourite/remove/{id}',[\App\Http\Controllers\Api\FavouriteProductController::class,'remove']);

    Route::post('cart/add',[\App\Http\Controllers\Api\CartController::class,'add']);
    Route::post('cart/update',[\App\Http\Controllers\Api\CartController::class,'update']);
    Route::get('cart/view',[\App\Http\Controllers\Api\CartController::class,'view']);
    Route::get('cart/remove/{id}',[\App\Http\Controllers\Api\CartController::class,'remove']);

    Route::post('rating',[\App\Http\Controllers\Api\RatingController::class,'add']);

//    Route::post('comment',[\App\Http\Controllers\Api\CommentController::class,'add']);
    Route::post('order/cash-on-delivery',[\App\Http\Controllers\Api\OrderController::class,'cash_on_delivary']);
    Route::get('order/all',[\App\Http\Controllers\Api\OrderController::class,'order_all']);

    Route::get('order/history',[\App\Http\Controllers\Api\OrderController::class,'history']);
    Route::get('order/history/pending',[\App\Http\Controllers\Api\OrderController::class,'pending']);
    Route::get('order/history/confirm',[\App\Http\Controllers\Api\OrderController::class,'confirm']);
    Route::get('order/history/cancel',[\App\Http\Controllers\Api\OrderController::class,'cancel']);
    Route::get('order/history/success',[\App\Http\Controllers\Api\OrderController::class,'success']);


    Route::post('payment',[\App\Http\Controllers\Api\DepositController::class,'depositInsert'])->name('api.deposit');

    Route::get('deposit-confirm/{track}',[\App\Http\Controllers\Gateway\PaymentController::class,'apiDepositConfirm'])->name('deposit-api.confirm');

    Route::post('ipn/api/g103', [\App\Http\Controllers\Gateway\g103\ProcessController::class,'ipnApi'])->name('ipn.api.g103'); // API Stripe







});

Route::get('flash/deal/20',[\App\Http\Controllers\AdminPanel\FlashDealController::class,'deal_20']);
Route::get('flash/deal/25',[\App\Http\Controllers\AdminPanel\FlashDealController::class,'deal25']);
Route::get('flash/deal/30',[\App\Http\Controllers\AdminPanel\FlashDealController::class,'deal30']);
Route::get('flash/deal/35',[\App\Http\Controllers\AdminPanel\FlashDealController::class,'deal35']);
Route::get('flash/deal/40',[\App\Http\Controllers\AdminPanel\FlashDealController::class,'deal40']);
Route::get('flash/deal/45',[\App\Http\Controllers\AdminPanel\FlashDealController::class,'deal45']);
Route::get('flash/deal/50',[\App\Http\Controllers\AdminPanel\FlashDealController::class,'deal50']);
