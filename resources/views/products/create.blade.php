@extends('layouts.app')

@section('title')
create product
@endsection


@section('content')
<div style="width:900px">
<h2 for="title">Create Product</h2>
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form method="POST" action="{{ route('products.store') }}" style="margin:20px" enctype="multipart/form-data">
    @csrf

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
        <label for="image">Upload Image</label>
        <input type="file" class="form-control" name="image">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-outline-success mb-2">Create</button>
    </div>
</form>

</div>
@endsection