@extends('admin.master')


@section('content')

<h1>add a user</h1>

<form action="{{route('user.post')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input name="name" placeholder="Enter Product Name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">email</label>
        <input name="email" placeholder="Enter email"  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
    <label for="exampleFormControlSelect1">Role</label>
    <select name="role" class="form-control" id="exampleFormControlSelect1">
        @foreach ($roles as $role)
           <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach

    </select>
  </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">password</label>
        <input name="password" placeholder="Enter password"  type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection
