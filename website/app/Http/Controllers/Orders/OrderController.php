<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    private function getAllOrders()
    {
        return Order::paginate(10);
    }

    public function index(): Factory|View|Application
    {
        return view('admin.content.order.index', ['orders' => $this->getAllOrders()]);
    }

    public function show($id): Factory|View|Application|RedirectResponse
    {
        $order = Order::find($id);
//        echo "<pre>";
//        print_r($order->items);
//        echo "</pre>";
        if ($order) {
            return view('admin.content.order.show', ['order' => $order]);
        } else {
            return redirect()->route('admin.orders.index')->with('error', 'Order not found.');
        }
    }

    public function destroy($id): RedirectResponse
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('admin.order.index')->with('error', 'Order not found.');
        }

        $order->delete();
        return redirect()->route('admin.order.index')->with('success', 'Order deleted successfully.');
    }
}

