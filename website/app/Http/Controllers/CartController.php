<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{
    public function __construct()
    {
        // Apply auth middleware only to actions that require authentication
        $this->middleware('auth');
    }
    public function checkoutComplete () {
        return view('content.cart.checkout-complete');
    }
    public function infoUser() {
        $user = User::find(auth()->id());
        return view('content.cart.info', ['user'=>$user]);
    }
    // Method to process user info form submission
    public function processInfo(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        // Retrieve the authenticated user
        $user = User::find(auth()->id());

        if ($user->info) {
            $user->info->update([
                'name' => $validatedData['name'],
                'address' => $validatedData['address'],
                'phone' => $validatedData['phone'],
            ]);
        } else {
            // Create a new info record if none exists
            $user->info()->create([
                'name' => $validatedData['name'],
                'address' => $validatedData['address'],
                'phone' => $validatedData['phone'],
            ]);
        }


        // Update user email
        $user->email = $validatedData['email'];
        $user->save();

        // Handle order comments if needed
        // For instance, you might save comments in an order-related model or other storage

        // Redirect back with a success message
        return redirect()->route('cart.checkout')->with('success', 'Thông tin đã được lưu thành công.');
    }
    public function add(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'id' => 'required|integer|exists:products,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'image' => 'required|string', // Adjusted to validate as a string
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
            'total' => $total,
            'userID' => $userID
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

}
