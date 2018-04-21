@extends('layouts.app')


@section('content')

    <div class="panel panel-default">

        <div class="panel panel-heading">
            <b> Tags</b>
        </div>

        <div class="panel-body">

            <table class="table table-hover">

                <thead>
                <th>Tags name</th>
                <th>Editing</th>
                <th>Deleting</th>
                </thead>
                <tbody>

                @if($tags->count()> 0)

                    @foreach($tags as $tag)
                        <tr>
                            <td> {{ $tag->tag }}</td>
                            <td><a href="{{ route('tag.edit', ['id' => $tag->id ]) }}" class="btn btn-info btn-xs">Edit</a>  </td>

                            <td><a href="{{ route('tag.delete', ['id' => $tag->id ]) }}" class="btn btn-danger btn-xs">Delete</a>  </td>
                        </tr>
                    @endforeach

                @else
                    <tr >
                        <th colspan="5" class="text-center text-danger"> No tags yet</th>
                    </tr>

                @endif


                </tbody>

            </table>

        </div>

    </div>

@stop