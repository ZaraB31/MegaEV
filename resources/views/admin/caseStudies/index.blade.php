@extends('layouts.admin')

@section('title', 'Case Studies Dashboard')

@section('content')
<h1>Case Studies</h1>

<button class="addButton"><a href="/admin/caseStudies/create">New Case Study</a></button>

<section>
    <table>
        <tr>
            <th>Study Name</th>
        </tr>
        @foreach($studies as $study)
        <tr>
            <td><a href="/admin/caseStudies/{{$study->id}}">{{$study->name}}  <i class="fa-solid fa-arrow-right-long"></i></a></td>
        </tr>
        @endforeach
    </table>
</section>
@endsection