<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show(Post $post)
    {
        return view('components.comment-section', compact('post'));
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:1000'
        ]);

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'content' => $request->content
        ]);

        return view('components.comment-item', compact('comment'));
    }
} 