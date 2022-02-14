<?php

use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/new-post', function () {
        return view('home');
    })->name('newpost');
});

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::prefix('signup')->group(function () {
    Route::get('/', [SignupController::class, 'create'])->name('signup');
    Route::post('/', [SignupController::class, 'store'])->name("signup.store");
});

Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'create'])->name('login');
    Route::post('/', [LoginController::class, 'store'])->name("login.store");
});

Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
