@extends('layouts.app')

@section('title')
Edit Product
@endsection


@section('content')
<div style="width:900px">
<h2 for="title">Edit Product</h2>
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form method="POST" action="{{ route('products.update') }}" style="margin:20px" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name of product</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="name of product">
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" class="form-control" id="price" placeholder="price">
    </div>

    <div class="form-group">
        <label for="category_id">Category </label>
        <select name="category_id" class="form-control" id="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description of product</label>
        <textarea name="description" class="form-control" id="description" rows="3"></textarea>
    </div>

<div class="form-group">
        <label for="image">Product Image</label>
        <input type="file" name="image" class="form-control" id="image">
    </div>

    @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mt-2">
    @endif

    <div class="form-group">
        <button type="submit" class="btn btn-outline-success mb-2">Update</button>
    </div>
</form>

</div>
@endsection