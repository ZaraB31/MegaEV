@extends('layouts.admin')

@section('title', 'Gallery Dashboard')

@section('content')
<div class="backButton">
    <a  href="/admin/gallery"><i class="fa-solid fa-arrow-left"></i> Back</a>
</div>
<h1>{{$image->name}}</h1>
<p>{{$image->description}}</p>

<img src="/uploads/images/{{$image->file}}" alt="{{$image->description}">
@endsection