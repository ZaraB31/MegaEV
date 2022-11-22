@extends('layouts.admin')

@section('title', 'New Case Study')

@section('content')

<section class="content">
    <article class="title">
        <h1>New Case Study</h1>
    </article>

    <article class="fullWidth">
        <form action="{{ route('createStudy') }}" method="post" class="fullPageForm">
            @csrf
            @include('includes.error')

            <label for="name">Title: </label>
            <input type="text" name="name" id="name">

            <label for="content">Content: </label>
            <textarea name="content" id="content"></textarea>

            <label for="testimony">Client Testimony: </label>
            <textarea name="testimony" id="testimony"></textarea>

            <label for="testimonyAuthor">Client Name: </label>
            <input type="text" name="testimonyAuthor" id="testimonyAuthor">

            <input type="number" name="draft" value="0" style="display:none;">

            <input type="submit" value="Save">
        </form>
        <a href="/admin/caseStudies"><button class="cancel">Cancel</button></a>
    </article>
</section>

<section>
    
</section>
@endsection