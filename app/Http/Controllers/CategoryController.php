<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories', [
            'title' => 'All Categories',
            'active' => 'Categories',
            'categories' => Category::all()
        ]);
    }

    public function categories(Category $category)
    {
        return view('posts', [
            'title' => 'Category By : ' . $category->name,
            'active' => 'Categories',
            'posts' => $category->posts
        ]);
    }
}
