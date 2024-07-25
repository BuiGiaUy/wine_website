<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('content.brands.index', ['brands' => $brands]);
    }

    // Display the specified brand
    public function show($slug)
    {
        $brand = Brand::where("slug", $slug)->firstOrFail();
        return view('content.brands.show', ['brand' => $brand]);
    }
}
