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

    <section>
        <h2>Twitter</h2>
    </section>
</article>
@endsection
