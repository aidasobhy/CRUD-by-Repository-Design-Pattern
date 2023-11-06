@extends('site.layout')
@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link btn btn-lg" href="{{route('products.all')}}">Products</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link btn btn-lg" href="{{route('pharmacies.all')}}">Pharmacies</a>
                </li>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <h1 class="text-center">Welcome To Our Store</h1>
@endsection
