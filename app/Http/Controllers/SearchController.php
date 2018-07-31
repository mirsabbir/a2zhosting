<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class SearchController extends Controller
{
    public function search(Request $request){
        $res = Post::search($request->q)->paginate(12);
        $res->load('category');
        return view('search')->with(['q' => $request->q, 'results' => $res]);
    }
}
