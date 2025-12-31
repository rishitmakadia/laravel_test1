@extends('layout')
@section('title', "Something")
@section('content')
    <form action="{{route('something.upload')}}" method="post" enctype="multipart/form-data">
        @csrf
        Upload File      <input type="file" name="fileName" id="">
        <br><br>
        <input type="submit" value="Submit">
    </form>
    <br><br>
    @foreach ($usersNameMail as $data)
        @if (!empty($data->name) && !empty($data->email))
            <pre>{{$data->name}}    ->    {{$data->email}}</pre>
        @endif
    @endforeach
@endsection
