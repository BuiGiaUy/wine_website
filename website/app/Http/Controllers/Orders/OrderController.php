<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        // Apply auth middleware only to actions that require authentication
        $this->middleware('auth');
    }
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->paginate(10);
        return view('content.orders.index', ['orders' => $orders]);
    }

    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('content.orders.show', ['order' => $order]);
    }
}
