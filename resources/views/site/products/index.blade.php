@extends('site.app')

@section('title', 'Products')

@section('content')
<h1 class="text-center my-3">All Products</h1>
<div class="container">
    @include('site.inc.success')
    <a href="{{route('products.create')}}" class="btn btn-primary mb-3">Add New Product</a>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4">
            <div class="card" style="width: 100%;">
                <img src="{{$product->image}}" class="card-img-top" alt="Placeholder image">
                <div class="card-body">
                    <h5 class="card-title">{{$product->title}}</h5>
                    @isset($product->offer)
                        <p class="card-text alert alert-success">{{$product->offer}}$ </p>
                        <p class="card-text alert alert-warning"><s>{{$product->price}}$</s></p>
                    @else
                        <p class="card-text alert alert-success">{{$product->price}}$</p>
                    @endisset
                    <p class="card-text">{{$product->description}}</p>
                    <a href="#" class="btn btn-primary d-inline-block me-2">Go somewhere</a>
                    <a href="{{route('products.show', $product->id)}}" class="btn btn-secondary d-inline-block me-2">Show</a>
                    <a href="{{route('products.edit', $product->id)}}" class="btn btn-secondary d-inline-block me-2">Edit</a>
                    <form action="{{route('products.destroy', $product->id)}}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
