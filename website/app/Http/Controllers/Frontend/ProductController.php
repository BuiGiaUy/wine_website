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
        $group = "App\Models\Product";
        $products = Product::orderBy('category_id', 'ASC')
            ->whereHas('category', function ($query) use ($group) {
                $query->where('model_type', $group);
            })
            ->paginate(50);
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
        $breadcrumbs = [
            ['title' => 'Trang chủ', 'url' => route('home')],
            ['title' => $product->category->name, 'url' => route('products.show', $product->category->slug)],
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
