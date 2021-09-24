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
            'categories' => Category::all()
        ]);
    }

    public function categories(Category $category)
    {
        return view('category', [
            'title' => 'Category ' . $category->name,
            'posts' => $category->posts
        ]);
    }
}
