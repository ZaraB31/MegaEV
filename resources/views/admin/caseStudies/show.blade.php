@extends('layouts.admin')

@section('title', $study->name)

@section('content')
<script>
    function height() {
        var x = document.getElementById("contentTextarea");
        x.style.height = x.scrollHeight + "px";
    }   
</script>

<div class="backButton">
    <a  href="/admin/caseStudies"><i class="fa-solid fa-arrow-left"></i> Back</a>
</div>

<section class="details">
    <h1>{{$study->name}}</h1>
    <textarea id="contentTextarea" readonly>{{$study->content}}</textarea>

    <h2>Testimony</h2>
    <p>{{$study->testimony}}</p>
    <p>{{$study->testimonyAuthor}}</p>
</section>

<aside class="draft">
    @if($study->draft === 0)
        <h2>This case study is a draft</h2>
        <form action="{{ route('publishStudy') }}" method="post">
            @csrf
            @include('includes.error')
            <input type="text" name="id" value="{{$study->id}}" style="display:none;">
            <input type="submit" value="Publish Case Study">
        </form>
    @elseif($study->draft === 1)
        <h2>This case study is published</h2>
        <form action="{{ route('unpublishStudy') }}" method="post">
            @csrf
            @include('includes.error')
            <input type="text" name="id" value="{{$study->id}}" style="display:none;">
            <input type="submit" value="Return to draft">
        </form>
    @endif
</aside>

<aside class="image">
    <h2>Featured Image</h2>
    @if(isset($featuredImage))
        <img src="/uploads/images/{{$featuredImage->image->file}}" alt="{{$featuredImage->image->description}}">
        <button onClick="openForm()">Update image</button>
    @else
    <form action="{{ route('storeStudyFeaturedImage') }}" method="post">
        @csrf
        @include('includes.error')

        <label for="image_id">Select Image: </label>
        <select name="image_id" id="image_id">
            <option value="">Select...</option>
            @foreach($images as $image)
            <option value="{{$image->id}}">{{$image->name}}</option>
            @endforeach
        </select>

        <input type="text" name="study_id" id="study_id" value="{{$study->id}}" style="display:none;">

        <input type="text" name="featured" id="featured" value=1 style="display:none;">

        <input type="submit" value="Save">
    </form>
    @endif
</aside>

<aside class="image">
    <h2>Gallery</h2>
    @if(isset($galleryImages))
    <div class="gallery">
        @foreach($galleryImages as $galleryImage)
            <img src="/uploads/images/{{$galleryImage->image->file}}" alt="{{$galleryImage->image->description}}">
        @endforeach
    </div>
    <button>Update gallery</button>
    @else
    <form action="{{ route('storeStudygallery') }}" method="post" class="studyGallery">

        @csrf
        @include('includes.error')

        <p style="font-weight: bold; margin-bottom: 0.3em;">Select Images:</p>
        @foreach($images as $image)
        <div>
            <input type="checkbox" name="image_id[]" id="image_id" value="{{$image->id}}">
            <label for="image_id">{{$image->name}}</label>
        </div>
        @endforeach

        <input type="text" name="study_id" id="study_id" value="{{$study->id}}" style="display:none;">

        <input type="submit" value="Add images to gallery">
    </form>
    @endif
</aside>

<section class="buttons">
    <button class="editButton"><i class="fa-solid fa-pen-to-square"></i>  Edit</button>
    <button class="deleteButton"><i class="fa-solid fa-trash-can"></i>  Delete</button>
</section>

@if(isset($featuredImage))
    <div class="hiddenForm" id="hiddenForm" style="display:none;">
    <a onClick="closeForm()"><i class="fa-solid fa-xmark"></i></a> 
    <h2>Update Featured Image</h2>

    <form action="/admin/caseStudy/featuredImage/{{$featuredImage->id}}/edit" method="post" enctype="multipart/form-data">
        @csrf
        @include('includes.error')
        <label for="image_id">Select new featured image:</label>
        <select name="image_id" id="image_id">
            <option value="{{$featuredImage->image_id}}">{{$featuredImage->image->name}}</option>
            @foreach($images as $image)
            @if($image->id !== $featuredImage->image_id)
            <option value="{{$image->id}}">{{$image->name}}</option>
            @endif
            @endforeach
        </select>

        <input type="submit" value="Update">
    </form>
    </div>
@endif
@endsection