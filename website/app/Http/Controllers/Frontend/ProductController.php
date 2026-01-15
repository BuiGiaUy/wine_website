<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    private function getSortedProducts($categoryId, $sortBy, $orderDirection, $minPrice, $maxPrice)
    {
        switch ($sortBy) {
            case 'popularity':
                // Assuming you have a 'popularity' column in your 'products' table
                $orderBy = 'popularity';
                break;
            case 'price':
            case 'price-desc':
                $orderBy = 'price';
                break;
            case 'date':
                $orderBy = 'created_at'; // Assuming you want to sort by creation date
                break;
            case 'on_sale':
                $orderBy = 'sale'; // Customize based on your field or logic
                break;
            default:
                $orderBy = 'created_at'; // Default sorting
        }

        return Product::with('featuredImage')
            ->where('category_id', $categoryId)
            ->whereBetween('price', [$minPrice, $maxPrice])
            ->orderBy($orderBy, $orderDirection)
            ->paginate(10);
    }

    private function getSortDirection($sortBy)
    {
        switch ($sortBy) {
            case 'price-desc':
            case 'date':
                return 'desc';
            default:
                return 'asc';
        }
    }


    public function index()
    {
        $breadcrumbs = [
            ['title' => 'Trang chủ', 'url' => route('home')],
            ['title' => 'Tất cả sản phẩm']
        ];

        // Get filter parameters
        $search = request()->get('q');
        $sortBy = request()->get('orderby', 'created_at');
        $orderDirection = $this->getSortDirection($sortBy);
        $minPrice = request()->get('min_price', 0);
        $maxPrice = request()->get('max_price', PHP_INT_MAX);

        // Determine order column
        $orderBy = match($sortBy) {
            'price', 'price-desc' => 'price',
            default => 'created_at'
        };

        // Build query
        $query = Product::with(['featuredImage', 'category', 'brand']);

        // Apply search filter
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Apply price filter
        if ($minPrice > 0 || $maxPrice < PHP_INT_MAX) {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        // Apply sorting
        $query->orderBy($orderBy, $orderDirection);

        $products = $query->paginate(12);

        return view('content.products.index', [
            'breadcrumbs' => $breadcrumbs,
            'products' => $products
        ]);
    }

    /**
     * Display search results.
     */
    public function search(Request $request)
    {
        $query = $request->get('q', '');

        $breadcrumbs = [
            ['title' => 'Trang chủ', 'url' => route('home')],
            ['title' => 'Tìm kiếm: ' . $query]
        ];

        // Get filter parameters
        $sortBy = $request->get('orderby', 'created_at');
        $orderDirection = $this->getSortDirection($sortBy);
        $minPrice = $request->get('min_price', 0);
        $maxPrice = $request->get('max_price', PHP_INT_MAX);

        // Determine order column
        $orderBy = match($sortBy) {
            'price', 'price-desc' => 'price',
            default => 'created_at'
        };

        // Build query
        $productsQuery = Product::with(['featuredImage', 'category', 'brand']);

        // Apply search filter
        if ($query) {
            $productsQuery->where(function($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                  ->orWhere('description', 'like', '%' . $query . '%');
            });
        }

        // Apply price filter
        if ($minPrice > 0 || $maxPrice < PHP_INT_MAX) {
            $productsQuery->whereBetween('price', [$minPrice, $maxPrice]);
        }

        // Apply sorting
        $productsQuery->orderBy($orderBy, $orderDirection);

        $products = $productsQuery->paginate(12)->appends($request->query());

        return view('content.products.search', [
            'breadcrumbs' => $breadcrumbs,
            'products' => $products,
            'searchQuery' => $query,
            'currentSort' => $sortBy
        ]);
    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {

        $product = Product::where('slug', $slug)->firstOrFail(); // Find product by ID or fail
        $breadcrumbs = [
            ['title' => 'Trang chủ', 'url' => route('home')],
            ['title' => $product->category->name, 'url' => route('products.category', $product->category->slug)],
            ['title' => $product->name]
        ];
        return view('content.products.show', [
            'product' => $product,
            'breadcrumbs' => $breadcrumbs
        ]); // Pass product to the view
    }


    public function category($slug)
    {


        // Find the category by its slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Get the sorting option from the request
        $sortBy = request()->get('orderby', 'created_at');
        $orderDirection = $this->getSortDirection($sortBy); // Determine sort direction
        $minPrice = request()->get('min_price', 0);
        $maxPrice = request()->get('max_price', PHP_INT_MAX);

        // Retrieve products with sorting
        $products = $this->getSortedProducts($category->id, $sortBy, $orderDirection, $minPrice, $maxPrice);

        $breadcrumbs = [
            ['title' => 'Trang chủ', 'url' => route('home')],
            ['title' => $category->name] // Mục hiện tại không có liên kết
        ];
        foreach ($products as $product) {
            // Log the featured image path or indicate if it's missing
            Log::info('Product: ' . $product->name);
            Log::info('Featured Image: ' . ($product->featuredImage ? $product->featuredImage->path : 'No featured image'));
        }
        // Pass the filtered products, category, and breadcrumbs to the view
        return view('content.products.category', [
            'products' => $products,
            'category' => $category,
            'breadcrumbs' => $breadcrumbs,
            'currentSort' => $sortBy
        ]);
    }


}
