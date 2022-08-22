@extends('layouts.admin')

@section('title', $product->name)

@section('content')
<section>
    <h1>{{$product->name}}</h1>
    <p>{{$product->details}}</p>
    <p>Price Range: {{$product->priceRange}}</p>
</section>
<aside>
    <h2>Logo</h2>
</aside>
<button class="editButton"><i class="fa-solid fa-pen-to-square"></i>  Edit</button>
<button class="deleteButton"><i class="fa-solid fa-trash-can"></i>  Delete</button>
@endsection