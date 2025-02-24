<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // function bach ndir login 👌
    public function login(){
        return view('auth.login');
    }

    // function bash ndir register 😁
    public function register(){
        
        return view('auth.register');
    }
}
