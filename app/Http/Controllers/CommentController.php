<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getComment(Request $request){
        $commentLst = Comment::all();
        //$images = $comment->images;
        return view("cfpt.cfpt", ['comments'=>$commentLst]);
        print_r($comment);
    }

    public function saveCommentWithImage(Request $request)
    {

    }
}
