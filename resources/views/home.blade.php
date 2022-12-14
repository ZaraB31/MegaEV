@extends('layouts.app')

@section('title', 'Mega EV')

@section('description', 'Mega EV, North Wales leading electric car charger specialists. Approved installers of all major chargers.')

@section('content')
<article class="home">
    <section class="banner">
        <img src="{{url('/images/unit.jpg')}}" alt=""> 
        <div>
            <h1>North Wales' leading electric car charger specialists</h1>
            <p>Approved installers of all major chargers</p>
            <button>Find Out More   <i class="fa-solid fa-arrow-right"></i></button>
        </div>   
    </section>

    <section class="checklist">
        <img src="{{url('/images/Brynteg.jpg')}}" alt="">
        <article>
            <div>
                
                <i class="fa-regular fa-circle-check"></i><h2>Genuine Quality Products</h2>
                <p>Top brand EV charge points backed by manufacturers guarantees</p>
            </div> 
            <div>
                
                <i class="fa-regular fa-circle-check"></i><h2>Professional Installation</h2>
                <p>We have a team of professional experienced engineers ready to install your charge point for you</p>
            </div> 
            <div>
                
                <i class="fa-regular fa-circle-check"></i><h2>Expert Advice</h2>
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
                    <a href="/blog/{{$article->name}}">
                        <h3>{{$article->name}}</h3>
                        <button>Read More <i class="fa-solid fa-arrow-right"></i></button>
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
