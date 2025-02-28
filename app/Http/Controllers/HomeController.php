<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

class HomeController extends Controller
{
    public function index() {
        $user = auth()->user();
        
        // Get friends' posts
        $friendsPosts = Post::whereIn('user_id', $user->friends()->pluck('id'))->latest()->get();

        return view('vibe.home', compact('friendsPosts'));
    }

    public function ShowProfile(){
        $userId = auth()->id();
        $user = User::findOrFail($userId);
        return view('vibe.users.show-profile', compact('user'));
    }
}
