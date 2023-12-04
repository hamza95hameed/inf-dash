<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Discount\DiscountController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Language\LanguageController;

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
    return view('auth.login');
});

Auth::routes();

Route::post('lang/change', [LanguageController::class, 'change'])->name('changeLang');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',  [HomeController::class, 'index']);
    Route::resource('users', UserController::class);
    Route::resource('discounts', DiscountController::class);
    Route::resource('orders', OrderController::class);
    Route::post('orders-chart', [OrderController::class, 'ordersChart'])->name('orders.chart');
});