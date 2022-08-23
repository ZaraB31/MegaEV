@extends('layouts.admin')

@section('title', 'New Case Study')

@section('content')
<h1>New Case Study</h1>
<section>
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
</section>
@endsection