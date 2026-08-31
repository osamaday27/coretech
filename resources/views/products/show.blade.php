@extends('layouts.app')
@section('title')Show Product @endsection


@section('content')

<div class="card text-center " style="width: 30rem;">
    @if($product->image)
      <div class="mb-3">
        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 100%;">
      </div>
    @endif
  <div class="card-body">
    <h5 class="card-title">name of product company : {{$product->name}}</h5>
    <p class="card-text">The Price : {{$product->price}}</p>
    <p class="card-text">The product in category : {{ $product->category->name ?? 'No Category' }}</p>
    <p class="card-text"><strong >The description of product </strong>  {{$product->description}}</p>
    <a href="#" class="btn btn-outline-success">BUY</a>
  </div>
</div>



@endsection