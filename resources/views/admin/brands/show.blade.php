@extends('layouts.admin')

@section('title', $brand->name)

@section('content')
<div class="backButton">
    <a  href="/admin/brands"><i class="fa-solid fa-arrow-left"></i> Back</a>
</div>
<section class="details">
    <h1>{{$brand->name}}</h1>
    <p>{{$brand->details}}</p>
    <p>{{$brand->link}}</p>
</section>

<aside class="image">
    <h2>Logo</h2> 
        @if (isset($brandImage))
            <img src="/uploads/images/{{$brandImage->image->file}}" alt="{{$brandImage->image->description}}">
            <button onClick="openForm()">Update Logo</button>
        @else
            <form action="{{ route('assignBrandImage') }}" method="post">
                @csrf
                @include('includes.error')

                <input name="brand_id" type="text" value="{{$brand->id}}" style="display:none;">

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
    <button class="editButton"><a href="/admin/brand/{{$brand->id}}/edit"><i class="fa-solid fa-pen-to-square"></i>  Edit</a></button>
    <button class="deleteButton" onClick="openSecondForm()"><i class="fa-solid fa-trash-can"></i>  Delete</button>
</section>

@if(isset($brandImage))
<div class="hiddenForm" id="hiddenForm" style="display:none;">
    <a onClick="closeForm()"><i class="fa-solid fa-xmark"></i></a> 
    <h2>Update Brand Logo</h2>

    <form action="/admin/brand/image/{{$brandImage->id}}/edit" method="post" enctype="multipart/form-data">
        @csrf
        @include('includes.error')
        <label for="image_id">Select new logo:</label>
        <select name="image_id" id="image_id">
            <option value="">Select...</option>
            @foreach($images as $image)
            @if($image->id !== $brandImage->image_id)
                <option value="{{$image->id}}">{{$image->name}}</option>
            @endif
            @endforeach
        </select>

        <input type="submit" value="Update">
    </form>
</div>
@endif

<div class="hiddenForm deleteForm" id="secondHiddenForm" style="dsplay:none;">

    <h2>{{$brand->name}}</h2>
    <p>Are you sure you want to delete this brand?</p>
    
    <section>
        <button onClick="closeSecondForm()" class="cancelButton">Cancel</button>
        <form action="/admin/brand/{{$brand->id}}/delete" enctype="multipart/form-data">

            @csrf
            @include('includes.error')

            <input type="submit" value="Delete">
        </form>
    </section>
</div>
@endsection