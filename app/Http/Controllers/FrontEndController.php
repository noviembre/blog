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
        // 03 frontend.
        return view('index')
            ->with('title', Setting::first()->site_name)
            ->with('categories', Category::take(5)->get())
            ->with('first_post', Post::orderBy('created_at', 'desc')->first());

    }




}
