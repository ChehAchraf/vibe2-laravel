<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Post $post)
    {
        $user = auth()->user();
        $existing_like = Like::where('user_id', $user->id)
                            ->where('post_id', $post->id)
                            ->first();

        if ($existing_like) {
            $existing_like->delete();
            $likes_count = $post->likes()->count();
            return view('components.like-button', compact('post', 'likes_count'));
        }

        Like::create([
            'user_id' => $user->id,
            'post_id' => $post->id
        ]);
        
        $likes_count = $post->likes()->count();
        return view('components.like-button', compact('post', 'likes_count'));
    }
} 