@extends('admin.master')


@section('content')
    <h1>Role List</h1>

    <a href="{{route('role.create')}}" class="btn btn-success">Add new </a>

    <form action="{{route('role.list')}}">
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
            <th scope="col">Name</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $key=>$role)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$role->name}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a class="btn btn-danger" href="">Delete</a>
                    <a class="btn btn-warning" href="{{route('role.edit',$role->id)}}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
