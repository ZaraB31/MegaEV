@extends('layouts.app')

@section('title', 'Mega EV')

@section('content')
<article class="home">
    <section>
        <h1>Banner</h1>
    </section>

    <section>
        <h2>About Us</h2>
    </section>

    <section class="homeBrands">
        <img src="{{url('/images/Spie-Manchester.jpg')}}" alt="">
        <div>
            <p>We work with world leading charger brands to provide the best quality installs.</p>
            <p>Our brands include:</p>
            <ul>
                @foreach($brands as $brand)
                <li>{{$brand->name}}</li>
                @endforeach
            </ul>
        </div>
    </section>

    <section class="news">
        <h2>Latest News</h2>
        <article>
            @foreach($articles as $article)
            <div>
                
                @foreach($articleImages as $articleImage)
                @if($articleImage->article_id === $article->id)
                   <img src="/uploads/images/{{$articleImage->image->file}}" alt="">
                @endif
                @endforeach
                <section>
                    <a href="/blog/{{$article->id}}">
                        <h3>{{$article->name}}</h3>
                        <p>Read More <i class="fa-solid fa-arrow-right"></i></p>
                    </a>
                </section>
                
            </div>
            @endforeach   
        </article>
    </section>

    <section class="twitter">        
    <a class="twitter-timeline" data-height="550" href="https://twitter.com/MegaEV1?ref_src=twsrc%5Etfw">Tweets by MegaEV1</a> 
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>    </section>
</article>
@endsection
