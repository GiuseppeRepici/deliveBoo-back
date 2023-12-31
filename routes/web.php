<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DisheController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('restaurants', RestaurantController::class);
    Route::resource('dishes', DisheController::class)->parameters(['dishes' => 'dishe:id']);
    Route::resource('orders', OrderController::class);
});

require __DIR__ . '/auth.php';
