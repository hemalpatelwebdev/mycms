<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Category;

class IndexController extends Controller
{
    //
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(3);
        $categories = Category::all();
        return view('home', compact('posts','categories'));
    }
}
