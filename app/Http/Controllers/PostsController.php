<?php

namespace App\Http\Controllers;

use Session;
use App\Post;
use App\Category;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        #dentro de la funcion "with" estamos pasando todas las categorias
        return view('admin.posts.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $this->validate($request,[
           'title' => 'required',
           'featured' => 'required|image',
           'contenido' => 'required',
           'category_id' => 'required'
       ]);

       $featured = $request->featured;
       $featured_new_name = time().$featured->getClientOriginalName();

       $featured->move('uploads/posts', $featured_new_name);

       $post = Post::create([

           'title' => $request->title,
           'contenido' => $request->contenido,
           'featured' => 'upload/posts/' . $featured_new_name,
           'category_id' => $request->category_id


       ]);

        Session::flash('success','Post created successfully');
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
