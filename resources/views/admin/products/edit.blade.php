@extends('layouts.admin')

@section('title', $product->name)

@section('content')
<h1>Edit Product - {{$product->name}}</h1>

<section>
    <form action="/admin/product/{{$product->id}}/edit" method="post" class="fullPageForm">
        @csrf
        @include('includes.error')

        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name" value="{{$product->name}}">

        <label for="details">Product Description:</label>
        <textarea name="details" id="contentTextarea">{{$product->details}}</textarea>

        <label for="priceRange">Price Range:</label>
        <input type="text" name="priceRange" id="priceRange" value="{{$product->priceRange}}">

        <label for="brand_id">Brand:</label>
        <select name="brand_id" id="brand_id">
            <option value="{{$product->brand_id}}">{{$product->brand->name}}</option>
            @foreach($brands as $brand)
            @if($brand->id !== $product->brand_id)
            <option value="{{$brand->id}}">{{$brand->name}}</option>
            @endif
            @endforeach
        </select>

        <button class="cancelButton"><a href="/admin/product/{{$product->id}}">Cancel</a></button>
        <input type="submit" value="Save">
    </form>
</section>
@endsection