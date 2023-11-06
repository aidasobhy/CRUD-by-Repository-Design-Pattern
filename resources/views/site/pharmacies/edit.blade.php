@extends('site.index')

@section('content')
    @include('site.includes.success')
    @include('site.includes.error')
    <div class="container">

        <section class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Pharmacy</h3>
            </div>
            <div class="panel-body">

                <form  method="post" action="{{route('pharmacy.update',$pharmacy->id)}}" class="form-horizontal" role="form">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Pharmacy Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="pharmacy_name" id="pharmacy_name"
                            value="{{$pharmacy->pharmacy_name}}">
                        </div>
                    </div> <!-- form-group // -->
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Pharmacy Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="pharmacy_address" id="pharmacy_address"
                                   value="{{$pharmacy->pharmacy_address}}">
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

