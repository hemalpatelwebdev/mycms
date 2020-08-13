<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Category;

class AdminController extends Controller
{
    //
    public function index(){

        $postCount = Post::count();
        $commentCount = Comment::count();
        $categoryCount = Category::count();

        return view('admin.index', compact('postCount', 'commentCount', 'categoryCount'));
    }
}
