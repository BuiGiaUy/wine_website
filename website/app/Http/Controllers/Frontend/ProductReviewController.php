<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a new product review.
     */
    public function store(Request $request, $slug)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $product = Product::where('slug', $slug)->firstOrFail();
        $user = Auth::user();

        // Check if user already reviewed this product
        $existingReview = ProductReview::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();

        if ($existingReview) {
            // Update existing review
            $existingReview->update([
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]);
            $message = 'Đánh giá của bạn đã được cập nhật!';
        } else {
            // Create new review
            ProductReview::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]);
            $message = 'Cảm ơn bạn đã đánh giá sản phẩm!';
        }

        return redirect()->route('products.show', $slug)->with('success', $message);
    }
}
