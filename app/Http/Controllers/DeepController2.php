<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeepController2 extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function hide(\App\reply $reply){
        $reply->published = 0;
        $reply->save();
        return redirect()->back();
    }
    public function show(\App\reply $reply){
        $reply->published = 1;
        $reply->save();
        return redirect()->back();
    }
    public function delete(\App\reply $reply){
        $reply->delete();
        return redirect()->back();
    }
}
