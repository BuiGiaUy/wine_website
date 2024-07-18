<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        return view('content.cart.index');
    }
    public function summary()
    {
        // Fetch the cart items for the authenticated user
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('cart.summary', compact('cartItems', 'totalAmount'));
    }
}
