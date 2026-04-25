<?php

use App\Http\Controllers\Api\Admin\DashboardApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Admin Dashboard API Routes
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard/statistics', [DashboardApiController::class, 'getStatistics']);
    Route::get('/dashboard/latest-orders', [DashboardApiController::class, 'getLatestOrders']);
    Route::get('/dashboard/notifications', [DashboardApiController::class, 'getNotifications']);
    Route::get('/dashboard/data', [DashboardApiController::class, 'getDashboardData']);
});

// ─── CTV Availability Management ────────────────────────────
use App\Http\Controllers\Api\CtvScheduleController;
use App\Http\Controllers\Api\Admin\AdminCtvController;

// CTV User-side routes (requires login + CTV profile)
Route::prefix('ctv/schedule')
    ->middleware(['auth', 'ctv'])
    ->group(function () {
        Route::get('/me',            [CtvScheduleController::class, 'me']);
        Route::post('/save',         [CtvScheduleController::class, 'save']);
        Route::post('/copy-previous',[CtvScheduleController::class, 'copyPrevious']);
    });

// Admin CTV management routes (requires admin login)
Route::prefix('admin/ctv')
    ->middleware('auth:admin')
    ->group(function () {
        Route::get('/stats',       [AdminCtvController::class, 'stats']);
        Route::get('/export-data', [AdminCtvController::class, 'exportData']);
    });

