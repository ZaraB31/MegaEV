@extends('layouts.admin')

@section('title', $image->name)

@section('content')

<section class="content">
    <div class="backButton">
        <a  href="/admin/gallery"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>

    <article class="title">
        <h1>{{$image->name}}</h1>
        
    </article>

    <article class="center">
        <p style="margin-top:0;">{{$image->description}}</p>
        <img src="/uploads/images/{{$image->file}}" alt="{{$image->description}}">
    </article>

    <aside>
        <article>
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
        </article>
    </aside>
</section>

@endsection