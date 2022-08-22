@extends('layouts.admin')

@section('title', 'Brands Dashboard')

@section('content')
<section class="details">
    <h1>{{$brand->name}}</h1>
    <p>{{$brand->details}}</p>
    <p>{{$brand->link}}</p>
</section>

<aside class="image">
    <h2>Logo</h2> 
        @if (isset($brandImage))
            <img src="/uploads/images/{{$brandImage->image->file}}" alt="{{$brandImage->image->description}}">
            <button>Update Logo</button>
        @else
            <form action="{{ route('assignBrandImage') }}" method="post">
                @csrf
                @include('includes.error')

                <input name="brand_id" type="text" value="{{$brand->id}}" style="display:none;">

                <label for="image_id">Select image:</label>
                <select name="image_id" id="image_id">
                    <option value="">Select...</option>
                    @foreach($images as $image)
                    <option value="{{$image->id}}">{{$image->name}}</option>
                    @endforeach
                </select>

                <input type="submit" value="Save">
            </form>
        @endif
</aside>

<section class="buttons">
    <button class="editButton"><i class="fa-solid fa-pen-to-square"></i>  Edit</button>
    <button class="deleteButton"><i class="fa-solid fa-trash-can"></i>  Delete</button>
</section>
@endsection