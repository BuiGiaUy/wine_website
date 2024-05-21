<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\BrandController;
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
        Route::get('/', [HomeController::class, 'index'])->name('admin.homepage');
    });
});

Route::group(['prefix'=> 'brand'], function() {
    Route::get('/', [BrandController::class, 'index'])->name('admin.brand.index');
    Route::get('/add', [BrandController::class, 'add'])->name('admin.brand.add');
    Route::post('/add', [BrandController::class, 'store'])->name('admin.brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
    Route::post('/edit/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
    Route::delete('/delete/{id}', [BrandController::class, 'destroy'])->name('admin.brand.delete');

});
