@extends('layouts.app')
@section('title')
Main
@endsection


@section('content')
  
    <div class="container mt-2">


<div style="display:flex;flex-direction:row; justify-content:space-around;   flex-wrap: wrap;">
  
@foreach($products as $product)
<div class="card mt-3 bg-light" style="width:18rem; border-style:none;" >
  <img class="card-img-top" src="{{ asset('storage/' . $product->image) }}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$product->name}}</h5>
    <!-- <p class="card-text">{{$product->description}}</p> -->
    <p class="card-text">{{ $product->category->name ?? 'No Category' }}</p>

    <p class="card-text text-danger">{{$product->price}} LE</p>
<div class="card-button mb-3">
<a href="{{route('products.show',$product->id)}}" type="button" class="btn btn-outline-success" style="border-style:none;">View</a>
        <a href="{{route('products.edit',$product->id)}}" type="button" class="btn btn-outline-primary" style="border-style:none;">Edit</a>

        <form style="display: inline;" method="POST" action="{{route('products.destroy', $product->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" style="border-style:none;">Delete</button>
                    </form>

</div>
    <a href="#" class="btn btn-outline-danger btn-sm">Add to card</a>
    <p class="card-text"><small class="text-muted">{{$product->created_at}}</small></p>
  </div>
</div>


    @endforeach
</div>


</div>

@endsection