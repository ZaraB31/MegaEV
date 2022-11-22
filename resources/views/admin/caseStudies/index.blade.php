@extends('layouts.admin')

@section('title', 'Case Studies Dashboard')

@section('content')
<section class="content">
    <article class="title">
        <h1>Case Studies</h1>
        <button class="addButton"><a href="/admin/caseStudies/create">New Case Study</a></button>
    </article>

    <article class="fullWidth">
        <table>
            <tr>
                <th>Draft Case Studies</th>
            </tr>
            @foreach($studies as $study)
            @if($study->draft === 0)
            <tr>
                <td><a href="/admin/caseStudies/{{$study->id}}">{{$study->name}}  <i class="fa-solid fa-arrow-right-long"></i></a></td>
            </tr>
            @endif
            @endforeach
        </table>

        <table>
            <tr>
                <th>Published Case Studies</th>
            </tr>
            @foreach($studies as $study)
            @if($study->draft === 1)
            <tr>
                <td><a href="/admin/caseStudies/{{$study->id}}">{{$study->name}}  <i class="fa-solid fa-arrow-right-long"></i></a></td>
            </tr>
            @endif
            @endforeach
        </table>
    </article>
</section>
@endsection