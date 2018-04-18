<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [

        'title', 'contenido', 'category_id','featured'

    ];
    // un post solo puede pertenecer a una sola categoria
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
