<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::namespace('admin')->group(function () {
    // Login Admin page
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login');

    Route::get('/register',[RegisterController::class,'showRegisterForm'])->name('admin.register.form');
    Route::post('/register',[RegisterController::class,'register'])->name('admin.register');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
        Route::post('/logout', [LoginController::class, 'logout'])->name('admin.auth.logout');
        Route::get('/home', [HomeController::class, 'index'])->name('admin.homepage');

        // Quản lý Category
        Route::group(['prefix'=>'category'],function() {
            Route::get('/{model_type}/', [CategoryController::class,'index'])->name('admin.category.index');
            Route::get('/{model_type}/add', [CategoryController::class,'add'])->name('admin.category.add');
            Route::post('/{model_type}/add', [CategoryController::class,'store'])->name('admin.category.store');
            Route::get('/{model_type}/edit/{id}', [CategoryController::class,'edit'])->name('admin.category.edit');
            Route::post('/{model_type}/edit/{id}', [CategoryController::class,'update'])->name('admin.category.update');
            Route::delete('/{model_type}/delete/{id}', [CategoryController::class,'destroy'])->name('admin.category.delete');
            Route::get('/{model_type}/children/{id}', [CategoryController::class, 'showChildren'])->name('admin.category.children');
        });

        // Quản lý Brand
        Route::group(['prefix'=> 'brand'], function() {
            Route::get('/', [BrandController::class, 'index'])->name('admin.brand.index');
            Route::get('/add', [BrandController::class, 'add'])->name('admin.brand.add');
            Route::post('/add', [BrandController::class, 'store'])->name('admin.brand.store');
            Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
            Route::post('/edit/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
            Route::delete('/delete/{id}', [BrandController::class, 'destroy'])->name('admin.brand.delete');
        });

        // Quản lý bài viết
        Route::group(['prefix'=> 'post'], function() {
            Route::get('/', [PostController::class, 'index'])->name('admin.post.index');
            Route::get('/add', [PostController::class, 'add'])->name('admin.post.add');
            Route::post('/add', [PostController::class, 'store'])->name('admin.post.store');
            Route::get('/edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
            Route::post('/edit/{id}', [PostController::class, 'update'])->name('admin.post.update');
            Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('admin.post.delete');
        });
        // Quản lý sản phẩm
        Route::group(['prefix'=> 'product'], function() {
            Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
            Route::get('/add', [ProductController::class, 'add'])->name('admin.product.add');
            Route::post('/add', [ProductController::class, 'store'])->name('admin.product.store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
            Route::post('/edit/{id}', [ProductController::class, 'update'])->name('admin.product.update');
            Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
        });

        // Quản lý Order
        Route::group(['prefix' => 'order'], function () {
            Route::get('/', [OrderController::class, 'index'])->name('admin.orders.index');
            Route::get('/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
            Route::delete('/delete/{id}', [OrderController::class, 'destroy'])->name('admin.order.delete');
        });

        // Quản lý User
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
            Route::get('/{id}', [UserController::class, 'show'])->name('admin.users.show');
        });
    });
});
