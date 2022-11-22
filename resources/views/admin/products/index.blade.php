@extends('layouts.admin')

@section('title', 'Products Dashboard')

@section('content')
<section class="content">
    <article class="title">
        <h1>Products</h1>
    </article>

    <article class="center">
        <table>
            <tr>
                <th>Product Name</th>
                <th>Brand</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td><a href="/admin/product/{{$product->id}}">{{$product->name}}  <i class="fa-solid fa-arrow-right-long"></i></a></td>
                <td>{{$product->brand->name}}</td>
            </tr>
            @endforeach
        </table>
    </article>

    <aside>
        <article>
            <h2>Add new product</h2>

            <form action="{{ route('createProduct') }}" method="post">
                @csrf
                @include('includes.error')
                
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">

                <label for="details">Description: </label>
                <textarea name="details" id="details"></textarea>

                <label for="priceRange">Price Range: </label>
                <input type="text" name="priceRange" id="priceRange">

                <label for="brand_id">Brand: </label>
                <select style="width:100%;" name="brand_id" id="brand_id">
                <option value="">Select...</option>
                @foreach($brands as $brand)
                <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
                </select>

                <input type="submit" value="Save">
            </form>
        </article>
    </aside>
</section>
@endsection