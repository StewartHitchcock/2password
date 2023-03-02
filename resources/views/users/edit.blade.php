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
    <form action="{{route('user.update', $user)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" value="{{ $user->name}}">
                </div>
            </div>
            <div class=" col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" value="{{ $user->email}}"
                        value=" {{ old('email')}}">
                </div>
            </div>
            {{-- <div class=" col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input id="password" type="password" name="password" class="form-control">
                </div>
            </div>
            <div class=" col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    <input id="confirm_password" type="password" name="confirmpassword" class="form-control">
                </div>
            </div> --}}

            <div class=" col-xs-12 col-sm-12 col-md-12 text-center pt-5">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

@vite('resources/js/passwordvalidator.js')
@endsection