@extends('layouts.admin')

@section('title', 'Gallery Dashboard')

@section('content')
<h1>{{$image->name}}</h1>
<p>{{$image->description}}</p>

<img src="/uploads/images/{{$image->file}}" alt="{{$image->description}">
@endsection