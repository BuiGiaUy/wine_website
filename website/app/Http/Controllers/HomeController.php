<?php

namespace App\Http\Controllers;

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
        return view('content.homepage');
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
        return view('content.brand');
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
