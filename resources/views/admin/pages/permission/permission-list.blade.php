@extends('admin.master')


@section('content')
    <h1>Permission List</h1>

    {{-- <a href="{{route('admin.permission.form')}}" class="btn btn-success">Create new category</a> --}}


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">permission Name</th>
            <th scope="col">permission Details</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($permissions as $key=>$permission)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$permission->name}}</td>
                <td>{{$permission->slug}}</td>
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
