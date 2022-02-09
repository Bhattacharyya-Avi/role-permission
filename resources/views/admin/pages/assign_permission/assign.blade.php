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

    <br>

    <div class="form-group">
        <label for="exampleFormControlSelect2">Select Permissions</label>
        <div class="form-check form-switch">
            @foreach ($permissions as $permission)
                <ul class="list-unstyled">
                    <li>
                        <input name="permissions[]" value="{{$permission->id}}" class="form-check-input" type="checkbox"
                            id="flexSwitchCheckChecked">
                        <label class="form-check-label" for="flexSwitchCheckChecked">{{$permission->name}}</label>
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection
