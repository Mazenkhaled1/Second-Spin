<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Products\AllProductsController;
use App\Http\Controllers\Products\ProductFillController;
use App\Http\Controllers\Donations\MakeDonationController;


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
    Route::post('search' , [AllProductsController::class,'search']);
    Route::get('home' , [AllProductsController::class,'home']);
    Route::get('showDetails/{id}' , [AllProductsController::class , 'showDetails']);
    Route::post('store/{id}' , ProductFillController::class );  
});





Route::prefix('donations')->controller(MakeDonationController::class)->group(function() {
    Route::post('store/{id}' , 'store')->middleware('auth:sanctum') ;
}) ;

// mazen2 