@extends('layouts.admin')

@section('title', 'Enquiries Dashboard')

@section('content')
<h1>Enquiries</h1>

<section class="enquiries">
<table>
    <tr>
        <th>Enquiry</th>
    </tr>
    @foreach($enquiries as $enquiry)
    <tr>
        <td><a onClick="tableOpen('{{$enquiry->created_at}}')"> {{$enquiry->created_at->format('d-m-Y H:i')}} <i id="icon" class="fa-solid fa-chevron-down"></i></a>  <i class="fa-solid fa-trash-can"></i></td>
    </tr>
    <tr id="{{$enquiry->created_at}}.name" class="hidden">
        <td>Name: {{$enquiry->name}}</td>
    </tr>
    <tr id="{{$enquiry->created_at}}.email" class="hidden">
        <td>Email: {{$enquiry->email}}</td>
    </tr>
    <tr id="{{$enquiry->created_at}}.message" class="hidden">
        <td>Message: {{$enquiry->message}}</td>
    </tr>
    @endforeach
</table>
</section>
@endsection