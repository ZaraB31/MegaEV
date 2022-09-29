@extends('layouts.admin')

@section('title', $user->name)

@section('content')
<h1>User Profile</h1>

<p><span>Name:</span> {{$user->name}}</p>
<p><span>Email:</span> {{$user->email}}</p>


@endsection