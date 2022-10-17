@extends('admin.master')


@section('content')

<h1>Create new category</h1>

@if(session()->has('success'))
<p class="alert alert-success">
    {{session()->get('success')}}
</p>
@endif

{{-- @if(session()->has('error'))
<p class="alert alert-danger">
    {{session()->get('error')}}
</p>
@endif --}}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('category.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Category Name </label>
        <input name="name" placeholder="Enter Category Name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >

    </div>



    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Category details</label>
        <input name="details" placeholder="Enter Category details"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection
