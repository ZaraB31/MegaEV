@extends('layouts.admin')

@section('title', 'Tags Dashboard')

@section('content')
<h1>Article Tags</h1>

<section class="table tagTable">
    <table>
        <tr>
            <th>Tags</th>
        </tr>
        @foreach($tags as $tag)
        <tr>
            <td>
                {{$tag->tag}} 
                <a onClick="editTag({{$tag->id}})"><i class="fa-solid fa-pen-to-square"></i></a>
                <i class="fa-solid fa-trash-can"></i>
            </td>      
        </tr>
        <tr id="{{$tag->id}}" class="hidden">
            <td>
                <form action="/admin/tags/{{$tag->id}}/edit" method="post">
                    @csrf
                    @include('includes.error')
                    <input type="text" name="tag" id="tag" value="{{$tag->tag}}">
                    <input type="submit" value="Update">
                </form>
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