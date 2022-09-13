@extends('layouts.admin')

@section('title', $article->name)

@section('content')

<script>
    function height() {
        var x = document.getElementById("contentTextarea");
        x.style.height = x.scrollHeight + "px";
    }   
</script>

<section class="details">
    <h1>{{$article->name}}</h1>

    <textarea readonly id="contentTextarea">{{$article->details}}</textarea>
</section>
@endsection