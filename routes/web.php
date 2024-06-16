<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\Dashboard\AdminDashboardController;
use App\Http\Controllers\Admin\Dashboard\Donation\DonationDashboardController;
use App\Http\Controllers\Admin\Dashboard\User\UserDashboardController;
use App\Http\Controllers\Admin\Dashboard\Feedback\FeedbackDashboardController;
use App\Http\Controllers\Admin\Dashboard\Order\OrderDashboardController;
use App\Http\Controllers\Admin\Dashboard\Product\ProductDashboardController;
use App\Http\Controllers\Admin\Dashboard\Charity\CharityDashboardController;
use App\Http\Controllers\Admin\Dashboard\Product\AcceptedProductsDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::post('/', [AdminAuthController::class, 'login'])->name('admin.login');

// done 
Route::prefix('dashboard')->controller(AdminDashboardController::class)->group(function(){
    Route::get('/' , 'index')->name('admin.index'); 
    Route::get('newAdmin/create' , 'create')->name('admin.create') ; 
    Route::post('newAdmin/store' , 'store')->name('admin.store') ; 
    Route::delete('admin/destroy/{admin}' , 'destroy')->name('admin.destroy') ; 

});


//done 
Route::prefix('dashboard/user')->controller(UserDashboardController::class)->group(function(){
    Route::get('/' , 'index'); 
    Route::delete('user/destroy/{user}' , 'destroy')->name('user.destroy') ; 

});

Route::prefix('dashboard/feedback')->controller(FeedbackDashboardController::class)->group(function(){
    Route::get('/' , 'index'); 
    Route::delete('feedback/destroy/{feedBack}' , 'destroy')->name('feedback.destroy') ; 

});

Route::prefix('dashboard/product')->controller(ProductDashboardController::class)->group(function() {
    Route::get('/' , 'productsAccepting');
    Route::get('productsPendingOrRejecting' , 'productsPendingOrRejecting');
    Route::get('acceptingProducts/{id}' , 'acceptingProducts')->name('product.acceptingProducts');
    Route::get('rejectingProducts/{id}' , 'rejectingProducts')->name('product.rejectingProducts');
    Route::delete('product/destroy/{product}' , 'destroy')->name('product.destroy') ; 
});

Route::prefix('dashboard/order')->controller(OrderDashboardController::class)->group(function(){
    Route::get('/' , 'index'); 
    Route::delete('order/destroy/{order}' , 'destroy')->name('order.destroy') ; 
});

Route::prefix('dashboard/donation')->controller(DonationDashboardController::class)->group(function(){
    Route::get('/' , 'index'); 
    Route::delete('donation/destroy/{donation}' , 'destroy')->name('donation.destroy') ; 
});

Route::prefix('dashboard/charity')->controller(CharityDashboardController::class)->group(function(){
    Route::get('/' , 'index');
    Route::get('newCharity/create' , 'create')->name('charity.create') ; 
    Route::post('newCharity/store' , 'store')->name('charity.store') ; 
    Route::delete('charity/destroy/{charity}' , 'destroy')->name('charity.destroy') ; 

});
