<?php

<<<<<<< Updated upstream
=======
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Donations\MakeDonationController;
use App\Http\Controllers\Products\AllProductsController;
>>>>>>> Stashed changes
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Products\AllProductsController;
use App\Http\Controllers\Products\ProductFillController;

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

<<<<<<< Updated upstream

Route::prefix('products')->middleware('auth:sanctum')->group(function() {
    Route::post('search' , [AllProductsController::class,'search']);
    Route::get('home' , [AllProductsController::class,'home']);
    Route::get('showDetails/{id}' , [AllProductsController::class , 'showDetails']);
    Route::post('store/{id}' , ProductFillController::class );  
});
=======
Route::prefix('products')->controller(AllProductsController::class)->group(function() {
    Route::post('search' , 'search');
    Route::get('home' , 'home');
    Route::get('showDetails/{id}' , 'showDetails');
 }) ;

 
 Route::prefix('donations')->controller(MakeDonationController::class)->group(function() {
     Route::post('store/{id}' , 'store')->middleware('auth:sanctum') ;
 }) ;
>>>>>>> Stashed changes
