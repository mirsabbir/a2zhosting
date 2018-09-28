<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeepController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function hide(\App\Comment $comment){
        $comment->published = 0;
        $comment->save();
        return redirect()->back();
    }
    public function show(\App\Comment $comment){
        $comment->published = 1;
        $comment->save();
        return redirect()->back();
    }
    public function delete(\App\Comment $comment){
        $comment->delete();
        return redirect()->back();
    }
}
