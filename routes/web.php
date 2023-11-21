<?php

use App\Http\Livewire\Pages\Admin\AddUser;
use App\Http\Livewire\Pages\Admin\EditUser;
use App\Http\Livewire\Pages\Admin\ViewUser;
use App\Http\Livewire\Pages\Orders\Orders;
use App\Http\Livewire\Pages\Dashboard;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', Dashboard::class)->middleware(['auth'])->name('dashboard');
Route::get('/admin/view-user', ViewUser::class)->middleware(['auth'])->name('view-user');
Route::get('/admin/add-user', AddUser::class)->middleware(['auth'])->name('add-user');
Route::get('/admin/edit-user/{id}', EditUser::class)->middleware(['auth'])->name('edit-user');
Route::get('/shopify/order', Orders::class)->middleware(['auth'])->name('orders');
require __DIR__ . '/auth.php';