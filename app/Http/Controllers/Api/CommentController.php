<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function __construct(){
        // $this->middleware('auth');
    }
    public function save(Request $request, Post $post){
        $comment = new Comment;
        $comment->email = $request->email;
        $comment->name = $request->name;
        $comment->body = $request->body;
        $comment->published = 0;
        $post->comments()->save($comment);
        return $comment;
    }
}
