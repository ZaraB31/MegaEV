@extends('layouts.app')

@section('title', $study->name)

@section('content')
<script>
    function height() {
        var x = document.getElementById("contentTextarea");
        x.style.height = x.scrollHeight + "px";
    }   
</script>
<p class="breadcrumbs"><a href="/">Home</a>\<a href="/caseStudies">Case Studies</a>\{{$study->name}}</p>
<h1>{{$study->name}}</h1>
    @foreach($galleryImages as $image)
    @if($image->featured === 1)
        <img class="featuredImage" src="/uploads/images/{{$image->image->file}}" alt="">
    @endif
    @endforeach
<textarea id="contentTextarea" readonly class="studyContent">{{$study->content}}</textarea>

<div class="testimony">
    <p>{{$study->testimony}}</p>
    <h3>{{$study->testimonyAuthor}}</h3>
</div>

<section class="gallery">
    @foreach($galleryImages as $image)
    @if($image->featured === 0)
        <img src="/uploads/images/{{$image->image->file}}" alt="">
    @endif
    @endforeach
</section>
@endsection