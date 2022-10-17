@extends('admin.master')


@section('content')

    <h1>Edit an Employee</h1>


    <form action="{{route('user.update',$employee->id)}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Employee Name</label>
            <input name="name" value="{{$employee->name}}" placeholder="Enter Employee Name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Employee email</label>
            <input name="email" value="{{$employee->email}}" placeholder="Enter employee email"  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Employee address</label>
            <input name="address" value="{{$employee->address}}" placeholder="Enter employee address"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Employee phone</label>
            <input name="phone" value="{{$employee->phone}}" placeholder="Enter employee address"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Role</label>
            <select name="role_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @foreach($roles as $role)
                    <option value="{{$role->id}}" {{$role->id == $employee->role_id ? 'selected' : ''}}>
                        {{$role->name}}
                    </option>
                @endforeach
            </select>
        </div>



        <button type="submit" class="btn btn-success">Submit</button>
    </form>

@endsection
