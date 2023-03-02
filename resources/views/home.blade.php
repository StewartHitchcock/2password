@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

            </div>
        </div>
    </div>
    <div class="w-25 mx-auto mt-5 d-flex justify-content-around">
        <a class="btn btn-primary btn-lg" href="{{route('record.index')}}">Passwords</a>
        <a class="btn btn-primary btn-lg" href="#">Edit User</a>
    </div>
    @endsection