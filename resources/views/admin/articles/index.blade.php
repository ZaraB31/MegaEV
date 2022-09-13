@extends('layouts.admin')

@section('title', 'Articles Dashboard')

@section('content')
<h1>Articles</h1>
<button class="addButton"><a href="{{ route('createArticle') }}">Add new Article</a></button>
<section>
    <table class="halfTable">
        <tr>
            <th>Published Articles</th>
        </tr>
        @foreach($articles as $article)
        @if($article->draft === 1)
            <tr>
                <td><a href="/admin/articles/{{$article->id}}">{{$article->name}} <i class="fa-solid fa-arrow-right"></i></a></td>
            </tr>
        @endif
        @endforeach
    </table>

    <table class="halfTable">
        <tr>
            <th>Draft Articles</th>
        </tr>
        @foreach($articles as $article)
        @if($article->draft === 0)
            <tr>
                <td><a href="/admin/articles/{{$article->id}}">{{$article->name}} <i class="fa-solid fa-arrow-right"></i></a></td>
            </tr>
        @endif
        @endforeach
    </table>
</section>

@endsection