@extends('site.index')

@section('content')
    @include('site.includes.success')
    @include('site.includes.error')
    <div class="container">

        <section class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Create Product</h3>
            </div>
            <div class="panel-body">

                <form  method="post" action="{{route('product.store')}}" class="form-horizontal" role="form"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Product Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="product_title" id="product_title" >
                        </div>
                    </div> <!-- form-group // -->
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Product Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="product_description" id="product_description"></textarea>
                        </div>
                    </div> <!-- form-group // -->
                    <div class="form-group">
                        <label for="image" class="col-sm-3 control-label">Product Image</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="product_image" id="product_image">
                        </div>
                    </div> <!-- form-group // -->
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div> <!-- form-group // -->
                </form>

            </div><!-- panel-body // -->
        </section><!-- panel// -->


    </div> <!-- container// -->
@endsection

