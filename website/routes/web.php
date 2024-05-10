<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/', function () {
    return view('welcome');
});
//Route::group(['prefix' => 'admin'],,function () {
//   Route::get('/', function () {
//       return view('admin.index');
//   });
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/login',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin/login',[LoginController::class,'adminLogin'])->name('admin.auth.login.store');
Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/',function(){
    return view('/index');
})->middleware('auth:admin');
