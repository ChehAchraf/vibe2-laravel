<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index() {
        return view('vibe.home');
    }

    public function ShowProfile(){
        $userId = auth()->id();
        $user = User::findOrFail($userId);
        return view('vibe.users.show-profile', compact('user'));
    }
}
