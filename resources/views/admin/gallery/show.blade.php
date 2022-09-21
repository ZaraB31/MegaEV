@extends('layouts.admin')

@section('title', $image->name)

@section('content')
<div class="backButton">
    <a  href="/admin/gallery"><i class="fa-solid fa-arrow-left"></i> Back</a>
</div>
<section class="table">
    <h1>{{$image->name}}</h1>
    <p>{{$image->description}}</p>

    <img src="/uploads/images/{{$image->file}}" alt="{{$image->description}}">
</section>

<section class="form">
    <h2>Update Details</h2>
    <form action="/admin/gallery/{{$image->id}}/edit" method="post">
        @csrf
        @include('includes.error')

        <label for="name">Edit Name:</label>
        <input type="text" name="name" id="name" value="{{$image->name}}">

        <label for="description">Edit Description</label>
        <input type="text" name="description" id="description" value="{{$image->description}}">

        <input type="submit" value="Update">
    </form>
</section>

@endsection