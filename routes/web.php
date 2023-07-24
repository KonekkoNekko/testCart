<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
// Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/', function () {
    return view('welcome');
});

// Display products
Route::get('/product', [ProductController::class, 'index'])->name('product');

// Add item to cart
Route::post('/cart/add/{id}', [ProductController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/store', [CartController::class, 'storeCart'])->name('cart.store');
Route::get('/cart/restore', [CartController::class, 'restoreCart'])->name('cart.restore');
Route::post('/cart/delete/{rowId}', [CartController::class, 'deleteItem'])->name('cart.delete');
Route::post('/cart/update/{rowId}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::post('/cart/destroy', [CartController::class, 'destroyCart'])->name('cart.destroy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
