@extends('layouts.app')
@section('content')

@if(count($records) == 0)
<p>You have no records saved</p>
<a href="{{route('record.create')}}">Create</a>
@else
<div class="w-50 mx-auto pt-5">
    <table class="w-100">
        <tr>
            <th>Name</th>
            <th>Website</th>
            <th>Username</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($records as $key => $value)
        <tr>
            <td>{{$value->name}}</td>
            <td>{{$value->website}}</td>
            <td>{{$value->username}}</td>
            <td><input type="password" value="{{Crypt::decryptString($value->password)}}" readonly
                    id="{{$value->name}}">
                <button onclick="copyPassword({{$value->name}})">Copy</button>
                <br />
                <input type="checkbox" onclick="revealPassword({{$value->name}})"> Show Password
            </td>

            <td><a href="{{route('record.edit', $value->id)}}">Edit</a></td>
            <td>
                <form action="{{ route('record.destroy', $value->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-default p-0">
                        <a class="">Delete</a>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{-- <a href="{{ url()->previous() }}"> Back </a> --}}
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

<script>
    function revealPassword(revealButton) {
        let x = document.getElementById(revealButton.id);
        if (x.type === "password") {
        x.type = "text";
        } else {
            x.type = "password";
        }
}

function copyPassword(field) {

  var copyText = document.getElementById(field.id);
  copyText.select();
  navigator.clipboard.writeText(copyText.value);
  alert("Password copied");
}
</script>
@endif
@endsection