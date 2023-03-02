@extends('layouts.app')
@section('content')

@if(count($records) == 0)
<div class="w-25 mx-auto pt-5 d-flex flex-column">
    <p>You have no records saved</p>
    <a class="w-25 btn btn-primary btn-lg" href="{{route('record.create')}}">Create</a>
</div>
@else
<div class="w-75 mx-auto pt-5 d-flex flex-column">
    <a class="btn btn-primary btn-lg mx-auto mb-5" href="{{route('record.create')}}">Create</a>
    <div class="d-flex justify-content-around flex-wrap">
        @foreach($records as $key => $value)
        <div class="customCard mb-5 text-center" style="width:25rem;">
            <div style="padding:20px;">
                <h3 class="fs-2"><b>{{$value->name}}</b></h3>
                <a class="d-block mb-3 fs-4 text-decoration-none" href="{{$value->website}}">{{$value->website}}</a>
                <p class="fs-5">{{$value->username}}</p>
                <input class="w-75 mb-2" type="password" value="{{Crypt::decryptString($value->password)}}" readonly
                    id="{{$value->name}}">
                <button onclick="copyPassword({{$value->name}})">Copy</button>
                <br />
                <input type="checkbox" onclick="revealPassword({{$value->name}})"> Show Password
                <br />
                <div class="d-flex flex-row align-items-center justify-content-evenly py-2">
                    <a class="btn btn-primary btn-lg" href="{{route('record.edit', $value)}}">Edit</a>
                    <form action="{{ route('record.destroy', $value->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-default p-0">
                            <a onclick="return confirm('This will delete this record permanently. Are you sure?')"
                                class="btn btn-primary btn-lg">Delete</a>
                        </button>
                    </form>
                </div>
                <div class="mt-2">
                    <p class="mb-0">Created At: {{$value->created_at}}</p>
                    <p class="mb-0">Last Updated: {{$value->updated_at}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>

</style>
@endif
@vite('resources/js/passwordmanipulator.js')
@endsection