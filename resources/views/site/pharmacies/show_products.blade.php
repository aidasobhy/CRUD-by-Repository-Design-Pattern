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
                <th scope="col">Product Image</th>
                <th scope="col">Product Title</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Quantity</th>

            </tr>
            </thead>
            <tbody class="tbody_js">
            @isset($products)
                @foreach($products as $key => $product)
                    <tr>
                        <td><img src="{{asset('assets/images/products/'.$product->product_image)}}" alt="" style="width: 200px;height: 100px"></td>
                        <td>{{$product->product_title}}</td>
                        <td>{{$product->product_price}}</td>
                        <td>{{$product->product_quantity}}</td>
                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
{{--        {!! $products->render() !!}--}}
    </div>
@endsection
