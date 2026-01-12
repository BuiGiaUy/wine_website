<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class DashboardApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Get dashboard statistics
     */
    public function getStatistics(): JsonResponse
    {
        $data = [
            'totalProducts' => Product::count(),
            'totalOrders' => Order::count(),
            'totalRevenue' => Order::sum('total_amount'),
            'totalUsers' => User::count(),
            'thisMonthRevenue' => Order::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->sum('total_amount'),
            'lastMonthRevenue' => Order::whereMonth('created_at', Carbon::now()->subMonth()->month)
                ->whereYear('created_at', Carbon::now()->subMonth()->year)
                ->sum('total_amount'),
        ];

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    /**
     * Get latest orders
     */
    public function getLatestOrders(): JsonResponse
    {
        $orders = Order::with('user')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($order) {
                return [
                    'id' => $order->id,
                    'user_name' => $order->user->name ?? 'Khách hàng #' . $order->user_id,
                    'total_amount' => $order->total_amount,
                    'created_at' => $order->created_at->format('d/m/Y H:i'),
                    'created_at_human' => $order->created_at->diffForHumans(),
                ];
            });

        return response()->json([
            'success' => true,
            'data' => $orders
        ]);
    }

    /**
     * Get notifications data
     */
    public function getNotifications(): JsonResponse
    {
        $notifications = [
            'newUsersThisWeek' => User::where('created_at', '>=', Carbon::now()->subWeek())->count(),
            'pendingOrders' => Order::whereHas('payment', function($q) {
                $q->where('status', 'pending');
            })->count(),
            'newOrdersToday' => Order::whereDate('created_at', Carbon::today())->count(),
        ];

        return response()->json([
            'success' => true,
            'data' => $notifications
        ]);
    }

    /**
     * Get all dashboard data at once
     */
    public function getDashboardData(): JsonResponse
    {
        $statistics = [
            'totalProducts' => Product::count(),
            'totalOrders' => Order::count(),
            'totalRevenue' => Order::sum('total_amount'),
            'totalUsers' => User::count(),
            'thisMonthRevenue' => Order::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->sum('total_amount'),
            'lastMonthRevenue' => Order::whereMonth('created_at', Carbon::now()->subMonth()->month)
                ->whereYear('created_at', Carbon::now()->subMonth()->year)
                ->sum('total_amount'),
        ];

        $latestOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($order) {
                return [
                    'id' => $order->id,
                    'user_name' => $order->user->name ?? 'Khách hàng #' . $order->user_id,
                    'total_amount' => $order->total_amount,
                    'created_at' => $order->created_at->format('d/m/Y H:i'),
                    'created_at_human' => $order->created_at->diffForHumans(),
                ];
            });

        $notifications = [
            'newUsersThisWeek' => User::where('created_at', '>=', Carbon::now()->subWeek())->count(),
            'pendingOrders' => Order::whereHas('payment', function($q) {
                $q->where('status', 'pending');
            })->count(),
            'newOrdersToday' => Order::whereDate('created_at', Carbon::today())->count(),
        ];

        return response()->json([
            'success' => true,
            'data' => [
                'statistics' => $statistics,
                'latestOrders' => $latestOrders,
                'notifications' => $notifications,
            ]
        ]);
    }
}
