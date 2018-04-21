@extends('layouts.app')




@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">

            Edit post {{ $post->title }}
        </div>

    </div>

    <div class="panel-body">
        <form action="{{ route('post.update',['id' => $post->id]) }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="title"> Title</label>
                <input value="{{ $post->title }}" type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="feature"> Feature image</label>
                <input type="file" name="featured" class="form-control">
            </div>

            <div class="form-group">

                <label for="category">Select a Category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach($categories as $category)

                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>

                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="content"> Content</label>
                <textarea name="contenido" id="contenido" cols="5" rows="5" class="form-control">{{ $post->contenido }}</textarea>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update post</button>                </div>
            </div>


        </form>
    </div>

    @stop