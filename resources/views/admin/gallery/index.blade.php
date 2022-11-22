@extends('layouts.admin')

@section('title', 'Gallery Dashboard')

@section('content')
<section class="content">
    <article class="title">
        <h1>Gallery</h1>
        <button onClick="openForm()" class="addButton">Add Image</button>
    </article>

    <article class="fullWidth gallery">
        @foreach($images as $image)
            <a href="/admin/gallery/{{$image->id}}"><img src="/uploads/images/{{$image->file}}" alt="{{$image->description}}"></a>
        @endforeach
    </article>
</section>


<div class="hiddenForm" id="hiddenForm" style="display:none;">
    <a onClick="closeForm()"><i class="fa-solid fa-xmark"></i></a> 
    <h2>New Image</h2>

    <form action="{{ route('createImage') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('includes.error')
        <label for="name">Name:</label>
        <input type="text" name="name">

        <label for="file">Select Image:</label>
        <input type="file" name="file" id="file">

        <label for="description">Brief Description:</label>
        <input type="text" name="description">

        <input type="submit" value="Upload">
    </form>
</div>

@endsection