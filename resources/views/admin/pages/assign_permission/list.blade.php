@extends('admin.master')


@section('content')

<h1>permition list</h1>
<a href="{{route('assign.permission.form')}}" class="btn btn-info">Add Permission</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Role Name</th>
            <th scope="col">permission</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($assignPermissions as $key=>$Permission)
            <tr style="">
                <th scope="row">{{$key+1}}</th>
                <td>{{$Permission->name}}</td>
                <td >
                    @foreach ($Permission->assignpermission as $item)
                        <span style="background-color: cornflowerblue; color:black">
                            {{$item->permission->name}}
                        </span>
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-success" href="">View</a>
                    <a class="btn btn-danger" href="">Delete</a>
                    <a class="btn btn-warning" href="{{route('edit.assigned.permission',$Permission->id)}}">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
