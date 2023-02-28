@extends('layouts.app')
@section('content')
<div class="justify-content-center col-md-8">
    <table>
        <tr>
            <th>Name</th>
            <th>Website</th>
            <th>Username</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        {{-- {{ dd($records);}} --}}
        @foreach($records as $key => $value)
        <tr>
            <td>{{$value->name}}</td>
            <td>{{$value->website}}</td>
            <td>{{$value->username}}</td>
            <td>{{$value->Password}}</td>
            {{-- {{dd($value->id)}} --}}
            <td><a href="{{route('record.edit', $value->id)}}">Edit</a></td>
            <td>
                <form action="{{ route('record.destroy', $value->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-default p-0">
                        <i class="ft-trash-2 text-grey font-medium-5 font-weight-normal">fas</i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <a href="{{route('record.create')}}">Create</a>

</div>

<style>
    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
</style>
@endsection