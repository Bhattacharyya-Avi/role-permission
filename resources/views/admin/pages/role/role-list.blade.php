@extends('admin.master')


@section('content')
    <h1>Role List</h1>

    {{-- <a href="{{route('admin.add.role')}}" class="btn btn-success">Create new category</a> --}}

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">role Name</th>
            <th scope="col">role Details</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $key=>$role)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$role->name}}</td>
                <td>{{$role->slug}}</td>
                {{-- <td>
                    <a class="btn btn-success" href="">View</a>
                    @if (auth()->check() && auth()->user()->hasRole('superadmin'))
                        <a class="btn btn-danger" href="">Delete</a>
                    <a class="btn btn-warning" href="">Edit</a>
                    @endif
                </td> --}}
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
