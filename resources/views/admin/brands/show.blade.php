@extends('layouts.admin')

@section('title', 'Brands Dashboard')

@section('content')
<h1>{{$brand->name}}</h1>
<p>{{$brand->details}}</p>
<p>{{$brand->link}}</p>

<button class="editButton"><i class="fa-solid fa-pen-to-square"></i>  Edit</button>
<button class="deleteButton"><i class="fa-solid fa-trash-can"></i>  Delete</button>
@endsection