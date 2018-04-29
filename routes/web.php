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

Route::get('/test', function (){

    // devolver los post cuya cateogira sea = 2
    return App\User::find(1)->profile;

});

// index
Route::get('/', [
    // 01 frontend.
   'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/{slug}', [

    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single'

]);


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

    //================= TAGS ================

    // listar tags
    Route::get('/tags',[

        'uses' => 'TagsController@index',
        'as' => 'tags'

    ]);

    //Crear Tag
    Route::get('/tag/create',[

        'uses' => 'TagsController@create',
        'as' => 'tag.create'

    ]);

    //
    Route::post('/tag/store',[

        'uses' => 'TagsController@store',
        'as' => 'tag.store'

    ]);

    //editar tag
    Route::get('/tag/edit/{id}',[

        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'

    ]);

    //Actualizar Tag
    Route::post('/tag/update/{id}',[

        'uses' => 'TagsController@update',
        'as' => 'tag.update'

    ]);

    //editar tag
    Route::get('/tag/delete/{id}',[

        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'

    ]);

    //================= USERS ================

    // listar user
    Route::get('/users',[

        'uses' => 'UsersController@index',
        'as' => 'users'

    ]);

    //Crear user
    Route::get('/user/create',[

        'uses' => 'UsersController@create',
        'as' => 'user.create'

    ]);

    //
    Route::post('/user/store',[

        'uses' => 'UsersController@store',
        'as' => 'user.store'

    ]);

    //Designar Admin
    Route::get('/user/admin/{id}',[

        'uses' => 'UsersController@admin',
        'as' => 'user.admin'

    ])->middleware('admin');

    //Retirar permisos de Admin
    Route::get('/user/not-admin/{id}',[

        'uses' => 'UsersController@not_admin',
        'as' => 'user.not.admin'

    ]);

    //-=============== PROFILES ===========
    //profile listar
    Route::get('/user/profile',[

        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'

    ]);

    //profile editar
    Route::post('/user/profile/update',[

        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'

    ]);

    //editar user
    Route::get('/user/edit/{id}',[

        'uses' => 'UsersController@edit',
        'as' => 'user.edit'

    ]);

    //Actualizar user
    Route::post('/user/update/{id}',[

        'uses' => 'UsersController@update',
        'as' => 'user.update'

    ]);

    //delete user
    Route::get('/user/delete/{id}',[

        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'

    ]);

    //=================== SETTINGS ==============
    //mostrar settings
    Route::get('/settings',[

        'uses' => 'SettingsController@index',
        'as' => 'settings'

    ]);


    Route::post('/settings/update',[

        'uses' => 'SettingsController@update',
        'as' => 'settings.update'

    ]);



});

