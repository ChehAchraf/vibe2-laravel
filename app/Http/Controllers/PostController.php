<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $imagePath = $request->file('image')->store('uploads', 'public');
        Post::create([
            'content'   =>    $request->content,
            'user_id'   =>    auth()->id(),
            'image'     =>    $imagePath
        ]);

        return redirect()->back()->with('success' , 'The post has been posted successfully ! 😍😎');
    }
    public function loadMore(Request $request)
    {
        $offset = $request->query('offset', 0);
        $limit = 1;

        $posts = Post::with('user')->latest()->skip($offset)->take($limit)->get();

        return view('partials.posts', compact('posts'));
    }

}
