<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function images()
    {
        return $this->hasMany('App\Image');
    }
    protected $fillable = [
        'comment'
    ];
}

/* dans ce commentaire je récupère les images associé
 * $comments = App\comment::find(1)->images;

foreach ($images as $image) {
    //
}
 */