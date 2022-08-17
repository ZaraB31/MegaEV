@extends('layouts.admin')

@section('title', 'Brands Dashboard')

@section('content')
<h1>Brands</h1>
<section class="table">
    <table>
        <tr>
            <th>Brand Name</th>
        </tr>
        @foreach($brands as $brand)
        <tr>
            <td><a href="/admin/brand/{{$brand->id}}">{{ $brand->name }}  <i class="fa-solid fa-arrow-right-long"></i></a></td>
        </tr>
        @endforeach
    </table>
</section>
<section class="form">
    <h2>Add new Brand</h2>

    <form action="{{ route('createBrand') }}" method="post">
        @csrf
        @include('includes.error')
        
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">

        <label for="details">Description: </label>
        <textarea name="details" id="details"></textarea>

        <label for="link">Link to Website: </label>
        <input type="url" name="link" id="link">

        <input type="submit" value="Save">
    </form>
</section>
@endsection