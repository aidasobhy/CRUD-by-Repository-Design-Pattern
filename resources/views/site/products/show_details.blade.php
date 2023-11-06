@extends('site.index')
@section('content')
    <div class="container m-5 p-5">
        @include('site.includes.success')
        <div class="d-flex justify-content-between mb-3">
            <h2>Products</h2>
            <a href="{{ route('pharmacies.all')}}" class="btn btn-sm btn-primary">Back</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Product Title</th>
                <th scope="col">Product Description</th>
            </tr>
            </thead>
            <tbody>
            @isset($product)
                <tr>
                    <td>{{$product->product_title}}</td>
                    <td>{{$product->product_description}}</td>
                </tr>
            @endisset
            </tbody>
        </table>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pharmacy Name</th>
                <th scope="col">Product Quantity</th>
                <th scope="col">Product Price</th>
            </tr>
            </thead>
            <tbody>
            @isset($productDetails)
                @foreach($productDetails as $key=>$product)
                    <tr>
                        <td>{{$key + 1 }}</td>
                        <td>{{$product->pharmacy_name}}</td>
                        <td>{{$product->product_quantity}}</td>
                        <td>{{$product->product_price}}</td>

                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
    </div>
@endsection
