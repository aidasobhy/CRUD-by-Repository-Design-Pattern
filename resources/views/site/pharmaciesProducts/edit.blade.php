@extends('site.index')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h6>Pharmacy / Edit Product</h6>
            <a href="" class="btn btn-sm btn-primary">Back</a>
        </div>
        @include('site.includes.error')
        <form method="POST" action="">

            <div class="form-group">
                <lable>Product Price</lable>
                <input type="number" step="any" name="product_price" class="form-control">
            </div>
            <div class="form-group">
                <lable>Product Quantity</lable>
                <input type="number" name="product_quantity" class="form-control">
            </div>
            <button type="submit"  class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection




