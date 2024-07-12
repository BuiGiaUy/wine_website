<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
Route::get('/checkout-complete', [App\Http\Controllers\CheckoutController::class, 'placeOrder'])->name('complete');
Route::get('/ruou-vang', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::get('/product', [App\Http\Controllers\HomeController::class, 'product'])->name('product');
Route::get('/brand', [App\Http\Controllers\HomeController::class, 'brand'])->name('brand');
Route::get('/post', [App\Http\Controllers\HomeController::class, 'post'])->name('post');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/tinymce', function () {
    return view('tinymce');
});
