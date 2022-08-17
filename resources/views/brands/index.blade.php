@extends('layouts.app')

@section('title', 'Our Brands')

@section('content')
<h1>Our Brands</h1>
<section>
    
    <div class="tab">
        @foreach($brands as $brand)
            <button class="tablinks" onclick="openBrand(event, '{{$brand->name}}')" id="defaultOpen">{{$brand->name}}</button>
        @endforeach
    </div>

    @foreach($brands as $brand)
        <div id="{{$brand->name}}" class="tabcontent" style="display:none;">
            <h3>{{$brand->name}}</h3>
            <p>{{$brand->details}}</p>
            <p>Find out more: <a href="{{$brand->link}}">{{$brand->link}}</a></p>
        </div>
    @endforeach

</section>
@endsection
