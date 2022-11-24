<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\RatingController;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Auth;

// Client
Route::get('client/products', function () {
    return view('client/products');
});
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'productList'])->name('products.list');
Route::get('/products/{id}', [ProductController::class, 'show']);
//Tính năng tìm kiếm
Route::get('client/search', [ProductController::class, 'search']);

//Cart
Route::middleware('auth')->group(function () {
    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::get('cart-add', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
    Route::get('checkout', [CheckOutController::class, 'index'])->name('checkout');
    Route::post('placeorder', [CheckOutController::class, 'placeorder'])->name('place.order');
    Route::post('/rating', [RatingController::class, 'rating']);
});
Auth::routes();
// Admin Route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Lọc sản phẩm
Route::get('/loc', [ProductController::class, 'locsanpham'])->name('locsanpham');
