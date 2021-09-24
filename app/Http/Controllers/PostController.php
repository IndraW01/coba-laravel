<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('Posts', [
            'title' => 'All Posts',
            'active' => 'Posts',
            'posts' => Post::latest()->get()
        ]);
    }

    public function post(Post $post)
    {
        return view('post', [
            'title' => 'Single Post',
            'active' => 'Posts',
            'post' => $post
        ]);
    }
}
