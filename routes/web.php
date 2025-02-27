<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FriendresquestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// the login

Route::get('/login', [AuthController::class , 'index'])->name('login.form');
Route::get('register', [AuthController::class , 'create'])->name('register.form');
Route::post("/login/proccess",[AuthController::class , 'DoLogin'])->name('login.proccess');
// the logout
Route::post('/logout', [AuthController::class , 'logout'])->name('logout');
// submit the post
Route::post('/post/add', [PostController::class,'store'])->middleware(['auth','verified'])->name('post.add');
Route::get('/posts/load-more', [PostController::class, 'loadMore'])->name('posts.loadMore');

// the user route lists
Route::prefix('user')->group(function () {
    Route::post("create", [AuthController::class , 'store'])->name('create.user');
    Route::get('profile', [HomeController::class,'ShowProfile'])->name('profile.show');
    Route::get("/profile/edit" , [AuthController::class , "edit"])->middleware(['auth','verified'])->name('show.edit.form');
    Route::get('/profile/show/{id}', [AuthController::class , 'show'])->middleware(['auth','verified'])->name('others.profile');
});

// edit profile data
Route::patch('/user/profile/edit-start',[AuthController::class , 'update'])->middleware(['auth','verified'])->name('edit.profile');;

// for the home
Route::get('/home', [HomeController::class , 'index'])->middleware(['auth','verified']);

// for the verification

Route::get("/email/verify",function(){
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); //
    return redirect('/home'); //
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', function (Illuminate\Http\Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification email resent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

// the friend request
Route::post('/friend/request/{id}', [FriendresquestController::class , 'store'])->name('friend.request');

// like button
Route::post('/like/{post}', [LikeController::class, 'toggleLike'])->name('like.toggle');
