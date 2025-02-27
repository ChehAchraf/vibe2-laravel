<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        return redirect('login')->with('success' , 'Registration successful! Please log in.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('vibe.users.others-profile' , compact('user'));
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
//        dd($user);
        return view('vibe.users.edit-profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        dump($request->all());
        $request->validate([
            'name' => 'nullable|string|max:255',
            'nickname' => 'nullable|string|max:255|unique:users,nickname,' . Auth::id(),
            'email' => 'nullable|email|max:255|unique:users,email,' . Auth::id(),
            'bio' => 'nullable|string|max:500',
            'gender' => 'nullable|in:male,female,custom',
            'password' => 'nullable|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:8048',
        ]);
        $user = Auth::user();
        if ($request->filled('name')) {
            $user->name = $request->name;
        }
        if ($request->filled('nickname')) {
            $user->nickname = $request->nickname;
        }
        if ($request->filled('email')) {
            $user->email = $request->email;
        }
        if ($request->filled('bio')) {
            $user->bio = $request->bio;
        }
        if ($request->filled('gender')) {
            $user->gender = $request->gender;
        }
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::delete($user->profile_photo);
            }
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully!');
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
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
}
