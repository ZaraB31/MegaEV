@extends('layouts.admin')

@section('title', 'Edit Brand')

@section('content')

<section class="content">
    <article class="title">
        <h1>Edit Brand - {{$brand->name}}</h1>
    </article>

    <article class="fullWidth">
        <form action="/admin/brand/{{$brand->id}}/edit" method="post" class="fullPageForm">
            @csrf
            @include('includes.error')

            <label for="name">Brand Name:</label>
            <input type="text" name="name" id="name" value="{{$brand->name}}">

            <label for="details">Brand Description:</label>
            <textarea name="details" id="contentTextarea">{{$brand->details}}</textarea>

            <label for="link">Link to brand website:</label>
            <input type="text" name="link" id="link" value="{{$brand->link}}">

            <input type="submit" value="Save">
        </form> 
        <button class="cancel"><a href="/admin/brand/{{$brand->id}}">Cancel</a></button>
    </article>
</section>

@endsection