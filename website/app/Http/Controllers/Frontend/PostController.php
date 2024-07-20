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
        $group = $this->post;
        $posts = Post::orderBy('category_id', 'ASC')->whereHas('category', function ($query) use ($group) {
            $query->where('model_type', $group);
        })->paginate(50);
        return view('content.posts.index', ['posts'=>$posts]); // Pass posts to the index view
    }

    // Method to display a single post
    public function show($id)
    {
        $post = Post::findOrFail($id); // Fetch a post by its ID
        return view('content.posts.show', ['post'=>$post]); // Pass the post to the show view
    }
}
