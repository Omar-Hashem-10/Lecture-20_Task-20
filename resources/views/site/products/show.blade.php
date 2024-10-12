@extends('site.app')

@section('title', 'Products')

@section('content')
<h1 class="text-center my-3">{{$product->title}}</h1>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 100%;">
                <img src="https://via.placeholder.com/400" class="card-img-top" alt="Placeholder image">
                <div class="card-body">
                    <h5 class="card-title">{{$product->title}}</h5>
                    @isset($product->offer)
                        <p class="card-text alert alert-success">{{$product->offer}}$ </p>
                        <p class="card-text alert alert-warning"><s>{{$product->price}}$</s></p>
                    @else
                        <p class="card-text alert alert-success">{{$product->price}}$</p>
                    @endisset
                    <p class="card-text">{{$product->description}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
