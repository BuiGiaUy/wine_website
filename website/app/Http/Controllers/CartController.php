<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{
    public function __construct()
    {
        // Apply auth middleware only to actions that require authentication
        $this->middleware('auth');
    }
    public function add(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'id' => 'required|integer|exists:products,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'image' => 'required|url',
            'url' => 'required|url',
        ]);

        $userID = auth()->id();

        Cart::session($userID)->add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => [
                'image' => $request->image,
                'url' => $request->url,
            ],
        ]);

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function index()
    {

        $userID = auth()->id(); // Get the current authenticated user's ID
        $cartItems = Cart::session($userID)->getContent();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        $total = $subtotal;
        return view('content.cart.index', ['cartItems'=> $cartItems, 'subtotal'=>$subtotal, "total"=>$total]);
    }


    public function summaryData()
    {
        $userID = auth()->id(); // Get the current authenticated user's ID
        $cartItems = Cart::session($userID)->getContent()->toArray();

        $subtotal = array_reduce($cartItems, function ($carry, $item) {
            return $carry + ($item['quantity'] * $item['price']);
        }, 0);

        $total = $subtotal;

        return response()->json([
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'total' => $total
        ]);
    }



    public function update(Request $request, $id)
    {
        $userID = auth()->id(); // Get the current authenticated user's ID
        $quantity = $request->input('quantity');

        Cart::session($userID)->update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $quantity,
            ],
        ]);

        // Return updated cart summary
        $subtotal = Cart::session($userID)->getTotal();
        $total = $subtotal; // Adjust if you have additional charges or discounts

        return response()->json([
            'subtotal' => number_format($subtotal, 0, ',', '.'),
            'total' => number_format($total, 0, ',', '.'),
        ]);
    }

    /**
     * Remove an item from the cart.
     *
     * @param string $rowId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($rowId)
    {
        $userID = auth()->id(); // Get the current authenticated user's ID

        Cart::session($userID)->remove($rowId);

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }

    /**
     * Clear all items from the cart.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clear()
    {
        $userID = auth()->id(); // Get the current authenticated user's ID

        Cart::session($userID)->clear();

        return redirect()->route('cart.index')->with('success', 'Cart cleared!');
    }

    /**
     * Proceed to checkout.
     *
     * @return \Illuminate\View\View
     */
    public function checkout()
    {
        $userID = auth()->id(); // Get the current authenticated user's ID
        $cartItems = Cart::session($userID)->getContent();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        $total = $subtotal;

        return view('content.cart.checkout', ['cartItems'=> $cartItems, 'subtotal'=>$subtotal, "total"=>$total]);
    }
}
