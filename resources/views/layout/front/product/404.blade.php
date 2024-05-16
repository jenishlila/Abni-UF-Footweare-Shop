@extends('layout/front/app')
@section('title','404')
@section('content')
 <div class="container">
        <div class="page-not-found-2">
            <div class="page-title">
                <h1>PRODUCT NOT FOUND</h1>
            </div>
            <p>We’re sorry!<br>We can`t seem to find the page you`re looking for.</p>
            <p>Please try your search again or go to <br>
            <a href="{{url('/products')}}">Products Page</a>
        </div><!--- .page-not-found-2-->
    </div><!--- .container-->
@endsection()