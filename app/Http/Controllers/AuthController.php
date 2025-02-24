<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("auth.login");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    public function DoLogin(Request $request){
        $data = $request->only("email","password");
        if (Auth::attempt($data)){
            return redirect()->intended('/home');
        }
        return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the user
        $request->validate([
            'name'      => 'required|string|min:3|max:30',
            'email'     => 'required|unique:users',
            'nickname'  => 'required|unique:users',
            'password'  => 'required|min:8|confirmed',
            'gender'    => 'required'
        ]);
        // create the user
        $user = User::create([
                    "name"      =>  $request->name,
                    "email"     =>  $request->email,
                    "nickname"  => $request->nickname,
                    "password"  => Hash::make($request->password),
                    "gender"    => $request->gender,
                ]);
        event(new Registered($user));
        // ndir lih return
        return redirect('/login')->with('success' , 'Registration successful! Please log in.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $userId = Auth()->id();
        $user = User::findOrFail($userId);
        return view('vibe.users.edit-profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
