@extends('layouts.app')

@section('title', 'Mega EV - Case Studies')

@section('content')
<h1>Case Studies</h1>
<p>Lorem ipsum dolor sit amet. Et voluptatum magnam et quos quisquam  neque 
explicabo et quasi unde in exercitationem veniam et exercitationem maxime ut 
quis repellat. Sed perspiciatis laborum id quae dolores qui possimus minus 
aut laudantium illo quo sequi alias. </p>

<section class="studies">
    @foreach($studies as $study)
    @if($study->draft === 1)
        <div>
            @foreach($featuredImages as $featuredImage)
            @if($featuredImage->study_id === $study->id)
            <a href="/caseStudies/{{$study->id}}"><img src="/uploads/images/{{$featuredImage->image->file}}" alt="{{$featuredImage->image->description}}"></a>
            @endif
            @endforeach
            <h2><a href="/caseStudies/{{$study->id}}">{{$study->name}}</a></h2>
        </div>
    @endif
    @endforeach
</section>
@endsection