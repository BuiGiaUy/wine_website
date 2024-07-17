<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Post;
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
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Lấy tất cả các bài viết từ bảng posts
        $posts = Post::with('featuredImage')->take(4)->get();
        $brands = Brand::take(4)->get();
        $products = Product::with('featuredImage')->take(5)->get();

        return view('content.homepage', ['posts'=> $posts, 'brands'=> $brands ,'products'=> $products  ]);
    }
    public function category()
    {
        return view('content.category');
    }
    public function product()
    {
        return view('content.product');
    }

    public function brand()
    {
        $brands = Brand::all();
        return view('content.brand', ['brands'=>$brands]);
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
