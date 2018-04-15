<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // un post solo puede pertenecer a una sola categoria
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
