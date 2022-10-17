@extends('admin.master')


@section('content')
<h1>Order List</h1>
<div>
    <form action="{{route('product.list')}}">
        <div class="input-group rounded mt-3 mb-2">
            <input type="date" class="form-control rounded" name="from_date" placeholder="Search" aria-label="Search"
                   aria-describedby="search-addon" />
            <input type="date" class="form-control rounded" name="to_date" placeholder="Search" aria-label="Search"
                   aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
    <button type="submit">submit</button>
  </span>
        </div>
    </form>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
    </tr>
    <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
    </tr>
    </tbody>
</table>
@endsection
