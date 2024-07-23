<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }


    private function fillData($item, $input, $model_type): void
    {
        $item["parent_id"] = $input["parent_id"];
        $item["name"] = $input["name"];
        $item["slug"] = $input["slug"] ?? Str::slug($input["name"]);
        $item["icon_path"] = $input["icon_path"] ?? "";
        $item["model_type"] = $model_type;
        $item->save();
    }

    public function showChildren($model_type, $id)
    {
        $category = Category::with('children')->findOrFail($id);
        $children = $category->children;

        return view('admin.content.category.children', compact('category', 'children', 'model_type'));
    }
    private function getCategories(string $model_type, int $perPage = 10)
    {
        $modelMap = [
            'product' => \App\Models\Product::class,
            'post' => \App\Models\Post::class,
        ];

        $modelClass = $modelMap[$model_type] ?? null;

        if (!$modelClass) {
            throw new \InvalidArgumentException("Invalid model type: $model_type");
        }

        return Category::where('model_type', $modelClass)
            ->where('parent_id', 0)
            ->with('subCategories')
            ->paginate($perPage);
    }
    private function searchCategories($model_type){
        return Category::where('model_type','=', $model_type)
            ->where('parent_id','=',0)
            ->with('subCategories')
            ->get()->toArray();
    }
    public function index($model_type): Factory|View|Application
    {

        return view("admin.content.category.index",[
            "categories" => $this->getCategories($model_type),
            'model_type' => $model_type,
            "search" => $this->searchCategories($model_type),
        ]);
    }

    public function add($model_type): Factory|View|Application
    {
        return view("admin.content.category.add",[
            "categories" => $this->getCategories($model_type),
            'model_type' => $model_type,
        ]);
    }

    public function store(Request $request, $model_type): RedirectResponse
    {
        $input = $request->all();
        $category = new Category();
        $this->fillData($category, $input, $model_type);

        return redirect()->route("admin.category.index", $model_type);
    }

    public function edit($model_type, $id): Factory|View|Application|RedirectResponse
    {
        $item = Category::find($id);
        if (!$item)
            return redirect()->back();

        return view('admin.content.category.edit', [
            "item"=>$item,
            "categories" => $this->getCategories($model_type),
            'model_type' => $model_type,
        ]);
    }

    public function update($model_type, $id, Request $request): RedirectResponse
    {
        $item = Category::find($id);
        if (!$item) return redirect()->back();

        $input = $request->all();
        $this->fillData($item, $input, $model_type);

        return redirect()->route("admin.category.index", $model_type);
    }

    public function destroy($model_type,$id): RedirectResponse
    {
        $item = Category::find($id);
        if (!$item) return redirect()->back();

        $item->delete();
        return redirect()->route("admin.category.index", $model_type);
    }
}
