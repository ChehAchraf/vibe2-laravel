<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

class HomeController extends Controller
{
    public function index() {
        $user = User::findOrFail(Auth::id());
        $posts = Post::with('user')->latest()->take(1)->get();
        return view('vibe.home', compact('posts','user'));
    }

    public function ShowProfile(){
        $userId = auth()->id();
        $user = User::findOrFail($userId);
        return view('vibe.users.show-profile', compact('user'));
    }
}
