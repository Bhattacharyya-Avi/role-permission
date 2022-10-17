@extends('admin.master')


@section('content')
    <h1>Product List</h1>
    @if(session()->has('success'))
        <p class="alert alert-success">
            {{session()->get('success')}}
        </p>
    @endif
    <a href="{{route('product.create')}}" class="btn btn-success">Create new product</a>

    <form action="{{route('product.list')}}">
        <div class="input-group rounded mt-3 mb-2">
            <input type="search" class="form-control rounded" name="search" placeholder="Search" aria-label="Search"
                   aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
    <button type="submit">submit</button>
  </span>
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Details</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            @foreach ($products as $key=>$product)
                <tr>
                    <th>{{$key+1}}</th>
                    <th>
                        <img style="border-radius: 4px;" width="100px;" src=" {{url('/uploads/products/'.$product->image)}}" alt="product">

                    </th>
                    <td>
                        <a class="" href="{{route('product.view',$product->id)}}"> {{$product->name}}</a>
                    </td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->details}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('product.view',$product->id)}}">View</a>
                        <a class="btn btn-info" href="{{route('product.edit',$product->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{route('product.delete',$product->id)}}">Delete</a>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
@endsection
