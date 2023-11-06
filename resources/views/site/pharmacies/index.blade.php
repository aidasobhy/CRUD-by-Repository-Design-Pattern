@extends('site.index')
@section('content')
    <div class="container m-5 p-5">
        @include('site.includes.success')
        <div class="d-flex justify-content-between mb-3">
            <h2>Pharmacies</h2>
            <a href="{{ route('pharmacy.create')}}" class="btn btn-sm btn-primary">Add New Pharmacy</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pharmacy Name</th>
                <th scope="col">Pharmacy Address</th>
                <th scope="col">Operation</th>
            </tr>
            </thead>
            <tbody class="tbody_js">
            @isset($pharmacies)
                @foreach($pharmacies as $key => $pharmacy)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$pharmacy->pharmacy_name}}</td>
                        <td>{{$pharmacy->pharmacy_address}}</td>
                        <td>

                            <a class="btn btn-success" href="{{route('show.products.inPharmacy',$pharmacy->id)}}">Show Products</a>
                            <a class="btn btn-secondary" href="{{route('add.product.toPharmacy',$pharmacy->id)}}">Add Product</a>
                            <a class="btn btn-info" href="{{route('pharmacy.edit',$pharmacy->id)}}">Edit</a>
                            <a class="btn btn-danger" href="{{route('pharmacy.delete',$pharmacy->id)}}">Delete</a>

                        </td>
                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
{{--        {!! $products->render() !!}--}}
    </div>
@endsection
