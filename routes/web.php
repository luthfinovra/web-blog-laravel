<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use PhpParser\Node\Stmt\Catch_;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [PostController::class, 'index']);

Route::get('/profile', function () {
    return view('profile', [
        "title" => "Profile",
    ]);
})->middleware('auth');



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

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/login', [LoginController::class, 'store']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
Route::resource('/dashboard/posts', DashboardPostController::class);

Route::resource('/dashboard/categories', AdminController::class)->except('show')->middleware('admin');
