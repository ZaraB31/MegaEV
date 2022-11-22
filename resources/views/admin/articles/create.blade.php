@extends('layouts.admin')

@section('title', 'Create New Article')

@section('content')


<section class="content">
    <article class="title">
        <h1>Add New Blog Article</h1>
    </article>

    <article class="fullWidth">
        <form action="{{ route('storeArticle') }}" method="post" class="fullPageForm">
            @csrf
            @include('includes.error')

            <label for="name">Article Title:</label>
            <input type="text" name="name" id="name">

            <label for="details">Article Content:</label>
            <textarea name="details" id="details"></textarea>

            <input type="number" name="draft" value=0 style="display:none;">

            <input type="submit" value="Save">
        </form>
        <a href="/admin/articles"><button class="cancel">Cancel</button></a>
    </article>
</section>
@endsection