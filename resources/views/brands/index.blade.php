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
            <h2>{{$brand->name}}</h2>
            <p>{{$brand->details}}</p>
            <p>Find out more: <a href="{{$brand->link}}" target="_blank">{{$brand->link}}</a></p>

            <article>
                @foreach($products as $product) 
                @if($product->brand_id === $brand->id)
                    <div>
                        <h3>{{$product->name}}</h3>
                        <p>{{$product->details}}</p>
                        <p class="price"><span>Price Range:</span> {{$product->priceRange}}</p>
                    </div>
                @endif
                @endforeach
            </article>
        </div>
    @endforeach

</section>
@endsection
