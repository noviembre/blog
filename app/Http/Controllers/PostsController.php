<?php

namespace App\Http\Controllers;

use App\Tag;
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
        return view('admin.posts.create')->with('categories', $categories)
                                            ->with('tags',Tag::all());
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
           'tags' => 'required'

       ]);

       $featured = $request->featured;
       $featured_new_name = time().$featured->getClientOriginalName();

       $featured->move('uploads/posts', $featured_new_name);

       $post = Post::create([

           'title' => $request->title,
           'contenido' => $request->contenido,
           'featured' => 'uploads/posts/' . $featured_new_name,
           'category_id' => $request->category_id,
            'slug' => str_slug($request->title)

       ]);
        // $post = este post que acabamos decrear
        // ->tags() = quiero acceder a la relacionde los tags
        //->attach = accedemos al metodo attach
        // attach($request->tags) = le pasamos un array de IDs q queremos asociar con este post
       $post->tags()->attach($request->tags);

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
        //Encontrar post que no estan dormidos
        $post = Post::find($id);

        return view('admin.posts.edit')->with('post', $post)->with('categories', Category::all());
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

        //validar
        $this->validate($request,[

            'title' => 'required',
            'contenido' => 'required',
            'category_id' => 'required',
        ]);

        //encotnrar post
        $post = Post::find($id);

        //si tiene archivo

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/posts',$featured_new_name);

            $post->featured = 'uploads/posts/'.$featured_new_name;

        }

        $post->title = $request->title;
        $post->contenido = $request->contenido;
        $post->category_id = $request->category_id;

        $post->save();

        Session::flash('success','Post was Updated successfully');

        return redirect()->route('posts');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success','the post was just trashed');

        return redirect()->back();
    }

    public function trashed(){

        //mostrar solo los post que este dormidos
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts',$posts);

    }

    public function kill($id)
    {
        //
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->forceDelete();

        Session::flash('success','Post deleted permanently');

        return redirect()->back();

    }

    public function restore($id)
    {
        //
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

       Session::flash('success','Post restored successfully');

        return redirect()->route('posts');

    }
}
