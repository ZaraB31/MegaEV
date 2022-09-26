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
                @foreach($details as $detail)
                <ul>
                    <li>{{$detail->address1}}</li>
                    <li>{{$detail->address2}}</li>
                    <li>{{$detail->address3}}</li>
                    <li>{{$detail->postcode}}</li>
                    <li>{{$detail->phone}}</li>
                    <li>{{$detail->email}}</li>
                </ul>
                <button onClick="openForm()">Update Details</button>
                @endforeach
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

            @if(isset($socials))
                @foreach($socials as $social)
                <p><i class="fa-brands fa-square-facebook"></i> Facebook:</p>
                <p>Name: {{$social->facebookName}}</p>

                <p><i class="fa-brands fa-twitter"></i> Twitter:</p>
                <p>Name: {{$social->twitterName}}</p>

                <button onClick="openSecondForm()">Update Socials</button>
                @endforeach
            @else
            <form action="{{ route('createSocials') }}" method="post">
                @csrf
                @include('includes.error')

                <label for="facebookName">Facebook Name:</label>
                <input type="text" name="facebookName" id="facebookName">

                <label for="facebookLink">Facebook Link:</label>
                <input type="text" name="facebookLink" id="facebookLink">

                <label for="twitterName">Twitter Name:</label>
                <input type="text" name="twitterName" id="twitterName">

                <label for="twitterLink">Twitter Link:</label>
                <input type="text" name="twitterLink" id="twitterLink">

                <input type="submit" value="Save">
            </form>
            @endif
        </article>
    </section>
</section>

@if(isset($details))
<div class="hiddenForm" id="hiddenForm" style="display:none;">
    <a onClick="closeForm()"><i class="fa-solid fa-xmark"></i></a> 
    <h2>Update Featured Image</h2>

    @foreach($details as $detail)
    <form action="/admin/details/{{$detail->id}}/edit" method="post" enctype="multipart/form-data">
        @csrf
        @include('includes.error')
        
            <label for="address1">Address Line 1:</label>
            <input type="text" name="address1" id="address1" value="{{$detail->address1}}">

            <label for="address2">Address Line 2:</label>
            <input type="text" name="address2" id="address2" value="{{$detail->address2}}">

            <label for="address3">Address Line 3:</label>
            <input type="text" name="address3" id="address3" value="{{$detail->address3}}">

            <label for="postcode">Postcode:</label>
            <input type="text" name="postcode" id="postcode" value="{{$detail->postcode}}">

            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" id="phone" value="{{$detail->phone}}">

            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" value="{{$detail->email}}"> 
        @endforeach

        <input type="submit" value="Update">
    </form>
</div>
@endif

@if(isset($socials))
<div class="hiddenForm" id="secondHiddenForm" style="display:none;">
    <a onClick="closeSecondForm()"><i class="fa-solid fa-xmark"></i></a> 
    <h2>Update Socials</h2>

    @foreach($socials as $social)
    <form action="/admin/socials/{{$social->id}}/edit" method="post" enctype="multipart/form-data">
        @csrf
        @include('includes.error')
        
            <label for="facebookName">Facebook Name:</label>
            <input type="text" name="facebookName" id="facebookName" value="{{$social->facebookName}}">

            <label for="facebookLink">Facebook Link:</label>
            <input type="text" name="facebookLink" id="facebookLink" value="{{$social->facebookLink}}">

            <label for="twitterName">Twitter Name:</label>
            <input type="text" name="twitterName" id="twitterName" value="{{$social->twitterName}}">

            <label for="twitterLink">Twitter Link:</label>
            <input type="text" name="twitterLink" id="twitterLink" value="{{$social->twitterLink}}">
        @endforeach

        <input type="submit" value="Update">
    </form>
</div>
@endif
@endsection