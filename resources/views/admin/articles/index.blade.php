@extends('layouts.admin')

@section('title', 'Articles Dashboard')

@section('content')
<h1>Articles</h1>
<button class="addButton"><a href="{{ route('createArticle') }}">Add new Article</a></button>
<section>
    <table>
        <tr>
            <th>Articles</th>
        </tr>
    </table>
</section>

@endsection