@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')


<section class="content">

    <article class="title">
        <h1>Admin Dashboard</h1>
    </article>
    
    <article class="center">
        <table>
            <tr>
                <th colspan="2">Brands and Products</th>
            </tr>
            @if($brands->count() > 0)
            @foreach($brands as $brand)
            <tr>
                <td>{{$brand->name}}</td>
                <td>Products: {{$productsCount[$brand->id]}}</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td>No Brands Added Yet</td>
            </tr>
            @endif
        </table>

        <table>
            <tr>
                <th colspan="2">Case Studies and Articles</th>
            </tr>
            <tr> 
                @if($publishedArticles === 1)
                    <td>{{ $publishedArticles }} Published Article</td>
                @elseif($publishedArticles !== 0 && $publishedArticles !== 1)
                    <td>{{ $publishedArticles }} Published Articles</td>
                @else 
                    <td>No Articles Published</td>
                @endif

                @if($draftArticles === 1)
                    <td>{{ $draftArticles }} Draft Article</td>
                @elseif($draftArticles !== 0 && $draftArticles !== 1)
                    <td>{{ $draftArticles }} Draft Articles</td>
                @else
                    <td>No Draft Articles</td>
                @endif
            </tr>

            <tr>
                @if($publishedStudies === 1)
                    <td>{{ $publishedStudies }} Published Case Study</td>
                @elseif($publishedStudies !== 0 && $publishedStudies !== 1)
                    <td>{{ $publishedStudies }} Published Case Studies</td>
                @else
                    <td>No Published Case Studies</td>
                @endif

                @if($draftStudies === 1)
                    <td>{{ $draftStudies }} Draft Case Study</td>
                @elseif($draftStudies !== 0 && $draftStudies !== 1)
                    <td>{{ $draftStudies }} Draft Case Studies</td>
                @else 
                    <td>No Draft Case Studies</td>
                @endif
            </tr>
        </table>

        <table>
            <tr>
                <th colspan="2">Users</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
            @endforeach
        </table>
    </article>

    <aside>
        <article>
            <h2>Company Details</h2>
            @if(isset($details))
                @foreach($details as $detail)
                <ul>
                    <li>{{$detail->address1}}</li>
                    <li>{{$detail->address2}} {{$detail->address3}},</li>
                    <li>{{$detail->postcode}}</li>
                    <li>0{{$detail->phone}}</li>
                    <li>{{$detail->email}}</li>
                </ul>
                <button onClick="openForm()">Update Details</button>
                @endforeach
            @else 
            <form action="{{ route('createDetails') }}" method="post">
                @csrf
                @include('includes.error')

                <label for="address1">Address Line 1:</label>
                <input type="text" name="address1" id="address1">

                <label for="address2">Address Line 2:</label>
                <input type="text" name="address2" id="address2">

                <label for="address3">Address Line 3:</label>
                <input type="text" name="address3" id="address3">

                <label for="postcode">Postcode:</label>
                <input type="text" name="postcode" id="postcode">

                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" id="phone">

                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email">

                <input type="submit" value="Save">
                
            </form>
            @endif
        </article>

        <article>
            <h2>Socials</h2>

            @if(isset($socials))
                @foreach($socials as $social)
                <ul>
                    <li><i class="fa-brands fa-square-facebook"></i> Facebook:</li>
                    <li>{{$social->facebookName}}</li>

                    <li><i class="fa-brands fa-twitter"></i> Twitter:</li>
                    <li>{{$social->twitterName}}</li>
                </ul>
                <button onClick="openSecondForm()">Update Socials</button>
                @endforeach
            @else
            <form action="{{ route('createSocials') }}" method="post">
                @csrf
                @include('includes.error')

                <label for="facebookName">Facebook Name:</label>
                <input type="text" name="facebookName" id="facebookName">

                <label for="facebookLink">Facebook Link:</label>
                <input type="text" name="facebookLink" id="facebookLink">

                <label for="twitterName">Twitter Name:</label>
                <input type="text" name="twitterName" id="twitterName">

                <label for="twitterLink">Twitter Link:</label>
                <input type="text" name="twitterLink" id="twitterLink">

                <input type="submit" value="Save">
            </form>
            @endif
        </article>
    </aside>
</section>

@if(isset($details))
<div class="hiddenForm" id="hiddenForm" style="display:none;">
    <a onClick="closeForm()"><i class="fa-solid fa-xmark"></i></a> 
    <h2>Update Featured Image</h2>

    @foreach($details as $detail)
    <form action="/admin/details/{{$detail->id}}/edit" method="post" enctype="multipart/form-data">
        @csrf
        @include('includes.error')
        
            <label for="address1">Address Line 1:</label>
            <input type="text" name="address1" id="address1" value="{{$detail->address1}}">

            <label for="address2">Address Line 2:</label>
            <input type="text" name="address2" id="address2" value="{{$detail->address2}}">

            <label for="address3">Address Line 3:</label>
            <input type="text" name="address3" id="address3" value="{{$detail->address3}}">

            <label for="postcode">Postcode:</label>
            <input type="text" name="postcode" id="postcode" value="{{$detail->postcode}}">

            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" id="phone" value="{{$detail->phone}}">

            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" value="{{$detail->email}}"> 
        @endforeach

        <input type="submit" value="Update">
    </form>
</div>
@endif

@if(isset($socials))
<div class="hiddenForm" id="secondHiddenForm" style="display:none;">
    <a onClick="closeSecondForm()"><i class="fa-solid fa-xmark"></i></a> 
    <h2>Update Socials</h2>

    @foreach($socials as $social)
    <form action="/admin/socials/{{$social->id}}/edit" method="post" enctype="multipart/form-data">
        @csrf
        @include('includes.error')
        
            <label for="facebookName">Facebook Name:</label>
            <input type="text" name="facebookName" id="facebookName" value="{{$social->facebookName}}">

            <label for="facebookLink">Facebook Link:</label>
            <input type="text" name="facebookLink" id="facebookLink" value="{{$social->facebookLink}}">

            <label for="twitterName">Twitter Name:</label>
            <input type="text" name="twitterName" id="twitterName" value="{{$social->twitterName}}">

            <label for="twitterLink">Twitter Link:</label>
            <input type="text" name="twitterLink" id="twitterLink" value="{{$social->twitterLink}}">
        @endforeach

        <input type="submit" value="Update">
    </form>
</div>
@endif
@endsection