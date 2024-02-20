<?php

use App\Http\Controllers\Admin\BuildingController;
use App\Http\Controllers\Admin\DinoController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PromocodeController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth.admin'], function ()
{
    Route::apiResource('/dinos', DinoController::class);
    Route::apiResource('/buildings', BuildingController::class);
    Route::apiResource('/orders', OrderController::class);
    Route::apiResource('/profiles', ProfileController::class);
    Route::apiResource('/promocodes', PromocodeController::class);
    Route::apiResource('/transactions', TransactionController::class)->except('destroy');
    Route::apiResource('/users', UserController::class);

});



