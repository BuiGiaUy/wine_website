<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class CartController extends Controller
{
    // Display the cart contents
    public function index()
    {
        // Retrieve cart items from session or database
        $cartItems = session()->get('cart', []);
        return view('content.cart.index', ['cartItems' => $cartItems]);
    }

    // Show the checkout form
    public function checkout()
    {
        $order = [
            'products' => [
                [
                    'name' => 'Rượu Whisky Glengoyne 10 Year Old',
                    'quantity' => 1,
                    'price' => 1430000,
                ],
                // Add more products as needed
            ],
            'subtotal' => 1430000,
            'total' => 1430000,
        ];
        // Pass any necessary data to the checkout view
        return view('content.cart.checkout', ['order' => $order ]);
    }
    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'cart.*.qty' => 'required|integer|min:0',
        ]);

        // Retrieve the cart items from the session
        $cart = Session::get('cart', []);

        // Update cart items with new quantities
        foreach ($request->input('cart', []) as $id => $data) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $data['qty'];
                // Optionally, update the total price of each item based on new quantity
                $cart[$id]['total'] = $cart[$id]['quantity'] * $cart[$id]['price'];
            }
        }

        // Save the updated cart back to the session
        Session::put('cart', $cart);

        // Redirect back to the cart page with a success message
        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    // Process the checkout
    public function processCheckout(Request $request)
    {

        // Validate and process the checkout request
        $validated = $request->validate([
            'billing_address' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Handle checkout logic (e.g., create order, process payment)

        // Clear cart after checkout
        session()->forget('cart');

        // Redirect to the checkout complete page
        return redirect()->route('cart.checkoutComplete');
    }

    // Display the order summary
    public function summary()
    {
        // Retrieve order summary details
        // You may want to fetch order details from the database
        return view('content.cart.summary');
    }

    // Display the checkout complete page
    public function checkoutComplete()
    {
        return view('content.cart.checkout-complete');
    }
}
