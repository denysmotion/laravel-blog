<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {   $posts = Post::query()->with('category')->orderBy('id', 'desc')->paginate(2);

        return view('blog.main.index', compact('posts'));
    }
}
