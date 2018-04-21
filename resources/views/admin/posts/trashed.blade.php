@extends('layouts.app')


@section('content')

    <div class="panel panel-default">
        <div class="panel-body">

            <table class="table table-hover">

                <thead>
                <th>Image</th>
                <th>title</th>
                <th>Edit</th>
                <th>restore</th>
                <th>Destroy</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50px"> </td>
                        <td>{{ $post->title }}</td>

                        <td>Edit</td>
                        <td>
                            <a href="{{ route('posts.restore', ['id' => $post->id]) }}" class="btn btn-success btn-xs">restore</a>
                        </td>
                        <td>
                            <a href="{{ route('posts.kill', ['id' => $post->id]) }}" class="btn btn-danger btn-xs">Kill</a>
                        </td>


                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>

    </div>





@stop


