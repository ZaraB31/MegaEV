@extends('layouts.admin')

@section('title', 'Edit Article')

@section('title', 'Admin Dashboard')

@section('content')

<script>
    function height() {
        var x = document.getElementById("contentTextarea");
        x.style.height = x.scrollHeight + "px";
    }   
</script>


<section class="content">
<article class="title">
   <h1>Edit Article - {{$article->name}}</h1> 
</article>

<article class="fullWidth">
    <form action="/admin/articles/{{$article->id}}/edit" method="post" class="fullPageForm">
        @csrf
        @include('includes.error')

        <label for="name">Article Title:</label>
        <input type="text" name="name" id="name" value="{{$article->name}}">

        <label for="details">Article Content:</label>
        <textarea id="contentTextarea">{{$article->details}}</textarea>
        
        <input type="submit" value="Save">
    </form>
    <button class="cancel"><a href="/admin/articles/{{$article->id}}">Cancel</a></button>
</article>
</section>




@endsection