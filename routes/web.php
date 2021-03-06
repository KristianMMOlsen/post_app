<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;


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

//route to homepage after logging out
Route::get('/', function () {
    return view('home');
})->name('home');

//route to dashboard when redirecting from login
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// route to show a specific users posts
Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

//route to the register user page
Route::get('/register', [RegisterController::class, 'index'])->name('register');
//route to store the user form in the db
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//gets the posts into the view
Route::get('/posts', [PostController::class, 'index'])->name('posts');
// route for the single post view
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
//stores the new posts created
Route::post('/posts', [PostController::class, 'store']);
//deletes existing posts
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

//route to like a post
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
//route to unlike a post
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');

//route to post a comment and reply
Route::post('/post/comments', [CommentController::class, 'store'])->name('comments.store');
