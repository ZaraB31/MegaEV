@extends('layouts.admin')

@section('title', $article->name)

@section('content')

<script>
    function height() {
        var x = document.getElementById("contentTextarea");
        x.style.height = x.scrollHeight + "px";
    }   
</script>

<div class="backButton">
    <a  href="/admin/articles"><i class="fa-solid fa-arrow-left"></i> Back</a>
</div>

<section class="details">
    <h1>{{$article->name}}</h1>
    <textarea readonly id="contentTextarea">{{$article->details}}</textarea>
</section>

<aside class="draft">
    @if($article->draft === 0)
        <h2>This article is a draft</h2>
        <form action="{{ route('publishArticle') }}" method="post">
            @csrf
            @include('includes.error')
            <input type="text" name="id" value="{{$article->id}}" style="display:none;">
            <input type="submit" value="Publish Article">
        </form>
    @elseif($article->draft === 1)
        <h2>This article is published</h2>
        <form action="{{ route('unpublishArticle') }}" method="post">
            @csrf
            @include('includes.error')
            <input type="text" name="id" value="{{$article->id}}" style="display:none;">
            <input type="submit" value="Return to draft">
        </form>
    @endif
</aside>

<aside class="image">
    <h2>Featured Image</h2>
    @if(isset($featuredImage))
        <img src="/uploads/images/{{$featuredImage->image->file}}" alt="{{$featuredImage->image->description}}">
    @else 
        <form action="{{ route('storeArticleFeaturedImage') }}" method="post">
            @csrf
            @include('includes.error')

            <label for="image_id">Select Image: </label>
            <select name="image_id" id="image_id">
                <option value="">Select...</option>
                @foreach($images as $image)
                <option value="{{$image->id}}">{{$image->name}}</option>
                @endforeach
            </select>

            <input type="text" name="article_id" id="article_id" value="{{$article->id}}" style="display:none;">

            <input type="text" name="featured" id="featured" value=1 style="display:none;">

            <input type="submit" value="Save">
        </form>
    @endif
</aside>
@endsection