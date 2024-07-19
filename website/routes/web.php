<?php


use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Frontend\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Cart routes
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::get('summary', [CartController::class, 'summary'])->name('cart.summary');
//    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
//    Route::post('checkout', [OrderController::class, 'store'])->name('checkout.store');
//    Route::get('checkout/complete/{order}', [OrderController::class, 'complete'])->name('checkout.complete');
});
Route::get('/checkout', [\App\Http\Controllers\Cart\CheckoutController::class, 'index'])->name('checkout');
Route::get('/checkout-complete', [\App\Http\Controllers\Cart\CheckoutController::class, 'placeOrder'])->name('complete');
Route::get('/ruou-vang', [App\Http\Controllers\HomeController::class, 'category'])->name('category');

Route::get('/brand', [App\Http\Controllers\HomeController::class, 'brand'])->name('brand');
Route::get('/post', [App\Http\Controllers\HomeController::class, 'post'])->name('post');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/tinymce', function () {
    return view('tinymce');
});
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/category/{category}', [ProductController::class, 'category'])->name('products.category');
});
