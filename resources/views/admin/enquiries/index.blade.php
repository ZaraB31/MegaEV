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
        <td><a onClick="tableOpen('{{$enquiry->created_at}}')"> {{$enquiry->created_at->format('d-m-Y H:i')}} 
            <i id="{{$enquiry->created_at}} icon" class="fa-solid fa-chevron-down"></i></a>  
            <a href="/admin/enquiries/delete/{{$enquiry->id}}"><i class="fa-solid fa-trash-can"></i></a>
        </td>
    </tr>
    <tr id="{{$enquiry->created_at}}.name" class="hidden">
        <td><span>Name:</span> {{$enquiry->name}}</td>
    </tr>
    <tr id="{{$enquiry->created_at}}.email" class="hidden">
        <td><span>Email:</span> {{$enquiry->email}}</td>
    </tr>
    <tr id="{{$enquiry->created_at}}.message" class="hidden">
        <td><span>Message:</span> {{$enquiry->message}}</td>
    </tr>
    @endforeach
</table>
</section>
@endsection