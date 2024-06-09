<?php

use App\Http\Controllers\backend\APIController;

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


Route::post('/login',                 [APIController::class, 'userLogin']);

Route::middleware('auth:sanctum')->group(function () {
   Route::get('/list-product',           [APIController::class, 'listProduct']);
   Route::get('/product-detail={id}',    [APIController::class, 'ProductDetail']);
   Route::post('/create-product',        [APIController::class, 'CreateProduct']);
   Route::post('/update-product',        [APIController::class, 'UpdateProduct']);
});






