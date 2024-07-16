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
use Psy\Util\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->post = 'post';

    }

    public function getPostCategories() {
        return Category::where('model_type','=', 'post')->where('parent_id', '=', 0)->with('subCategories')->get();
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
            })->qaginate(50)
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
    public function saveImageIntoPost($images, $item): void
    {
        foreach ($images as $img)
        {
            $image= new Image();
            $image["model_type"]= $this->post;
            $image["model_id"]= $item->id;
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
//        echo "<pre>";
//        print_r($images);
//        echo "</pre>";

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
//        echo "<pre>";
//        print_r($post->images);
//        echo "</pre>";
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $post = Post::find($id);
//        echo "<pre>";
//        print_r($post->images);
//        echo "</pre>";
        if (!$post) return redirect()->back();

        $input = $request->all();
        $this->fillDataToPost($post, $input, false);

        $post->deleteImages();
        $images = $input['images'] ?? [];
        $this->saveImageIntoPost($images, $post);

        return redirect()->route("admin.post.index");
    }

    public function destroy($id) : RedirectResponse
    {
        $post = Post::find($id);
        if (!$post) return redirect()->back();
        $post->deleteImages();
        $post->delete();
        return redirect()->route("admin.post.index");
    }
}
