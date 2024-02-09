<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\DinoController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromocodeController;
use App\Http\Controllers\TransactionController;
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

Route::apiResource('/dinos', DinoController::class);
Route::apiResource('/buildings', BuildingController::class);
Route::apiResource('/orders', OrderController::class);
Route::apiResource('/profiles', ProfileController::class);
Route::apiResource('/promocodes', PromocodeController::class);
Route::apiResource('/transactions', TransactionController::class)->except('destroy');

