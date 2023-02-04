<?php

use Intervention\Image\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminPanel\SizeController;
use App\Http\Controllers\AdminPanel\AdminController;
use \App\Http\Controllers\AdminPanel\BrandController;
use \App\Http\Controllers\AdminPanel\ColorController;
use App\Http\Controllers\AdminPanel\BannerController;
use \App\Http\Controllers\AdminPanel\GatewayController;
use \App\Http\Controllers\AdminPanel\ProductController;
use \App\Http\Controllers\AdminPanel\ProfileController;
use \App\Http\Controllers\AdminPanel\SettingController;
use App\Http\Controllers\AdminPanel\CategoryController;
use App\Http\Controllers\AdminPanel\AdsBannerController;
use App\Http\Controllers\AdminPanel\FlashDealController;
use App\Http\Controllers\AdminPanel\HomeSectionController;
use \App\Http\Controllers\AdminPanel\MailSettingController;
use \App\Http\Controllers\AdminPanel\OrderDetailController;
use \App\Http\Controllers\AdminPanel\SubcategoryController;
use \App\Http\Controllers\AdminPanel\StockProductController;
use \App\Http\Controllers\AdminPanel\GenarelSettingController;
use \App\Http\Controllers\AdminPanel\AdminForgetPassController;
use App\Http\Controllers\AdminPanel\CustomerNotificationController;




//use Image;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function() {
    $img = Image::make('foo.jpg')->resize(300, 200);
    return $img->response('jpg');
});

Auth::routes();

Route::get('/homes', [App\Http\Controllers\HomeController::class, 'index'])->name('homes');

//Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

// Forget Password

Route::get('forget-password', [AdminForgetPassController::class, "forgetEmail"])->name('forget.email');
Route::post('forget/password', [AdminForgetPassController::class, "getEmail"])->name('send.email');
Route::post('check/otp', [AdminForgetPassController::class, "checkOTP"])->name('check.otp');
Route::post('chenge/password', [AdminForgetPassController::class, "changePass"])->name('change.password');

Route::group(['prefix'=>'admin','middleware'=>'auth','middleware'=>'checkRole'],function (){
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('homes',[HomeSectionController::class,'home'])->name('admin.homes');
    Route::post('update_home',[HomeSectionController::class,'update_home'])->name('update.homes');

    // profile

    Route::get('profile', [ProfileController::class, 'profile'])->name('admin.profile');
    Route::post('profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');

    Route::resource('banner', BannerController::class);
    Route::get('banner/status/{id}', [BannerController::class, 'status'])->name('banner.status');

    Route::prefix('ads-banner')->group(function(){
        Route::get('/index', [AdsBannerController::class, 'index'])->name('admin.adsBanner.index');
        Route::post('/store', [AdsBannerController::class, 'store'])->name('admin.adsBanner.store');
    });

    Route::get('category',[CategoryController::class,'index'])->name('admin.category');
    Route::get('category/add',[CategoryController::class,'add'])->name('add_category');
    Route::post('category/store',[CategoryController::class,'store'])->name('category_store');
    Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category_edit');
    Route::post('category/update',[CategoryController::class,'update'])->name('category_update');
    Route::get('category/unpublished/{id}',[CategoryController::class,'unpublished'])->name('category_unpublished');
    Route::get('category/published/{id}',[CategoryController::class,'published'])->name('category_published');
    Route::delete('category-delete/{id}',[CategoryController::class,'destroy'])->name('category_destroy');


    Route::get('subcategory',[SubcategoryController::class,'index'])->name('admin.subcategory');
    Route::get('subcategory/add',[SubcategoryController::class,'add'])->name('add_subcategory');
    Route::post('subcategory/add',[SubcategoryController::class,'save'])->name('add_subcategory');
    Route::get('subcategory/edit/{id}',[SubcategoryController::class,'edit'])->name('subcategory.edit');
    Route::post('subcategory/update',[SubcategoryController::class,'update'])->name('subcategory.update');
    Route::get('subcategory/unpublished/{id}',[SubcategoryController::class,'unpublished'])->name('subcategory_unpublished');
    Route::get('subcategory/published/{id}',[SubcategoryController::class,'published'])->name('sub-category.published');
    Route::delete('subcategory-delete/{id}',[SubcategoryController::class,'destroy'])->name('subcategory_delete');


    Route::get('brand',[BrandController::class,'index'])->name('admin.brand');
    Route::get('brand/add',[BrandController::class,'add'])->name('add.brand');
    Route::post('brand/add',[BrandController::class,'store'])->name('add.brand');
    Route::get('brand/edit/{id}', [BrandController::class, 'edit'])->name('brnad.edit');
    Route::post('brand/update', [BrandController::class, 'update'])->name('brnad.update');
    Route::get('brand/unpublished/{id}',[BrandController::class,'unpublished'])->name('brand_unpublished');
    Route::get('brand/published/{id}',[BrandController::class,'published'])->name('brand_published');
    Route::delete('Brnad-delete/{id}',[BrandController::class,'destroy'])->name('brand_delete');

    Route::get('color',[ColorController::class,'index'])->name('admin.color');
    Route::get('color/add',[ColorController::class,'add'])->name('add.color');
    Route::post('color/add',[ColorController::class,'store'])->name('add.color');
    Route::get('color/status/{id}',[ColorController::class,'status'])->name('status.color');
    Route::get('color/edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
    Route::post('color/update', [ColorController::class, 'update'])->name('color.update');
    Route::delete('color-delete/{id}',[ColorController::class,'destroy'])->name('color_delete');

    Route::get('size',[SizeController::class,'index'])->name('admin.size');
    Route::get('size/add',[SizeController::class,'add'])->name('add.size');
    Route::post('size/add',[SizeController::class,'store'])->name('add.size');
    Route::get('size/edit/{id}', [SizeController::class, 'edit'])->name('size.edit');
    Route::post('size/update', [SizeController::class, 'update'])->name('size.update');
    Route::get('size/status/{id}',[SizeController::class,'status'])->name('status.size');
    Route::delete('size-delete/{id}',[SizeController::class,'destroy'])->name('size_delete');

    Route::get('product', [ProductController::class, 'index'])->name('admin.product');
    Route::get('product/add', [ProductController::class, 'add'])->name('product.add');
    Route::get('update/qantity', [ProductController::class, 'updateQunatity'])->name('update.quantity');
    Route::post('product/subcateoryid',[ProductController::class, 'getSubId'])->name('product.subcatid');
    Route::post('product/getcolor',[ProductController::class, 'getColor'])->name('product.colorid');
    Route::post('product/getsize',[ProductController::class, 'getSize'])->name('product.sizeid');
    Route::post('product/store-size-color-qty',[ProductController::class, 'storeColorSize'])->name('product.store-size-color-qty');
    Route::get('product/colorPersize',[ProductController::class, 'colorPerSize'])->name('product.colorPerSize');
    Route::get('product/color-per-size/{id}',[ProductController::class, 'deleteColorSize']);
    Route::get('product/varientdelete', [ProductController::class, 'varientDelete'])->name('product.varient.delete');
    Route::post('product/add',[ProductController::class, 'store'])->name('product.add');
    Route::get('product/status/{id}',[ProductController::class, 'status'])->name('product.status');
    Route::get('product/futurs/{id}',[ProductController::class, 'futurs'])->name('product.futurs');
    Route::get('product/trands/{id}',[ProductController::class, 'trands'])->name('product.trands');
    Route::get('product/exclusive/{id}',[ProductController::class, 'exclusive'])->name('product.exclusive');
    Route::get('product/edit/{id}',[ProductController::class, 'edit'])->name('product.edit');
    Route::post('product/update',[ProductController::class, 'update'])->name('product.update');
    Route::delete('product-delete/{id}',[ProductController::class, 'destroy'])->name('product.delete');

    Route::get('product/single/view/{id}', [ProductController::class, 'show'])->name('product.single');

    Route::get('product/flash-deal/all',[FlashDealController::class, 'all_flash'])->name('product.flash.deal.all');
    Route::get('product/flash-deal/{id}',[FlashDealController::class, 'index'])->name('product.flash.deal');
    Route::post('product/flash-deal/store',[FlashDealController::class, 'store'])->name('product.flash.deal.store');




    Route::resource('/stock', StockProductController::class,);
    Route::get('/stock/details/product', [StockProductController::class, 'details_product'])->name('stock.details.product');

    Route::get('order/list', [OrderDetailController::class, 'order'])->name('admin.order');
    Route::get('order/cancel-order-list', [OrderDetailController::class, 'order_cancel'])->name('cancel.order-list');
    Route::get('order/confirm-order-list', [OrderDetailController::class, 'order_confirm'])->name('confirm.order-list');
    Route::get('order/success-order-list', [OrderDetailController::class, 'order_success'])->name('success.order-list');
    Route::get('order/pending-order-list', [OrderDetailController::class, 'order_panding'])->name('panding.order-list');
    Route::get('order/approve/{order_id}', [OrderDetailController::class, 'approve'])->name('order.approve');
    Route::get('order/success/{order_id}', [OrderDetailController::class, 'success'])->name('order.success');
    Route::get('order/cancel/{order_id}', [OrderDetailController::class, 'cancel'])->name('order.cancel');

    Route::get('order-details/{order_id}', [OrderDetailController::class, 'details'])->name('order.details');



    // Settings

     Route::get('setting/genarel', [SettingController::class, 'setting'])->name('setting.genarel');

     // partials routes

    Route::get('setting/email', [SettingController::class, 'email'])->name('setting.email');
    Route::post('setting/mail-update',[MailSettingController::class,'update'])->name('setting.mail.update');
    Route::get('setting/payment/stripe', [SettingController::class, 'stripe_payment'])->name('setting.payment.stripe');
    Route::get('setting/payment/paypal', [SettingController::class, 'paypal_payment'])->name('setting.payment.paypal');
    Route::get('setting/payment/sslcommerz', [SettingController::class, 'paypal_sslcommerz'])->name('setting.payment.sslcommerz');
    Route::get('setting/puhser', [SettingController::class, 'pusher'])->name('setting.pusher');
    Route::post('setting/puhser/add', [SettingController::class, 'add_pusher'])->name('settings.puhser.add');


    // genarel settings

    Route::post('setting/save/genarel', [GenarelSettingController::class, 'genarelStore'])->name('setting.save.genarel');


    // Gateway Route
    Route::post('gateway/payment/sslcommerz', [GatewayController::class, 'gateway_sslcommerz'])->name('gateway.payment.sslcommerz');
    Route::post('gateway/payment/paypal', [GatewayController::class, 'gateway_paypal'])->name('gateway.payment.paypal');
    Route::post('gateway/payment/stripe', [GatewayController::class, 'gateway_stripe'])->name('gateway.payment.stripe');
    Route::post('gateway/payment/stripe', [GatewayController::class, 'gateway_stripe'])->name('gateway.payment.stripe');


    Route::prefix('notification')->group(function(){
        Route::get('index', [CustomerNotificationController::class, 'index'])->name('admin.notification.index');
        Route::post('store', [CustomerNotificationController::class, 'store'])->name('admin.notification.store');
    });


});
