<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

    protected $fillable = [
        'image', 'comment_id'
    ];

    protected $hidden = [
        //
    ];
}
