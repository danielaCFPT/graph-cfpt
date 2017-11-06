<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use App\Comment;

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

class ImageController extends Controller
{
    public function __construct()
    {
        //
    }
    public function upload(Request $request)
    {
        $valid = $this->validate($request, ['images' => 'required', ['images.*'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:3048']]);
        /*if($valid->fail()){
            $this->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }else
            {*/
                foreach ($request->images as $image){
                $image->store('public');
                $this->insert($request);
                Image::make($image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            //}
        }
        return redirect('/');
    }

    public function insert(Request $request) {
        //dd($request);
        $image = $request->input('image');
        $comment = $request->input('comment');
        Comment::create([ 'comment' => $comment]);
        /*Images::create([
            'image' => $image
            'comment_id' => $
        ]);*/
    }
}

