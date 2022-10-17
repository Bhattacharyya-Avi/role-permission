@extends('admin.master')


@section('content')

    <h1>Create new category</h1>

    @if(session()->has('success'))
        <p class="alert alert-success">
            {{session()->get('success')}}
        </p>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('role.update',$role->id)}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name </label>
            <input name="name" value="{{$role->name}}" placeholder="Enter Category Name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        </div>

        <div>
            <h4 style="text-align: center">Permissions list</h4>
        </div>

        <div style="margin-left: 120px">
            <input type="checkbox" id="select-all">
            <span style="font-size: 18px">Select All / Unselect All</span>
        </div>

        <div class="mt-5 mt-3" style="margin-left: 100px">
            @foreach($modules as $module)
                <div class="mb-8">
                    <div>
                        <h6 style="margin-left: 25px">{{$module->name}}</h6>
                    </div>

                    @foreach($module->permissions as $permission)
                        <div style="margin-left: 50px; margin-top: 5px">
                            <input {{(in_array($permission->id,$role->permissions->pluck('id')->toArray())) ? 'checked' : ''}}
                                type="checkbox"
                                name="permission_ids[]"
                                value="{{$permission->id}}" multiple
                            />
                            <span style="font-size: 15px;margin-top: 2px">{{$permission->name}}</span>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#select-all').click(function() {
                var checked = this.checked;
                $('input[type="checkbox"]').each(function() {
                    this.checked = checked;
                });
            })
        });
    </script>

@endpush
