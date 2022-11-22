@extends('layouts.admin')

@section('title', 'Edit Case Study')

@section('content')
<script>
    function height() {
        var x = document.getElementById("contentTextarea");
        x.style.height = x.scrollHeight + "px";
    }   
</script>

<section class="content">
    <article class="title">
        <h1>Edit Case Study - {{$study->name}}</h1>
    </article>

    <article class="fullWidth">
        <form action="" method="post" class="fullPageForm">
            @csrf
            @include('includes.error')

            <label for="name">Title: </label>
            <input type="text" name="name" id="name" value="{{$study->name}}">

            <label for="content">Content: </label>
            <textarea name="content" id="contentTextarea">{{$study->content}}</textarea>

            <label for="testimony">Client Testimony: </label>
            <textarea name="testimony" id="contentTextarea">{{$study->testimony}}</textarea>

            <label for="testimonyAuthor">Client Name: </label>
            <input type="text" name="testimonyAuthor" id="testimonyAuthor"  value="{{$study->testimonyAuthor}}">

            <input type="submit" value="Update">
        </form>
        <button class="cancel"><a href="/admin/caseStudies/{{$study->id}}">Cancel</a></button>
    </article>
</section>





@endsection