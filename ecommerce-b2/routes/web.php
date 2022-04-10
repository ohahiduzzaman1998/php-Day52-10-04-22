<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [EcommerceController::class, 'index'])->name('home');
Route::get('/product-category', [EcommerceController::class, 'categoryProduct'])->name('product-category');
Route::get('/product-detail', [EcommerceController::class, 'productDetail'])->name('product-detail');
Route::get('/show-cart-product', [CartController::class, 'index'])->name('show-cart');

Route::middleware([ 'auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'] )->name('dashboard');
    Route::get('/add-category', [CartController::class, 'index'] )->name('category.add');
    Route::get('/manage-category', [CartController::class, 'manage'] )->name('category.manage');
});
