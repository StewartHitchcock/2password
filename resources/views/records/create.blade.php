@extends('layouts.app')
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="w-25 mx-auto">
    <form action="{{route('record.store')}}" method="POST" autocomplete="off">
        @csrf
        <div class=" row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Website:</strong>
                    <input type="text" name="website" class="form-control" placeholder="Website"
                        value=@if(!old()) "https://www." @else "{{ old('website')}}">
                    @endif
                </div>
            </div>
            <div class=" col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Username:</strong>
                    <input type="text" name="username" class="form-control" placeholder="Username"
                        value="{{ old('username')}}">
                </div>
            </div>
            <div class=" col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class=" col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    <input id="confirm_password" type="password" name="confirmpassword" class="form-control"
                        placeholder="Password">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-5">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

@vite('resources/js/passwordvalidator.js')
@endsection