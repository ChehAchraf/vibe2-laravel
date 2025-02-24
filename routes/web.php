<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('login', [AuthController::class , 'login'])->name('login.form');
Route::get('register',[AuthController::class , 'register'])->name('register.form');

Route::prefix('user')->group(function () {
    Route::get('profile', fn()=>"hi");
});
