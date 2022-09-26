@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h1>Dashboard</h1>
<section class="dashboard">
    
    <section class="center">
        <article class="brands">
            <p>Brands Table</p>
        </article>

        <article class="products">
            <p>Products Table</p>
        </article>

        <article class="studies">
            <p>Case studies table</p>
        </article>

        <article class="articles">
            <p>Articles table</p>
        </article> 
    </section>

    <section class="side">
        <article class="details">
            <h2>Company Details</h2>
            @if(isset($details))
            <p>Details</p>
            @else 
            <form action="{{ route('createDetails') }}" method="post">
                @csrf
                @include('includes.error')

                <label for="address1">Address Line 1:</label>
                <input type="text" name="address1" id="address1">

                <label for="address2">Address Line 2:</label>
                <input type="text" name="address2" id="address2">

                <label for="address3">Address Line 3:</label>
                <input type="text" name="address3" id="address3">

                <label for="postcode">Postcode:</label>
                <input type="text" name="postcode" id="postcode">

                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" id="phone">

                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email">

                <input type="submit" value="Save">
                
            </form>
            @endif
        </article>

        <article class="socials">
            <h2>Socials</h2>  
        </article>
    </section>
    
</section>
@endsection