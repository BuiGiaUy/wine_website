<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\COntracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getPostCategories() {
        return Category::where('model_type','=', 'post')
            ->where('parent_id', '=', 0)
            ->with('subCategories')
            ->get();
    }

    protected function fillDataToPost($item, $input, $is_create): void
    {
        $item["name"] = $input["name"] ?? "";
        $item["slug"] = $input["slug"] ?? Str::slug($item["name"]);
        $item["description"] = $input["description"] ?? "";
        $item["content"] = $input["content"] ?? "";
        $item["seo_title"] = $input["seo_title"] ?? "";
        $item["seo_keywords"] = $input["seo_keywords"] ?? "";
        $item["seo_description"] = $input["seo_description"] ?? "";
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
        $group = 'post';
        return view('admin.content.post.index', [
            "posts" => Post::orderBy('category_id', 'ASC')->whereHas('category', function ($query) use($group) {
                $query->where('model_type', $group);
            })->qaginate(15)
        ]);

//        $posts = Post::orderBy('category_id', 'ASC')->whereHas('category', function ($query) use ($group) {
//            $query->where('model_type', $group);
//        })->paginate(50);
//
//        echo "<pre>";
//        print_r($post);
//        echo "</pre>";
    }
    public function add():Factory|View|Application
    {
        return view("admin.content.post.add", [
            "categories" => $this->getPostCategories(),
        ]);
    }
    public function saveImageIntoPost($images, $post): void
    {
        foreach ($images as $img)
        {
            $image= new Image();
            $image["type"]= typeOf($post);
            $image["model_id"]= $post->id;
            $image["path"]= $img;
            $image["name"]= $img;
            $image["alt"]= $img;
            $image->save();
        }
    }
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        $item = new Post();

        $this->fillDataToPost($item, $input, true);
        $images = $input["images"] ?? [];
        $this->saveImageIntoPost($images, $item);

        return redirect()->route("admin.post.index");
    }

    public function edit($id): Factory|View|Application|RedirectResponse
    {
        $post = Post::find($id);
        if (!$post) return redirect()->back();
        return view("admin.content.post.edit", [
            "post" => $post,
            "categories" => $this->getPostCategories(),
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $post = Post::find($id);
        if (!$post) return redirect()->back();

        $input = $request->all();
        $this->fillDataToPost($post, $input, false);

        $post->deleteImages();
        $images = $input['image'] ?? [];
        $this->saveImageIntoPost($images, $post );

        return redirect()->route("admin.post.index");
    }

    public function destroy($id) : RedirectResponse
    {
        $post = Post::find($id);
        if (!$post) return redirect()->back();
        $post->delete();
        return redirect()->route("admin.post.index");
    }
}
