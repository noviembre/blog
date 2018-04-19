<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'title', 'contenido', 'category_id','featured', 'slug'

    ];


    protected $dates  = ['deleted_at'];


    // un post solo puede pertenecer a una sola categoria
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
