<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return view('home', [
            "title" => "Posts",
            "posts" => Post::latest()->filter($request->only('search', 'category'))->paginate(7),
            "categories" => Category::all(),
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Post",
            "post" => Post::find($post->id),
        ]);
    }
}
