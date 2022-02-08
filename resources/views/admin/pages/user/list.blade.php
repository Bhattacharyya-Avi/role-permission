@extends('admin.master')


@section('content')

<h1>user list</h1>
<a href="{{route('user.add')}}" class="btn btn-info">Add User</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
            <th scope="col">role</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key=>$user)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$user->user->name}}</td>
                <td>{{$user->user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>
                    <a class="btn btn-success" href="">View</a>
                    <a class="btn btn-danger" href="">Delete</a>
                    <a class="btn btn-warning" href="">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
