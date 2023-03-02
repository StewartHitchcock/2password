@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <p class="mb-0">Welcome to 2Password</p>
                </div>

                <div class="card-body">
                    <div class="w-75 mx-auto d-flex justify-content-around">
                        <a class="btn btn-primary btn-lg" href="{{route('record.index')}}">Passwords</a>
                        <a class="btn btn-primary btn-lg" href="{{route('user.show', Auth::id())}}">Edit User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection