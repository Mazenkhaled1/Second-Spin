<?php

use App\Http\Controllers\Orders\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Categories\CategroyController;
use App\Http\Controllers\Products\AllProductsController;
use App\Http\Controllers\Products\ProductFillController;
use App\Http\Controllers\Donations\MakeDonationController;
use App\Http\Controllers\Favorites\FavoriteController;
use App\Http\Controllers\Orders\OrdersController;
use App\Http\Controllers\UserProfile\UserProfileController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('auth')->controller(AuthenticationController::class)->group(function () {
     
    Route::post('/register' , 'register') ;
    Route::post('/login' , 'login') ;
    Route::post('/logout' , 'logout')->middleware('auth:sanctum') ;
});



Route::prefix('products')->middleware('auth:sanctum')->group(function() {
    Route::get('search' , [AllProductsController::class,'search']);
    Route::get('home' , [AllProductsController::class,'home']);
    Route::get('showDetails/{id}' , [AllProductsController::class , 'showDetails']);
    Route::post('store/{id}' , ProductFillController::class );  
});





Route::prefix('donations')->middleware('auth:sanctum')->controller(MakeDonationController::class)->group(function() {
    Route::post('store/{id}' , 'store') ;
    Route::get('charities' , 'getCharities') ;
}) ;



Route::prefix('categories')->middleware('auth:sanctum')->controller(CategroyController::class)->group(function () {

    Route::get('/used' , 'getAllUsedCategories');
    Route::get('/recycle' , 'getAllRecycleCategory');
    Route::get('/product/{categoryId}' , 'products');
});


Route::prefix('userprofile')->middleware('auth:sanctum')->controller(UserProfileController::class)->group(function() {
    Route::post('uploadimage' , 'UploadImage') ;
    Route::post('feedback' , 'MakeFeedback') ;
    Route::post('editprofile' , 'EditProfile');
    Route::post('/deleteprofile', 'destroy') ;
}) ;


Route::prefix('favorites')->middleware('auth:sanctum')->controller(FavoriteController::class)->group(function() {
    Route::get('favoritelist' , 'index') ;
    Route::post('store/{id}' , 'store') ;
    Route::post('delete/{id}' , 'destroy') ;
}) ;


Route::prefix('carts')->middleware('auth:sanctum')->controller(CartController::class)->group(function() {
    Route::get('cartlist' , 'index') ;
    Route::post('store/{id}' , 'store') ;
    Route::post('delete/{id}' , 'destroy') ;
}) ;

Route::prefix('orders')->middleware('auth:sanctum')->controller(OrdersController::class)->group(function() {
    Route::post('checkout' , 'checkout') ;
    Route::post('paymentSummary' , 'paymentSummary') ;
}) ;

