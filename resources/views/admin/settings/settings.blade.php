@extends('layouts.app')




@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">

            Edit blog settings
        </div>

    </div>

    <div class="panel-body">
        <form action="{{ route('settings.update') }}" method="post" >

            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Site Name</label>
                <input value="{{ $settings->site_name }}" name="site_name" class="form-control" type="text" >
            </div>

            <div class="form-group">
                <label for="email">Address</label>
                <input value="{{ $settings->address }}" type="text" name="address" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Contact Number</label>
                <input value="{{ $settings->contact_number }}" type="text" name="contact_number" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Contact Email</label>
                <input value="{{ $settings->contact_email }}" type="text" name="contact_email" class="form-control">
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Update site settings</button>
                </div>
            </div>

        </form>
    </div>

@stop