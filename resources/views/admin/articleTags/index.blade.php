@extends('layouts.admin')

@section('title', 'Tags Dashboard')

@section('content')

<section class="content">
    <article class="title">
        <h1>Article Tags</h1>
    </article>

    <article class="center">
        <table>
            <tr>
                <th>Tags</th>
            </tr>
            @foreach($tags as $tag)
            <tr>
                <td>
                    {{$tag->tag}} 
                    <a onClick="editTag({{$tag->id}})"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="{{ route('deleteTag', $tag->id) }}"><i class="fa-solid fa-trash-can"></i></a>
                </td>      
            </tr>
            <tr id="{{$tag->id}}" style="display:none;">
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
    </article>

    <aside>
        <article>
            <h2>Add new Tag</h2>

            <form action="{{ route('createTag') }}" method="post">
                @csrf
                @include('includes.error')

                <label for="tag">Tag:</label>
                <input type="text" name="tag" id="tag">

                <input type="submit" value="Save">
            </form>
        </article>
    </aside>
</section>


<section class="table tagTable">
    
</section>

<section class="form">
    
</section>

@endsection