<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get categories for product types section
        $categories = Category::whereNull('parent_id')->take(4)->get();
        $brands = Brand::take(4)->get();
        $products = Product::with('featuredImage')->take(5)->get();

        return view('content.homepage', [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $products
        ]);
    }

    public function category()
    {
        $products = Product::with('featuredImage')->get();
        return view('content.category', ['products' => $products]);
    }

    public function product()
    {
        $products = Product::with('featuredImage')->get();
        return view('content.products.index', ['products' => $products]);
    }

    public function brand()
    {
        $brands = Brand::all();
        return view('content.brand', ['brands' => $brands]);
    }

    public function post()
    {
        return view('content.post');
    }

    public function contact()
    {
        return view('content.contact');
    }
}
