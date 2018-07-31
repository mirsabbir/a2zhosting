<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotPostController extends Controller
{
    public function get(){
        $latests = $category->with('latestPosts')->get();
        $populars = $category->with('popularPosts')->get();
        return ['populars' => $populars, 'latests' => $latests];
    }
}
