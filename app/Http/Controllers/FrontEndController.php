<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    // 00 frontend. consola: php artisan make:controller FrontEndController, sin --

    public function index(){
        //A.1 mostrar en orden desc.... la penultima fila
        //A.2 $s = Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first();
       // A.3 dd($s);

        // 03 frontend.
        return view('index')
            ->with('title', Setting::first()->site_name)
            ->with('categories', Category::take(5)->get())

            ->with('first_post', Post::orderBy('created_at', 'desc')->first())
            ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
            ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())

            ->with('tuto', Category::find(3))

            ->with('laravel', Category::find(1))
            ->with('settings', Setting::first());

    }

    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('single')->with('post', $post)
            ->with('title', $post->title)
            ->with('settings', Setting::first())
            ->with('categories', Category::take(5)->get());

    }




}
