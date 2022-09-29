@extends('layouts.app')

@section('title', 'Mega EV - Contact Us ')

@section('content')
<h1>Contact Us</h1>

<section class="contact">
    <article>
        <div>
            <h2>Our Address:</h2>
            <ul>
                <li>Address 1</li>
                <li>Address 2</li>
                <li>Address 3</li>
                <li>Town</li>
                <li>Postcode</li>
            </ul>
        </div>
        <div>
            <h2>Our Phone Number:</h2>
            <p>01234567890</p>
        </div>
        <div>
            <h2>Our Email Address:</h2>
            <p>Example@emailaddress.co.uk</p>
        </div>
        
    </article>
    <aside>
        <h2>Send us a message:</h2>
        @if (\Session::has('success'))
            <div class="messageSent">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        <form action="{{ route('storeEnquiry') }}" method="post">
            @csrf
            @include('includes.error')

            <label for="name">Name:</label>
            <input type="text" name="name" id="name">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email">

            <label for="message">Message:</label>
            <textarea name="message" id="message"></textarea>

            <input type="submit" value="Send">
        </form>
    </aside>
</section>
@endsection