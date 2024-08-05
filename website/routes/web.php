<?php


use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\ProductController;

use App\Http\Controllers\Orders\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/showHeader', [Controller::class, 'showHeader'])->name('showHeader');

//Route::get('/brand', [App\Http\Controllers\HomeController::class, 'brand'])->name('brand');
Route::get('/post', [App\Http\Controllers\HomeController::class, 'post'])->name('post');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/tinymce', function () {
    return view('tinymce');
});
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/{slug}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/category/{slug}', [ProductController::class, 'category'])->name('products.category');
});

Route::prefix('brands')->group(function() {
    Route::get('/', [BrandController::class, 'index'])->name('brands.index');
    Route::get('/{slug}', [BrandController::class, 'show'])->name('brands.show');
});
Route::prefix('cart')->middleware(['auth'])->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    // Clear all items from the cart
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
    // Proceed to checkout
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('cart.checkout');
    Route::get('/infoUser', [CartController::class, 'infoUser'])->name('cart.info');
    Route::get('/checkout-complete', [OrderController::class, 'checkoutComplete'])->name('cart.checkoutComplete');
    Route::post('/infoUser', [CartController::class, 'processInfo'])->name('cart.process.info');
    Route::post('/checkoutCash', [OrderController::class, 'checkoutCash'])->name('cart.checkoutCash');
    Route::post('/checkoutVNPay', [OrderController::class, 'checkoutVNPay'])->name('cart.checkoutVNPay');
    Route::post('/checkoutMomo', [CartController::class, 'checkoutMomo'])->name('cart.checkoutMomo');
    Route::get('/summary/data', [CartController::class, 'summaryData'])->name('cart.summary.data');
});


Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/{id}', [OrderController::class, 'show'])->name('orders.show');
});
Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index'); // Route for listing all posts
    Route::get('/{slug}', [PostController::class, 'show'])->name('posts.show'); // Route for showing a single post
});
