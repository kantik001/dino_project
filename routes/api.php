<?php

use App\Http\Controllers\Admin\BuildingController;
use App\Http\Controllers\Admin\DinoController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PromocodeController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
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

Route::group(['middleware' => 'api'], function () {
    Route::post('login', [AuthController::class, 'login']);
});

Route::group(['middleware' => 'jwt.auth'], function ()
{
    Route::post('logout',  [AuthController::class, 'logout']);
    Route::post('refresh',  [AuthController::class, 'refresh']);
    Route::post('me',  [AuthController::class, 'me']);

    Route::patch('/promocodes/user',  [\App\Http\Controllers\PromocodeController::class, 'updateUser']);
    Route::delete('/users', [\App\Http\Controllers\UserController::class, 'destroy']);
    Route::patch('/users', [\App\Http\Controllers\UserController::class, 'update']);

    Route::post('/users/dino-to-cart', [\App\Http\Controllers\UserController::class, 'storeDinoToCart']);
    Route::patch('/users/dino-in-cart', [\App\Http\Controllers\UserController::class, 'updateDinoInCart']);
    Route::delete('/users/dino-in-cart', [\App\Http\Controllers\UserController::class, 'destroyDinoInCart']);

    Route::get('orders', [\App\Http\Controllers\OrderController::class, 'index']);
    Route::get('orders/{order}', [\App\Http\Controllers\OrderController::class, 'show']);
    Route::patch('orders/{order}/dino', [\App\Http\Controllers\OrderController::class, 'updateDino']);
    Route::delete('orders/{order}/dino', [\App\Http\Controllers\OrderController::class, 'destroyDino']);
    Route::delete('orders/{order}', [\App\Http\Controllers\OrderController::class, 'destroy']);
    Route::post('/orders/{order}/transactions', [\App\Http\Controllers\OrderController::class, 'storeTransaction']);

    Route::post('/transactions', [\App\Http\Controllers\TransactionController::class, 'store']);
    Route::patch('/transactions/{transaction}/status-success', [\App\Http\Controllers\TransactionController::class, 'updateStatusSuccess']);


});

Route::group(['middleware' => ['jwt.auth', 'auth.admin'], 'prefix' => 'admin'], function ()
{
    Route::apiResource('/dinos', DinoController::class);
    Route::apiResource('/buildings', BuildingController::class);
    Route::apiResource('/orders', OrderController::class);
    Route::apiResource('/profiles', ProfileController::class);
    Route::apiResource('/promocodes', PromocodeController::class);
    Route::apiResource('/transactions', TransactionController::class)->except('destroy');
    Route::apiResource('/users', UserController::class);
});

Route::post('/users', [\App\Http\Controllers\UserController::class, 'store']);
//Route::delete('/users/{user}', [\App\Http\Controllers\UserController::class, 'destroy']);



