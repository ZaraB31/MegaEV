@extends('layouts.admin')

@section('title', $product->name)

@section('content')
<section class="details">
    <h1>{{$product->name}}</h1>
    <p>{{$product->details}}</p>
    <p>Price Range: {{$product->priceRange}}</p>
</section>

<aside class="image">
    <h2>Product Image</h2>
    @if (isset($productImage))
        <img src="/uploads/images/{{$productImage->image->file}}" alt="{{$productImage->image->description}}">
        <button>Update Logo</button>
    @else
        <form action="{{ route('assignProductImage') }}" method="post">
            @csrf
            @include('includes.error')

            <input name="product_id" type="text" value="{{$product->id}}" style="display:none;">

            <label for="image_id">Select image:</label>
            <select name="image_id" id="image_id">
                <option value="">Select...</option>
                @foreach($images as $image)
                <option value="{{$image->id}}">{{$image->name}}</option>
                @endforeach
            </select>

            <input type="submit" value="Save">
        </form>
        @endif
</aside>

<section class="buttons">
    <button class="editButton"><i class="fa-solid fa-pen-to-square"></i>  Edit</button>
    <button class="deleteButton"><i class="fa-solid fa-trash-can"></i>  Delete</button>
</section>
@endsection