@extends('site.index')

@section('content')
    @include('site.includes.success')
    @include('site.includes.error')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h6>Product / Edit / {{$product->product_title}}</h6>
            <a href="{{ route('products.all')}}" class="btn btn-sm btn-primary">Back</a>
        </div>
        <section class="panel panel-default">
            <div class="panel-body">

                <form  method="post" action="{{route('product.update',$product->id )}}" class="form-horizontal" role="form"  enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Product Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="product_title" id="product_title" value="{{$product->product_title}}" >
                        </div>
                    </div> <!-- form-group // -->
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Product Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="product_description" id="product_description" >{{$product->product_description}}</textarea>
                        </div>
                    </div> <!-- form-group // -->
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div> <!-- form-group // -->
                </form>

            </div><!-- panel-body // -->
        </section><!-- panel// -->


    </div> <!-- container// -->
@endsection

