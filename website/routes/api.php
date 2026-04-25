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

Route::prefix('ctv')->group(function () {

    // Profiles
    Route::get('/profiles',            [CtvScheduleController::class, 'indexProfiles']);
    Route::get('/profiles/{userId}',   [CtvScheduleController::class, 'showProfile']);
    Route::post('/profiles',           [CtvScheduleController::class, 'storeProfile']);
    Route::delete('/profiles/{userId}',[CtvScheduleController::class, 'destroyProfile']);

    // Schedules
    Route::get('/schedules/{userId}',        [CtvScheduleController::class, 'indexSchedules']);
    Route::post('/schedules',                [CtvScheduleController::class, 'storeSchedule']);
    Route::patch('/schedules/{id}/finalize', [CtvScheduleController::class, 'finalizeSchedule']);
    Route::delete('/schedules/{id}',         [CtvScheduleController::class, 'destroySchedule']);

    // Reporting
    Route::get('/report', [CtvScheduleController::class, 'weeklyReport']);
});
