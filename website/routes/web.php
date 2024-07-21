<?php


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

//Route::get('/brand', [App\Http\Controllers\HomeController::class, 'brand'])->name('brand');
Route::get('/post', [App\Http\Controllers\HomeController::class, 'post'])->name('post');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/tinymce', function () {
    return view('tinymce');
});
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/category/{slug}', [ProductController::class, 'category'])->name('products.category');
});

Route::prefix('brands')->group(function() {
    Route::get('/', [BrandController::class, 'index'])->name('brands.index');
    Route::get('{id}', [BrandController::class, 'show'])->name('brands.show');
});
Route::prefix('cart')->middleware(['auth'])->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    // Clear all items from the cart
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
    // Proceed to checkout
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/checkout', [CartController::class, 'processCheckout'])->name('cart.processCheckout');
    Route::get('/summary', [CartController::class, 'summary'])->name('cart.summary');
});


Route::prefix('cart')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
});
Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index'); // Route for listing all posts
    Route::get('/{post}', [PostController::class, 'show'])->name('posts.show'); // Route for showing a single post
});
