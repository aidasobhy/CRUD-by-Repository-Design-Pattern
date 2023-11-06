@extends('site.index')
@section('content')
    <div class="container m-5 p-5">
        @include('site.includes.success')
        <div class="d-flex justify-content-between mb-3">
            <h2>Products</h2>
            <a href="{{ route('product.create')}}" class="btn btn-sm btn-primary">Add New Product</a>
        </div>

        <div class="d-flex justify-content-between mb-3">
            <form method="get" action="{{ route('products.all') }}">
                <input
                    type="search"
                    style="padding: 3px;margin: 5px"
                    class="form-control"
                    placeholder="Find product here"
                    name="search"
                    id="search"
                    value="{{ request('search') }}"
                >
                <button id="search-button" type="submit" class="btn btn-light"
                        style="padding: 5px;">
                    Search For a Product
                </button>
            </form>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Title</th>
                <th scope="col">Operation</th>
            </tr>
            </thead>
            <tbody class="tbody_js">
            @isset($products)
                @foreach($products as $key => $product)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><img src="{{asset('assets/images/products/'.$product->product_image)}}" alt="" style="width: 200px;height: 100px"></td>
                        <td>{{$product->product_title}}</td>

                        <td>
                            <a class="btn btn-info" href="{{route('get.product.details',$product->id)}}">Product Details</a>
                            <a class="btn btn-success" href="{{route('product.edit',$product->id)}}">Edit</a>
                            <a class="btn btn-danger" href="{{route('product.delete',$product->id)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
{{--        {!! $products->render() !!}--}}
    </div>
@endsection
