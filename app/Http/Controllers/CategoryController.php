<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function show(Category $category,Request $request){
        $posts = $category->posts()->paginate(8);
        return view('category')->with(['category' => $category, 'posts' => $posts]);
    }
}
