<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // una categoria puede tener muchos post
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
