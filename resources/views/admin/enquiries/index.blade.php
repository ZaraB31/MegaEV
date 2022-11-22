@extends('layouts.admin')

@section('title', 'Enquiries Dashboard')

@section('content')

<section class="content">
    <article class="title">
        <h1>Enquiries</h1>
    </article>

    <article class="fullWidth">
        <table>
            <tr>
                <th>Enquiry</th>
            </tr>
            @foreach($enquiries as $enquiry)
            <tr>
                <td><a onClick="tableOpen('{{$enquiry->created_at}}')"> {{$enquiry->created_at->format('d-m-Y H:i')}} 
                    <i id="{{$enquiry->created_at}} icon" class="fa-solid fa-chevron-down"></i></a>  
                    <a href="/admin/enquiries/delete/{{$enquiry->id}}"><i style="margin-left:10px;" class="fa-solid fa-trash-can"></i></a>
                </td>
            </tr>
            <tr id="{{$enquiry->created_at}}.name" style="display:none;">
                <td style="background-color:#B9B7BD;"><span>Name:</span> {{$enquiry->name}}</td>
            </tr>
            <tr id="{{$enquiry->created_at}}.email" style="display:none;">
                <td style="background-color:#B9B7BD;"><span>Email:</span> {{$enquiry->email}}</td>
            </tr>
            <tr id="{{$enquiry->created_at}}.message" style="display:none;">
                <td style="background-color:#B9B7BD;"><span>Message:</span> {{$enquiry->message}}</td>
            </tr>
            @endforeach
        </table>
    </article>
</section>
@endsection