@extends('layouts.app')

@section('title', $article->name)

@section('content')
<script>
    function height() {
        var x = document.getElementById("contentTextarea");
        x.style.height = x.scrollHeight + "px";
    }   
</script>

<section class="articleContent">
    <article class="article">
        <h1>{{$article->name}}</h1>
        
        <p>Posted: {{$article->updated_at->format('d-m-Y')}}</p>

        <section class="articleTagContainer">
            @foreach($articleTags as $articleTag)                
                <p>{{$articleTag->tag->tag}}</p>
            @endforeach
        </section>
        
        @foreach($articleImages as $articleImage)
        @if($articleImage->article_id === $article->id)
        <img class="articleImage" src="/uploads/images/{{$articleImage->image->file}}" alt="{{$articleImage->description}}">
        @endif
        @endforeach

        <textarea id="contentTextarea" readonly class="articleContent">{{$article->details}}</textarea>
    </article>

    <aside class="otherArticles">
        <h2>Latest Posts:</h2>
        @foreach($otherArticles as $otherArticle)
        @if($otherArticle->id !== $article->id)
        <div>
            @foreach($articleImages as $articleImage)
            @if($articleImage->article_id === $otherArticle->id)
            <img  src="/uploads/images/{{$articleImage->image->file}}" alt="{{$articleImage->description}}">
            @endif
            @endforeach
            
            <h3>{{$otherArticle->name}}</h3>
            <a href="/blog/{{$otherArticle->id}}">Read More <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        @endif
        @endforeach
    </aside>
</section>


@endsection