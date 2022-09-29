@extends('layouts.app')

@section('title', 'Mega EV')

@section('content')
<article class="home">
    <section class="banner">
        <h2>Banner</h2>
    </section>

    <section class="about">
        <img src="{{url('/images/Brynteg.jpg')}}" alt="">
        <article>
            <div>
                
                <i class="fa-solid fa-circle-check"></i><h3>Genuine Quality Products</h3>
                <p>Top brand EV charge points backed by manufacturers guarantees</p>
            </div> 
            <div>
                
                <i class="fa-solid fa-circle-check"></i><h3>Professional Installation</h3>
                <p>We have a team of professional experienced engineers ready to install your charge point for you</p>
            </div> 
            <div>
                
                <i class="fa-solid fa-circle-check"></i><h3>Expert Advice</h3>
                <p>Our team are on hand and ready to answer all of your EV queries</p>
            </div>
        </article>
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
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>    
    </section>
</article>
@endsection
