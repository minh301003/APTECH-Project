<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\auth\AdminController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminCategoriesController;

Route::get('/login', [AdminController::class, 'getLogin'])->name('admin.login');
Route::post('/login', [AdminController::class, 'postLogin'])->name('admin.checklogin');
Route::get('/', [AdminController::class, 'index'])->name('admin.home');


Route::middleware('checkAdmin')->group(function () {
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    // Route::post('/logout', [AdminController::class, 'logout']);
   
    //Danh sách danh mục trong kho
    Route::get('/catalogs', [AdminCategoriesController::class, 'index'])->name('admin_catalogs.list');
    //Thêm danh mục
    Route::get('/catalogs/create', [AdminCategoriesController::class, 'create'])->name('admin_catalogs.create');
    Route::post('/catalogs/store', [AdminCategoriesController::class, 'store']);

    //Danh sách sản phẩm trong kho
    Route::get('/products', [AdminProductsController::class, 'index'])->name('admin_products.list');
    //Thêm sản phẩm
    Route::get('/products/create', [AdminProductsController::class, 'create'])->name('admin_products.create');
    Route::post('/products/store', [AdminProductsController::class, 'store']);
    //Cập nhật sản phẩm
    Route::get('/products/edit/{id}', [AdminProductsController::class, 'edit']);
    Route::patch('/products/update/{id}', [AdminProductsController::class, 'update']);
    //Xóa sản phẩm
    Route::delete('/products/delete/{id}', [AdminProductsController::class, 'destroy']);
    //Xóa ảnh của sản phẩm
    Route::get('/products/product-image/delete/{product_image_id}', [AdminProductsController::class, 'destroyImage']);
    //Tính năng tìm kiếm 
    Route::get('/products/search', [AdminProductsController::class, 'search'])->name('admin_products.search');

    //Admin duyệt đơn
    Route::get('/order', [OrderController::class, 'index'])->name('admin.order');
    Route::get('/view_order/{id}', [OrderController::class, 'view']);
    Route::patch('/update_order/{id}', [OrderController::class, 'update']);
    //Admin lưu trữ thông tin khách hàng
    Route::get('/users', [UserController::class, 'index'])->name('admin_users.list');
    //Cập nhật thông tin khách hàng
    Route::get('/users/edit/{id}', [UserController::class, 'edit']);
    Route::patch('/users/update/{id}', [UserController::class, 'update']);

});

//Chức năng của người quản lý
    Route::middleware('adminLevel')->group(function () {
     //Danh sách nhân viên
     Route::get('/admins', [AdminController::class, 'list'])->name('admin_admins.list');
     //Thêm nhân viên
     Route::get('/admins/create', [AdminController::class, 'create'])->name('admins_create');
     Route::post('/admins/store', [AdminController::class, 'store']);
     //Cập nhật thông tin nhân viên
     Route::get('/admins/edit/{id}', [AdminController::class, 'edit']);
     Route::patch('/admins/update/{id}', [AdminController::class, 'update']);
     //Xóa thông tin nhân viên
     Route::delete('/admins/delete/{id}', [AdminController::class, 'destroy']);
});
