@extends('layouts.app')





@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">

            Create a new post
        </div>

    </div>

    <div class="panel-body">
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="title"> Title</label>
                <input type="text" name="title" class="form-control">
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

                <label for="tag">Select Tags</label>

                @foreach($tags as $tag)
                <div class="checkbox">
                    <label>
                        <input value="{{ $tag->id }}" name="tags[]" type="checkbox">{{ $tag->tag }}
                    </label>
                </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="content"> Content</label>
                <textarea name="contenido" id="contenido" cols="5" rows="5" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Store post</button>                </div>
            </div>


        </form>
    </div>

    @stop


@section('styles')

    <link href="{{ asset('css/summernote-bs4.css') }}" rel="stylesheet">

@stop


@section('scripts')
    <!-- Scripts para Editor de texto  -->
    <script src="{{ asset('js/summernote-bs4.min.js') }}"></script>

    <script>
        $(document).ready(function () {

            $('#contenido').summernote();

        });

    </script>

@stop