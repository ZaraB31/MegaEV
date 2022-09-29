@extends('layouts.app')

@section('title', 'Mega EV')

@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v15.0" nonce="C0THS5RC"></script>

<article class="home">
    <section>
        <h1>Banner</h1>
    </section>

    <section>
        <h2>About Us</h2>
    </section>

    <section>
        <h2>Featured Case Study</h2>
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

    <section class="twitter">        
    <a class="twitter-timeline" data-height="500" href="https://twitter.com/MegaEV1?ref_src=twsrc%5Etfw">Tweets by MegaEV1</a> 
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>    </section>
</article>
@endsection
