@extends('layouts.admin')

@section('title', 'Tags Dashboard')

@section('content')
<h1>Article Tags</h1>

<section class="table">
    <table>
        <tr>
            <th>Tags</th>
        </tr>
        @foreach($tags as $tag)
        <tr>
            <td>
                {{$tag->tag}} 
                <i class="fa-solid fa-pen-to-square"></i> 
                <i class="fa-solid fa-trash-can"></i>
            </td>
            
        </tr>
        @endforeach
    </table>
</section>

<section class="form">
    <h2>Add new Tag</h2>

    <form action="{{ route('createTag') }}" method="post">
        @csrf
        @include('includes.error')

        <label for="tag">Tag:</label>
        <input type="text" name="tag" id="tag">

        <input type="submit" value="Save">
    </form>
</section>

@endsection