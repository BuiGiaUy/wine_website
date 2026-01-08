<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->product = "App\Models\Product";
        $this->post = "App\Models\Post";
    }

    public function getProductCategories()
    {
        return Category::where('model_type', '=', $this->product)
            ->with('subCategories')
            ->get();
    }

    public function getPostCategories() {
        return Category::where('model_type','=', $this->post)->where('parent_id', '=', 0)->with('subCategories')->get();
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
        $item["post_id"] = $input["post_id"] ?? null;
        $item["brand_id"] = $input["brand_id"] ?? null;
        $item["category_id"] = $input["category_id"] ?? null;

        if ($is_create)
        {
            $item["viewer"] = 0;
            $item["rating_number"] = 0;
            $item["rating_value"] = 0;
        }
        $item->save();
    }
    private function createPostForProduct(array $input): Post
    {
        return Post::create([
            'category_id' => $input['post_category_id'],
            'name' => $input['name'],
            'slug' => Str::slug($input['name']),
            'description' => $input['description'],
            'content' => $input['content'],
            'seo_title' => $input['seo_title'] ?? null,
            'seo_keywords' => $input['seo_keywords'] ?? null,
            'seo_description' => $input['seo_description'] ?? null,
        ]);
    }
    public function index(): Factory|View|Application
    {
        $products = Product::with('images')->paginate(12);
//        echo "<pre>";
//        print_r($products);
//        echo "</pre>";
        return view("admin.content.product.index", [
            "categories" => $this->getProductCategories(),
            "products" => $products
        ]);

    }
    public function add():Factory|View|Application
    {
//        dd($this->getPostCategories());
        $brands = Brand::all();
        $posts = Post::all();
        return view("admin.content.product.add", [
            "categories" => $this->getProductCategories(),
            "postCategories" => $this->getPostCategories(),
            "brands" => $brands,
            "posts" => $posts
        ]);
    }
    public function saveImageIntoProduct($images, $product): void
    {
        foreach ($images as $img)
        {
            $image= new Image();
            $image["model_type"]= $this->product;
            $image["model_id"]= $product->id;
            $image["path"]= $img;
            $image["name"]= $img;
            $image["alt"]= $img;
            $image->save();
        }
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            // Post validation
            'post_category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'seo_title' => 'nullable|string|max:255',
            'seo_keywords' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',

            // Product validation
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug',
            'barcode' => 'required|string|unique:products,barcode',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'discount_percent' => 'nullable|integer',
            'brand_id' => 'nullable|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'images' => 'nullable|array',
            'images.*' => 'file|mimes:jpeg,png,jpg|max:2048',
        ]);
        // Retrieve all input data
        $input = $request->all();

        // Create the post before the product using the product name
        $post = $this->createPostForProduct($input);

        // Create a new product instance
        $item = new Product();
        $input['post_id'] = $post->id; // Assign the newly created post ID to the product
        $this->fillDataToProduct($item, $input, true);

        // Handle images if any
        $images = $input["images"] ?? [];
        $this->saveImageIntoProduct($images, $item);

        // Redirect to the product index page with a success message
        return redirect()->route("admin.product.index")->with('success', 'Product created successfully.');
    }
    public  function edit($id): Factory|View|Application|\Illuminate\Http\RedirectResponse
    {
        $product = Product::find($id);
        if (!$product) return redirect()->back();
        $brands = Brand::all();
        return view("admin.content.product.edit", [
            "product" => $product,
            "brands" => $brands,
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
