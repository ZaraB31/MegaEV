@extends('layouts.admin')

@section('title', 'Articles Dashboard')

@section('content')
<section class="content">
    <article class="title">
        <h1>Articles</h1>
        <button class="addButton"><a href="{{ route('createArticle') }}">Add new Article</a></button>
    </article>

    <article class="fullWidth">
        <table>
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

        <table>
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
    </article>
</section>

@endsection