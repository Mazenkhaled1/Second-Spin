<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Products\AllProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('products')->controller(AllProductsController::class)->group(function() {
    Route::post('search' , 'search');
    Route::post('home' , 'home');
    Route::post('showDetails/{id}' , 'showDetails');
 }) ;