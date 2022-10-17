@extends('admin.master')


@section('content')
    <form class="print_order">
        <input class="btn btn-primary" type="button" onClick="PrintDiv();" value="Print">
    </form>

    <div id="divToPrint">
        <h1>Product Details</h1>
        <p>
            <img style="border-radius: 4px;" width="200px;" src=" {{url('/uploads/products/'.$product->image)}}" alt="product">
        </p>
        <p>Product Name: {{$product->name}}</p>
        <p>Product Price: <h4><span style="color: orange">BDT {{convertNumber($product->price)}}</span>Taka</h4></p>
        <p>Product Details: {{$product->description}}</p>
        <p>Product Status: {{$product->status}}</p>

        <lable>Product Name:</lable>
        <input type="text" class="form-control" value="{{$product->name}}">
        <input type="file" class="form-control">

    </div>
@endsection

<script language="javascript">
    function PrintDiv() {
        var divToPrint = document.getElementById('divToPrint');
        var popupWin = window.open('', '_blank', 'width=1100,height=700');
        popupWin.document.open();
        popupWin.document.write('<html><head><link href="http://fall-21-b5.test/css/website/booststrap.min.css" rel="stylesheet"></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script>
