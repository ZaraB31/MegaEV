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
@endsection