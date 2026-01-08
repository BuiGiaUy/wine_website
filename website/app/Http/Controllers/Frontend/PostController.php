<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->post = 'App\Models\Post';
    }

    // Method to display a list of posts
    public function index()
    {
        $breadcrumbs = [
            ['title' => 'Trang chủ', 'url' => route('home')],
            ['title' => 'Blog Posts']
        ];
        $group = $this->post;
        $posts = Post::orderBy('category_id', 'ASC')->whereHas('category', function ($query) use ($group) {
            $query->where('model_type', $group);
        })->paginate(50);

        return view('content.posts.index', ['posts'=>$posts, 'breadcrumbs'=> $breadcrumbs]); // Pass posts to the index view
    }

    // Method to display a single post
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $breadcrumbs = [
            ['title' => 'Trang chủ', 'url' => route('home')],
            ['title' => "Blog Posts ", 'url' => route('posts.index')],
            ['title' => $post->name]
        ];

        $images = $post->images; // Fetch all images related to the post
        $content = $post->content; // Get the post content

        $imageIndex = 0;
        $imageCount = count($images);
        $firstH4Skipped = false;

// Define a callback function for preg_replace_callback
        $content = preg_replace_callback('/(<h4>)/', function ($matches) use (&$imageIndex, $images, $imageCount, &$firstH4Skipped) {
            $imageTag = '';
            $imageName = '';
            if (!$firstH4Skipped) {
                // Skip the first <h4> tag
                $firstH4Skipped = true;
            } else {
                // Add an image after each subsequent <h4>
                if ($imageIndex < $imageCount) {
                    $imageTag = '<img src="' . asset($images[$imageIndex]->path) . '" alt="' . e($images[$imageIndex]->alt) . '" class="uk-align-center responsive-image" >' ;
                    $imageName = '<p class="uk-text-center uk-text-muted">' . e($images[$imageIndex]->name) . '</p>';
                    $imageIndex++;
                }
            }
            return $matches[1] . $imageTag . $imageName ;
        }, $content);

        $post->content = $content;

        return view('content.posts.show', ['post'=>$post, 'breadcrumbs'=>$breadcrumbs]);
    }
}
