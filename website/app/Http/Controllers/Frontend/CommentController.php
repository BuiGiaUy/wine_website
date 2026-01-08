<?php

namespace App\Http\Controllers\Frontend;

use App\Events\CommentPosted;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $slug)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'content' => 'required|string|max:1000', // Added max length validation
            'post_id' => 'required|exists:posts,id',
            'parent_id' => 'nullable|exists:comments,id' // Optional parent_id validation
        ]);

        // Find the post by slug
        $post = Post::where('slug', $slug)->firstOrFail();

        // Create the comment
        $comment = Comment::create([
            'content' => $validatedData['content'],
            'post_id' => $validatedData['post_id'],
            'user_id' => auth()->id(), // Get the currently authenticated user's ID
            'parent_id' => $validatedData['parent_id'] ?? null // Handle replies
        ]);

        event(new CommentPosted($comment));


        // Redirect back to the post with a success message
        return response()->json($comment);
    }

}
