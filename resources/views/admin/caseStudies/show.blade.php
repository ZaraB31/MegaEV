@extends('layouts.admin')

@section('title', $study->name)

@section('content')
<section class="details">
    <h1>{{$study->name}}</h1>
    <p>{{$study->content}}</p>

    <h2>Testimony</h2>
    <p>{{$study->testimony}}</p>
    <p>{{$study->testimonyAuthor}}</p>
</section>

<aside class="image">
    <h2>Featured Image</h2>
</aside>

<aside class="image">
    <h2>Gallery</h2>
</aside>

<section class="buttons">
    <button class="editButton"><i class="fa-solid fa-pen-to-square"></i>  Edit</button>
    <button class="deleteButton"><i class="fa-solid fa-trash-can"></i>  Delete</button>
</section>
@endsection