<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->toArray());

        if($request->input('category')) {
            $category = Category::where('slug', '=', request('category'))->get();
            $title = 'By : ' . $category[0]->name;
            // dd($title);
        } else if($request->input('author')) {
            $author = User::where('username', '=', request('author'))->get();
            $title = 'By : ' . $author[0]->name;
        } else {
            $title = '';
        }

        return view('Posts', [
            'title' => "All Post $title",
            'active' => 'Posts',
            'posts' => Post::latest()->filter($request->toArray())->paginate(7)->withQueryString()
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
