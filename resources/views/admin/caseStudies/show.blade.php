@extends('layouts.admin')

@section('title', $study->name)

@section('content')
<section class="details">
    <h1>{{$study->name}}</h1>
    <p>{{$study->content}}</p>

    <h2>Testimony</h2>
    <p>{{$study->testimony}}</p>
    <p>{{$study->testimonyAuthor}}</p>
</section>

<aside class="image">
    <h2>Featured Image</h2>
    <form action="" method="post">
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

        <input type="text" name="featured" id="featured" value="1" style="display:none;">

        <input type="submit" value="Save">
    </form>
</aside>

<aside class="image">
    <h2>Gallery</h2>
    <form action="" method="post" class="studyGallery">

    <label>Select Images:</label>
        @foreach($images as $image)
        <input type="checkbox" name="image_id" id="image_id">
        <label for="image_id">{{$image->name}}</label>
        @endforeach

        <input type="submit" value="Add images to gallery">
    </form>
</aside>

<section class="buttons">
    <button class="editButton"><i class="fa-solid fa-pen-to-square"></i>  Edit</button>
    <button class="deleteButton"><i class="fa-solid fa-trash-can"></i>  Delete</button>
</section>
@endsection