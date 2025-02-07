<?php

use App\Http\Controllers\Dashboard\ActivityController;
use App\Http\Controllers\Dashboard\BannerController;
use App\Http\Controllers\Dashboard\CouponController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ColorController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\SizeController;
use App\Http\Controllers\Dashboard\SubCatogeryController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SettingWebController;
use App\Http\Controllers\Dashboard\VendorController;
use App\Http\Controllers\Dashboard\WithdrawalController;
use App\Http\Controllers\Dashboard\WithdrawalMangmentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['auth']], function () {

    Route::get('/', function () {
        if (Auth::User()->hasRole('admin')) {
            return redirect()->route('home')->with('success', 'successfully');
        } else if (Auth::User()->hasRole('vendor')) {
            return redirect()->route('vendorMain')->with('success', 'successfully');
        } else {
            return 'user';
        }
    });



    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCatogeryController::class);

    Route::resource('roles', RoleController::class);
    Route::post('/categories/update-status', [CategoryController::class, 'updateStatusCatogery'])->name('categories.update-status');
    Route::post('/subcategories/update-status', [SubCatogeryController::class, 'updateStatusCatogery'])->name('subcategories.update-status');





    Route::controller(DashboardController::class)->group(function () {
        // Route::get('/home/supervisorMain', 'supervisorMain')->name('home.supervisorMain');
        Route::get('/orders-statistics', 'getStatistics');

        Route::get('/home', 'main')->name('home');
    });










    Route::controller(CouponController::class)->group(function () {
        Route::get('/coupons', 'index')->name('coupons');
        Route::get('/coupons/create', 'create')->name('coupons.create');
        Route::post('/coupons/store', 'store')->name('coupons.store');
        Route::post('/coupons/update', 'update')->name('coupons.update');
        Route::post('/coupons/destroy', 'destroy')->name('coupons.destroy');
    });




    Route::controller(SettingController::class)->group(function () {
        Route::get('/setting', 'index')->name('setting');;
        Route::post('/setting.store', 'store')->name('setting.store');
        Route::post('/setting.update', 'update')->name('setting.update');
        Route::post('/setting.destroy', 'destroy')->name('setting.destroy');
        Route::get('/companies', 'companies')->name('companies');
        Route::delete('/companies/destroy', 'destroy')->name('companies.destroy');
    });
    Route::controller(BannerController::class)->group(function () {
        Route::get('/banners', 'index')->name('banners');
        // Route::get('/coupons/create', 'create')->name('coupons.create');
        Route::post('/banners/store', 'store')->name('banners.store');
        Route::put('/banners/update', 'update')->name('banners.update');
        Route::delete('/banners/destroy', 'destroy')->name('banners.destroy');
        Route::post('/banners/update-status',  'updateStatusBanner')->name('banners.update-status');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('products');
        Route::get('/products/inactive', 'productsInactive')->name('products.inactive');
        Route::get('/products/create', 'create')->name('products.create');
        Route::post('/products/update-status', 'updateStatusProduct')->name('products.update-status');
        Route::post('/products/store', 'store')->name('products.store');
        Route::post('/products/update', 'update')->name('products.update');
        Route::delete('/products/destroy', 'destroy')->name('products.destroy');
        Route::get('/products/special', 'productSpacial')->name('products.special');
    });









    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('user');
        Route::get('/user/supervisor', 'supervisor')->name('user.supervisor');
        Route::get('/user/vendeors', 'vendeors')->name('user.vendeors');
        Route::post('/user.store', 'store')->name('user.store');
        Route::post('/user.edit', 'edit')->name('user.edit');
        Route::post('/user.update', 'update')->name('user.update');
        Route::post('/user.destroy', 'destroy')->name('user.destroy');
        Route::post('/userCreate', 'create')->name('userCreate');
        Route::get('/userUpdate/{id}', 'userUpdate')->name('userUpdate');
    });
    Route::controller(CountryController::class)->group(function () {
        // Route::get('/catogery', 'index')->name('catogery');
        Route::get('/countries', 'index')->name('countries');
        Route::post('/countries/store', 'store')->name('countries.store');
        Route::post('/countries/update', 'update')->name('countries.update');
        Route::post('/countries/destroy', 'destroy')->name('countries.destroy');
    });
    Route::controller(SettingWebController::class)->group(function () {
        Route::get('/setting_web', 'index')->name('setting_web');
        Route::get('/setting/gift', 'gift')->name('setting.gift');
        Route::get('/colorweb', 'colorweb')->name('colorweb');
        Route::post('/settings/update', 'update')->name('settings.update');
        Route::post('/settings/updateGift', 'updateGift')->name('settings.updateGift');
        Route::post('/settings/store', 'store')->name('settings.store');
        Route::post('updatewebsite', 'updatewebsite')->name('admin.updatewebsite');
    });
});
