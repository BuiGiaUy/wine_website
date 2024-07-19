<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $breadcrumbs = [
            ['title' => 'Trang chủ', 'url' => route('home')],
            ['title' => 'Rượu Vang'] // Mục hiện tại không có liên kết
        ];

        $products = Product::all(); // Retrieve all products
        return view('content.products.index', ['breadcrumbs'=> $breadcrumbs, 'products' => $products]); // Pass products to the view
    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::findOrFail($id); // Find product by ID or fail
        return view('products.show', compact('product')); // Pass product to the view
    }

    /**
     * Display products by category.
     *
     * @param  string  $category
     * @return \Illuminate\View\View
     */
    public function category($category)
    {


        // Find the category by its slug
        $category = Category::where('slug', $category)->firstOrFail();

        // Retrieve products that belong to the found category
        $products = Product::where('category_id', $category->id)->paginate(10);

        $breadcrumbs = [
            ['title' => 'Trang chủ', 'url' => route('home')],
            ['title' => $category->name] // Mục hiện tại không có liên kết
        ];
        // Pass the filtered products, category, and breadcrumbs to the view
        return view('content.products.category', [
            'products' => $products,
            'category' => $category,
            'breadcrumbs' => $breadcrumbs
        ]);
    }


}
