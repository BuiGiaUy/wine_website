<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total_amount');
        $totalUsers = User::count();

        $latestOrders = Order::with('user')->latest()->take(5)->get();

        $thisMonthRevenue = Order::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total_amount');

        $lastMonthRevenue = Order::whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->sum('total_amount');

        // Notifications data
        $newUsersThisWeek = User::where('created_at', '>=', Carbon::now()->subWeek())->count();
        $pendingOrders = Order::whereHas('payment', function($q) {
            $q->where('status', 'pending');
        })->count();
        $newOrdersToday = Order::whereDate('created_at', Carbon::today())->count();

        return view('admin.home', compact(
            'totalProducts',
            'totalOrders',
            'totalRevenue',
            'totalUsers',
            'latestOrders',
            'thisMonthRevenue',
            'lastMonthRevenue',
            'newUsersThisWeek',
            'pendingOrders',
            'newOrdersToday'
        ));
    }
}
