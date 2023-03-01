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
        <div class="customCard mb-5" style="width:25rem;">
            <div class="" style="padding:20px;">
                <h4><b>{{$value->name}}</b></h4>
                <p>{{$value->website}}</p>
                <input class="w-75 mb-2" type="password" value="{{Crypt::decryptString($value->password)}}" readonly
                    id="{{$value->name}}">
                <button onclick="copyPassword({{$value->name}})">Copy</button>
                <br />
                <input type="checkbox" onclick="revealPassword({{$value->name}})"> Show Password
                <br />
                <div class="d-flex flex-row align-items-center justify-content-evenly py-2">
                    <a class="btn btn-primary btn-lg" href="{{route('record.edit', $value->id)}}">Edit</a>
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
    .customCard {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.3);
        transition: 0.5s;
    }

    .customCard:hover {
        box-shadow: 0 16px 32px 0 rgba(0, 0, 0, 0.4);
    }
</style>
@endif
@vite('resources/js/passwordmanipulator.js')
@endsection