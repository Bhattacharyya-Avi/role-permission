@extends('admin.master')


@section('content')

<h1>Assign permission to role</h1>


<form action="{{route('assign.permission.post')}}" method="POST">
    @csrf
     <div class="form-group">
    <label for="exampleFormControlSelect1">select role</label>
    <select name="role" class="form-control" id="exampleFormControlSelect1">
        @foreach ($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
    </select>
  </div>

   <div class="form-group">
    <label for="exampleFormControlSelect2">select permissions</label>
    <select name="permissions[]" multiple class="form-control" id="exampleFormControlSelect2">
        @foreach ($permissions as $permission)
            <option value={{$permission->id}}>{{$permission->name}}</option>
        @endforeach
    </select>
  </div>

    <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection
