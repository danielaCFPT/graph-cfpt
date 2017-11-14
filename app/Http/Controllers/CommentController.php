<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Image;

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

    public function editComment($id, Request $request)
    {
        $comment = Comment::findOrFail($id);
        $newComment = $request->input('EditComment');
        $images = $request->input('images');

        $comment->comment = $newComment;
        $comment->save();
        if($request->images != null) {
            foreach ($request->images as $image) {
                $path = $image->store('', 'public');

                if ($path == "") {
                    return intl_get_error_message();
                } else {
                    Image::create([
                        'image' => $path,
                        'comment_id' => $id
                    ]);
                }
            }
        }
        if($request->imgSelect != null) {
            foreach ($request->imgSelect as $idImage) {
                $image = Image::findOrFail($idImage);
                Storage::disk('public')->delete($image->image);
                $image->delete();
            }
        }
        return redirect('/');
    }
}
