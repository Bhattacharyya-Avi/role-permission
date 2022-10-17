@extends('admin.master')


@section('content')

<h1>Edit product</h1>

@if(session()->has('success'))
    <p class="alert alert-success">
        {{session()->get('success')}}
    </p>
@endif

<form action="{{route('admin.product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product Name</label>
        <input name="name" value="{{$product->name}}" placeholder="Enter Product Name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product Price</label>
        <input name="price" value="{{$product->price}}" placeholder="Enter Product Price"  type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
    <label for="exampleFormControlSelect1">Product Category</label>
    <select name="category" class="form-control" id="exampleFormControlSelect1">

        @foreach ($all_categories as $category)
           <option
               @if($category->id==$product->category_id)
               selected
               @endif
           value="{{$category->id}}">{{$category->name}}</option>
        @endforeach

    </select>
  </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product details</label>
        <input name="details" value="{{$product->details}}" placeholder="Enter Product details"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product Image</label>
        <input name="product_image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <button type="submit" class="btn btn-success">Update</button>
</form>

@endsection
