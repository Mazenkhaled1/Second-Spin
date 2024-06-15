<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\Dashboard\AdminDashboardController;
use App\Http\Controllers\Admin\Dashboard\User\UserDashboardController;
use App\Http\Controllers\Admin\Dashboard\Feedback\FeedbackDashboardController;
use App\Http\Controllers\Admin\Dashboard\Product\ProductDashboardController;

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
});
