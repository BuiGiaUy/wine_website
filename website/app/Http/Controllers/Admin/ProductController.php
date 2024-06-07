<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getProductCategories()
    {
        return Category::where('model_type', '=', 'product')
            ->where('parent_id', '=', 0)
            ->with('subCategories')
            ->get();
    }

    public function fillDataToProduct($item, $input, $is_create): void
    {
        $item["name"] = $input["name"] ?? "";
        $item["slug"] = $input["slug"] ?? Str::slug($item["item"]);
        $item["description"] = $input["description"] ?? "";
        $item["barcode"] = $input["barcode"] ?? "";
        $item["price"] = $input["price"] ?? "";
        $item["quantity"] = $input["quantity"] ?? "";
        $item["discount_percent"] = $input["discount_percent"] ?? "";
        $item["brand_id"] = $input["brand_id"] ?? null;
        $item["post_id"] = $input["post_id"] ?? null;
        $item["category_id"] = $input["category_id"] ?? null;

        if ($is_create)
        {
            $item["views"] = 0;
            $item["rating_number"] = 0;
            $item["rating_value"] = 0;
        }
        $item->save();
    }
    public function index(): Factory|View|Application
    {
        return view("admin.content.post.add", [
            "categories" => $this->getProductCategories(),
        ]);
    }
    public function saveImageIntoProduct($images, $product): void
    {
        foreach ($images as $img)
        {
            $image = new Image();
            $image["type"] = typeOf($product);
            $image["model_id"] = $product->id;
            $image["path"] = $img;
            $image["name"] = $img;
            $image["alt"] = $img;
            $image->save();
        }
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        $item = new Product();

        $this->fillDataToProduct($item, $input, true);
        $images = $input["images"] ?? [];
        $this->saveImageIntoProduct($images, $item);

        return redirect()->route("admin.product.index");
    }

    public  function edit($id): Factory|View|Application|\Illuminate\Http\RedirectResponse
    {
        $product = Product::find($id);
        if (!$product) return redirect()->back();
        return view("admin.product.edit", [
            "item" => $product,
            "categories" => $this->getProductCategories(),
        ]);
    }
    public function update(Request $request, $id): RedirectResponse
    {
        $product = Product::find($id);
        if (!$product) return redirect()->back();

        $input = $request->all();
        $this->fillDataToProduct($product, $input, false);

        $product->deleteImages();
        $images = $input['image'] ?? [];
        $this->saveImageIntoProduct($images, $product );

        return redirect()->route("admin.product.index");
    }

    public function destroy($id) : RedirectResponse
    {
        $product = Product::find($id);
        if (!$product) return redirect()->back();
        $product->delete();
        return redirect()->route("admin.product.index");
    }
}
