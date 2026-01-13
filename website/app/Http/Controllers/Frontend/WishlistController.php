<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the user's wishlist.
     */
    public function index()
    {
        $wishlists = Wishlist::with('product.featuredImage')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(12);

        return view('content.wishlist.index', [
            'wishlists' => $wishlists
        ]);
    }

    /**
     * Toggle a product in the wishlist (add/remove).
     */
    public function toggle(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $userId = Auth::id();
        $productId = $request->product_id;

        $wishlist = Wishlist::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($wishlist) {
            // Remove from wishlist
            $wishlist->delete();
            return response()->json([
                'success' => true,
                'action' => 'removed',
                'message' => 'Đã xóa khỏi danh sách yêu thích',
                'in_wishlist' => false
            ]);
        } else {
            // Add to wishlist
            Wishlist::create([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);
            return response()->json([
                'success' => true,
                'action' => 'added',
                'message' => 'Đã thêm vào danh sách yêu thích',
                'in_wishlist' => true
            ]);
        }
    }

    /**
     * Check if a product is in wishlist.
     */
    public function check(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['in_wishlist' => false, 'authenticated' => false]);
        }

        $productId = $request->product_id;
        $inWishlist = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->exists();

        return response()->json([
            'in_wishlist' => $inWishlist,
            'authenticated' => true
        ]);
    }

    /**
     * Remove from wishlist.
     */
    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        Wishlist::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->delete();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã xóa khỏi danh sách yêu thích'
            ]);
        }

        return redirect()->route('wishlist.index')->with('success', 'Đã xóa khỏi danh sách yêu thích');
    }
}
