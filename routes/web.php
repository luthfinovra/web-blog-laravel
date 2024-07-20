<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use PhpParser\Node\Stmt\Catch_;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    return view('home', [
        "title" => "Home",
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Luthfi Novra",
        "email" => "luthfinovra@gmail.com",
        "image" => "luthfinovra.jpg"
    ]);
});


Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function (Category $category) {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all(),
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('category', [
        'title' => $category->name,
        'category' => $category->name,
        'posts' => $category->posts,
    ]);
});

Route::get('/users/{user:username}', function (User $user) {
    return view('user', [
        'title' => `$user->name Posts`,
        'name' => $user->name,
        'posts' => $user->posts,
    ]);
});
