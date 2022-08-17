@extends('layouts.admin')

@section('title', $product->name)

@section('content')
<h1>{{$product->name}}</h1>
<p>{{$product->details}}</p>
<p>Price Range: {{$product->priceRange}}</p>

<button class="editButton"><i class="fa-solid fa-pen-to-square"></i>  Edit</button>
<button class="deleteButton"><i class="fa-solid fa-trash-can"></i>  Delete</button>
@endsection