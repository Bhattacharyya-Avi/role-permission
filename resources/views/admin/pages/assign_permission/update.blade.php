@extends('admin.master')


@section('content')

<h1>Assign permission to role</h1>


<form action="{{route('update.assigned.permission',$role_id)}}" method="POST"> 
    @csrf
    <div class="form-group">
        <label for="exampleFormControlSelect1">select role</label>
        <input readonly value="{{$role->name}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <br>

    <div class="form-group">
        <label for="exampleFormControlSelect2">Select Permissions</label>
        <div class="form-check form-switch">
            @foreach ($permission as $Permission)
                <ul class="list-unstyled">
                    <li>
                        <input {{in_array($Permission->id,$role->assignpermission->pluck('permission_id')->toArray())? 'checked': ''}} name="permissions[]" value="{{$Permission->id}}" class="form-check-input" type="checkbox"
                            id="flexSwitchCheckChecked">
                        <label class="form-check-label" for="flexSwitchCheckChecked">{{$Permission->name}}</label>
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection
