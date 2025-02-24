<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\HomeController;
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

Route::get('login', [AuthController::class , 'index'])->name('login.form');
Route::get('register', [AuthController::class , 'create'])->name('register.form');
Route::post("/login/proccess",[AuthController::class , 'DoLogin'])->name('login.proccess');


// the user route lists
Route::prefix('user')->group(function () {
    Route::post("create", [AuthController::class , 'store'])->name('create.user');
    Route::get('profile', [HomeController::class,'ShowProfile']);
    Route::get("/profile/edit" , [AuthController::class , "edit"])->middleware(['auth','verified'])->name('show.edit.form');
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
