<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::group(['prefix' => 'admin', 'middleware'=> 'auth'], function (){

    Route::get('/home', [

        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    Route::get('/post/create', [

        'uses' => 'PostsController@create',
        'as' => 'post.create'
    ]);

    Route::post('/post/store', [

        'uses' => 'PostsController@store',
        'as' => 'post.store'
    ]);

    // mandar a dormir un post
    Route::get('/post/delete/{id}', [

        'uses' => 'PostsController@destroy',
        'as' => 'post.delete'
    ]);

    // mostrar post dormidos
    Route::get('/posts/trashed', [

        'uses' => 'PostsController@trashed',
        'as' => 'posts.trashed'
    ]);

    //eliminar un post
    Route::get('/posts/kill/{id}', [

        'uses' => 'PostsController@kill',
        'as' => 'posts.kill'
    ]);

    //restaurar un post
    Route::get('/posts/restore/{id}', [

        'uses' => 'PostsController@restore',
        'as' => 'posts.restore'
    ]);

    //listar post
    Route::get('/posts',[

        'uses' => 'PostsController@index',
        'as' => 'posts'

    ]);

    //editar un post
    Route::get('/posts/edit/{id}',[

        'uses' => 'PostsController@edit',
        'as' => 'post.edit'

    ]);

    //actualzar un post
    Route::post('/posts/update/{id}',[

        'uses' => 'PostsController@update',
        'as' => 'post.update'

    ]);




    //================= categorias
    // Create categoria
    Route::get('/category/create',[

        'uses' => 'CategoriesController@create',
        'as' => 'category.create'

    ]);

    // listar categorias
    Route::get('/categories',[

        'uses' => 'CategoriesController@index',
        'as' => 'categories'

    ]);

    //editar categoria
    Route::get('/category/edit/{id}',[
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);

    // borrar categoria
    Route::get('/category/delete/{id}',[
        'uses' => 'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);

    // actualizar categoria
    Route::post('/category/update/{id}',[
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'
    ]);


    Route::post('/category/store',[

        'uses' => 'CategoriesController@store',
        'as' => 'category.store'

    ]);
});

