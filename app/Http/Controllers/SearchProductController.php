<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchProductController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return View::make('posts.index')
            ->with('posts', $posts);
    }
}
