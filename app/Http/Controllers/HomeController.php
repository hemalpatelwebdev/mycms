<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\Charts;
use App\Post;
use App\Comment;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(3);
        $categories = Category::all();
        return view('home', compact('posts','categories'));
    }

}
