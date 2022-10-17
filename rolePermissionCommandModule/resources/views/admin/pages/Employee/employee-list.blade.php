@extends('admin.master')


@section('content')
    <h1>Employee List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {!! session('error') !!}
        </div>
    @endif

    <a href="{{route('user.create')}}" class="btn btn-success">Add New</a>

    <form action="{{route('user.list')}}">
        <div class="input-group rounded mt-3 mb-2">
            <input type="search" class="form-control rounded" name="search" placeholder="Search" aria-label="Search"
                   aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
                <button type="submit">submit</button>
            </span>
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Email</th>
            <th scope="col">address</th>
            <th scope="col">Phone</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($employees as $key=>$employee)
                <tr>
                    <th>{{$key+1}}</th>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->address}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>{{$employee->role->name}}</td>
                    <td>
                        <a class="btn btn-danger" href="{{route('user.delete',$employee->id)}}">Delete</a>
                        <a class="btn btn-warning" href="{{route('user.edit',$employee->id)}}">Edit</a>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
