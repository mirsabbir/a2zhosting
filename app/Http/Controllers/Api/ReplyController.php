<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReplyController extends Controller
{
    public function save(Request $request, \App\Comment $comment){
        $reply = new \App\Reply;
        $reply->email = $request->email;
        $reply->name = $request->name;
        $reply->body = $request->body;
        $reply->published = 0;
        $comment->replies()->save($reply);
        return $reply;
    }
}
