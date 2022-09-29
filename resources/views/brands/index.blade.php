@extends('layouts.app')

@section('title', 'Mega EV - Our Brands')

@section('content')
<h1>Our Brands</h1>
<p>Lorem ipsum dolor sit amet. Et voluptatum magnam et quos quisquam  neque 
explicabo et quasi unde in exercitationem veniam et exercitationem maxime ut 
quis repellat. Sed perspiciatis laborum id quae dolores qui possimus minus 
aut laudantium illo quo sequi alias. </p>
<p>Est quasi quisquam ad perspiciatis veniam sed velit libero. Aut sapiente 
sapiente aut Quis sunt ea inventore perspiciatis in saepe numquam sed 
illum delectus? Qui temporibus impedit non fugit quas qui voluptates 
deserunt. Et quis repellendus hic culpa corporis vel odit  et dolores 
voluptatem! </p>

<section>
    
    <div class="tab">
        @foreach($brands as $brand)
            <button class="tablinks" onclick="openBrand(event, '{{$brand->name}}')" id="defaultOpen">{{$brand->name}}</button>
        @endforeach
    </div>

    @foreach($brands as $brand)
        <div id="{{$brand->name}}" class="tabcontent" style="display:none;">
            <div class="brand">
                <div>
                    <h2>{{$brand->name}}</h2>
                    <p>{{$brand->details}}</p>
                    <p>Find out more: <a href="{{$brand->link}}" target="_blank">{{$brand->link}}</a></p>
                </div>
                @foreach($brandImages as $brandImage)
                    @if($brandImage->brand_id === $brand->id)
                        <img src="/uploads/images/{{$brandImage->image->file}}" alt="{{$brandImage->image->description}}">
                    @endif
                @endforeach
            </div>

            @foreach($products as $product) 
            @if($product->brand_id === $brand->id)
            <hr class="line">
            <article class="product">
                <div>
                    <h3>{{$product->name}}</h3>
                    <p>{{$product->details}}</p>
                    <p class="price"><span>Price Range:</span> {{$product->priceRange}}</p>
                </div>
                @foreach($productImages as $productImage)
                    @if($productImage->product_id === $product->id)
                    <img src="/uploads/images/{{$productImage->image->file}}" alt="{{$productImage->image->description}}">
                    @endif
                @endforeach
            </article>
            @endif
            @endforeach
        </div>
    @endforeach

</section>
@endsection
