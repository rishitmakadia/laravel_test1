@extends('layout')
@section('title', "Database")
@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table align-middle table-hover">
                <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Position</th>
                    <th>Company</th>
                    <th>Time Stamp</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody id="getData">
                @foreach ($tableValue as $values)
                    <tr>
                        <td>{{$values->id}}</td>
                        <td>{{$values->name}}</td>
                        <td>{{$values->email}}</td>
                        <td>{{$values->age}}</td>
                        <td>{{$values->position}}</td>
                        <td>{{$values->company}}</td>
                        <td>{{$values->created_at}}</td>
                        <td>
                            <button class='btn btn-sm btn-warning editBtn' id='edit-{{$values->id}}'><a
                                    href="{{route('user.edit', ['user'=>$values])}}">Edit</a></button>
                            <form action="{{route('user.destroy', ['user'=>$values])}}" method="post">
                                @csrf
                                @method('delete')
                                <button class='btn btn-sm btn-danger deleteBtn' id='delete-{{$values->id}}'>Delete
                                </button>
                            </form>
                        </td>
                        {{-- <br> --}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
