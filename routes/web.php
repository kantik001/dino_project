<?php

use App\Http\Controllers\Admin\BuildingController;
use App\Http\Controllers\Admin\DinoController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PromocodeController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\VueController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group([ 'prefix' => 'admin'], function ()
{
    Route::resource('/dinos', DinoController::class);
    Route::resource('/buildings', BuildingController::class);
    Route::resource('/orders', OrderController::class);
    Route::resource('/profiles', ProfileController::class);
    Route::resource('/promocodes', PromocodeController::class);
    Route::resource('/transactions', TransactionController::class)->except('destroy');
    Route::resource('/users', UserController::class);
});

Route::get('/vue', [VueController::class, 'index']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
