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
        //Devolver vista (posts/index) con los datos de la tabla post (solo aquellos q sean null en Delete_at)
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if ($categories->count()==0)
        {
            Session::flash('info','You must have some categories before attempting to create a post');

            return redirect()->back();

        }
        #dentro de la funcion "with" estamos pasando todas las categorias
        return view('admin.posts.create')->with('categories', $categories);
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
           'category_id' => 'required',

       ]);

       $featured = $request->featured;
       $featured_new_name = time().$featured->getClientOriginalName();

       $featured->move('uploads/posts', $featured_new_name);

       $post = Post::create([

           'title' => $request->title,
           'contenido' => $request->contenido,
           'featured' => 'upload/posts/' . $featured_new_name,
           'category_id' => $request->category_id,
            'slug' => str_slug($request->title)

       ]);

        Session::flash('success','Post created successfully');
        return redirect()->back();
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
