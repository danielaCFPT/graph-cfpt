<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use App\Comment;

// import the Intervention Image Manager Class


class ImageController extends Controller
{
    public function __construct()
    {
        //
    }
    public function upload(Request $request)
    {
        $this->validate($request, ['images' => 'required|max:71680','images.*'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:3072']);



        $this->insert($request);

        return redirect('/');
    }

    public function insert(Request $request) {
        //dd($request);
        $images = $request->input('images');
        $comment = $request->input('comment');
        $commentUP = Comment::create([ 'comment' => $comment]);

        foreach ($request->images as $image){
            $path = $image->store('','public');
            \Intervention\Image\Facades\Image::make(public_path('/storage/'.$path))->resize(320, 240)->save();
            if($path == "")
            {
                return intl_get_error_message();
            }else{
                Image::create([
                    'image' => $path,
                    'comment_id' => $commentUP->id
                ]);
            }
        }
        return redirect('/');
    }
}

