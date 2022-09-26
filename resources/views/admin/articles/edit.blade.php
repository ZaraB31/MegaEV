@extends('layouts.admin')

@section('title', $article->name)

@section('content')

<script>
    function height() {
        var x = document.getElementById("contentTextarea");
        x.style.height = x.scrollHeight + "px";
    }   
</script>

<h1>Edit Article - {{$article->name}}</h1>

<form action="/admin/articles/{{$article->id}}/edit" method="post" class="fullPageForm">
    @csrf
    @include('includes.error')

    <label for="name">Article Title:</label>
    <input type="text" name="name" id="name" value="{{$article->name}}">

    <label for="details">Article Content:</label>
    <textarea id="contentTextarea">{{$article->details}}</textarea>

    <button class="cancelButton"><a href="/admin/articles/{{$article->id}}">Cancel</a></button>
    <input type="submit" value="Save">

</form>

@endsection