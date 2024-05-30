<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    private function getAllBrands()
    {
        return Brand::get();
    }

    private function fillData($item, $input): void
    {
        $item["name"] = $input["name"];
        $item["slug"] = $input["slug"] ?? Str::slug($input["name"]);
        $item["description"] = $input["description"] ?? "";
        $item->save();
    }

    public function index(): Factory|View|Application
    {
        return view("admin.content.brand.index", ["brands" => $this->getAllBrands()]);
    }

    public function add(): Factory|View|Application
    {
        return view("admin.content.brand.add");
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        $item = new Brand();
        $this->fillData($item, $input);
        return redirect()->route("admin.brand.index");
    }

    public function edit($id): Factory|View|Application|RedirectResponse
    {
        $item = Brand::find($id);
        if ($item) return view('admin.content.brand.edit', ["item" => $item]);
        else return redirect()->back();
    }

    public function update($id, Request $request): RedirectResponse
    {
        $item = Brand::find($id);
        if ($item) {
            $input = $request->all();
            $this->fillData($item, $input);
        }
        return redirect()->route("admin.brand.index");
    }

    public function destroy($id): RedirectResponse
    {
        $item = Brand::find($id);
        if ($item) {
            $item->delete();
        }
        return redirect()->route("admin.brand.index");
    }
}
