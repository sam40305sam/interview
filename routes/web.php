<?php

use App\Http\Controllers\SignupController;
use App\Http\Controllers\PostsController;
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
Route::get('/', [PostsController::class, 'index'])->name('home');
Route::get('/post/{id}', [PostsController::class, 'show'])->name('post.show');

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


Route::group(['middleware' => 'auth'], function () {
    Route::get('/post', function () {
        return view('posteditor');
    })->name('post');
    Route::post('/post', [PostsController::class, 'store'])->name("post.store");
    Route::patch('/post/{id}', [PostsController::class, 'update'])->name("post.update");

    Route::get('/edit-post/{id}', [PostsController::class, 'edit'])->name("post.edit");
    Route::DELETE('/post/{id}', [PostsController::class, 'destroy'])->name("post.delete");
});