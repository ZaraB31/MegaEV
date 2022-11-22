@extends('layouts.admin')

@section('title', $product->name)

@section('content')

<section class="content">
    <div class="backButton">
        <a  href="/admin/products"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>

    <article class="title">
        <h1>{{$product->name}}</h1>
    </article>

    <article class="center">
        <p style="margin-top:0;"><span>Brand:</span> {{$product->brand->name}}</p>
        <p>{{$product->details}}</p>
        <p>Price Range: {{$product->priceRange}}</p>
    </article>

    <aside>
        <article>
            <h2>Product Image</h2>
            @if (isset($productImage))
                <img src="/uploads/images/{{$productImage->image->file}}" alt="{{$productImage->image->description}}">
                <button onClick="openForm()">Update Logo</button>
            @else
                <form action="{{ route('assignProductImage') }}" method="post">
                    @csrf
                    @include('includes.error')

                    <input id="product_id" name="product_id" type="text" value="{{$product->id}}" style="display:none;">

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
        </article>
    </aside>

    <article class="buttons">
        <button class="editButton"><a href="/admin/product/{{$product->id}}/edit"><i class="fa-solid fa-pen-to-square"></i>  Edit</a></button>
        <button class="deleteButton" onClick="openSecondForm()"><i class="fa-solid fa-trash-can"></i>  Delete</button>
    </article>
</section>

@if(isset($productImage))
<div class="hiddenForm" id="hiddenForm" style="display:none;">
    <a onClick="closeForm()"><i class="fa-solid fa-xmark"></i></a> 
    <h2>Update Product Logo</h2>

    <form action="/admin/product/image/{{$productImage->id}}/edit" method="post" enctype="multipart/form-data">
        @csrf
        @include('includes.error')
        <label for="image_id">Select new logo:</label>
        <select name="image_id" id="image_id">
            <option value="">Select...</option>
            @foreach($images as $image)
            @if($image->id !== $productImage->image_id)
                <option value="{{$image->id}}">{{$image->name}}</option>
            @endif
            @endforeach
        </select>

        <input type="submit" value="Update">
    </form>
</div>
@endif

<div class="hiddenForm deleteForm" id="secondHiddenForm" style="display:none;">

    <h2>{{$product->name}}</h2>
    <p>Are you sure you want to delete this product?</p>
    
    <section>
        <button onClick="closeSecondForm()" class="cancelButton">Cancel</button>
        <form action="/admin/product/{{$product->id}}/delete" enctype="multipart/form-data">

            @csrf
            @include('includes.error')

            <input type="submit" value="Delete">
        </form>
    </section>
</div>
@endsection