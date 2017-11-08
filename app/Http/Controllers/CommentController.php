<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    public function getComment(Request $request){
        $commentLst = Comment::all();
        //$images = $comment->images;
        return view("cfpt.cfpt", ['comments'=>$commentLst]);
        print_r($comment);
    }

    public function supComment($id)
    {
        $comment = Comment::findOrFail($id);
        foreach ($comment->images as $image) {
            Storage::disk('public')->delete($image->image);
            $image->delete();
        }
        $comment->delete();
        return redirect('/');
    }

    public function updateComment($id)
    {
        $comment = Comment::findOrFail($id);
    }
}
