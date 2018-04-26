@extends('layouts.app')




@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">

            Edit Your profile
        </div>

    </div>

    <div class="panel-body">
        <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data" >

            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">User</label>
                <input value="{{$user->name}}" type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input value="{{$user->email}}" type="email" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="avatar">Upload new Avatar</label>
                <input type="file" name="avatar" class="form-control">
            </div>

            <div class="form-group">
                <label for="facebook">Facebook profile</label>
                <input value="{{$user->profile->facebook}}" type="text" name="facebook" class="form-control">
            </div>

            <div class="form-group">
                <label for="youtube">Youtube profile</label>
                <input value="{{$user->profile->youtube}}" type="text" name="youtube" class="form-control">
            </div>

            <div class="form-group">
                <label for="About">About you</label>
                <textarea name="about" id="about" cols="6" rows="6" class="form-control">
                    {{$user->profile->about}}
                </textarea>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Update User</button>
                </div>
            </div>

        </form>
    </div>

@stop