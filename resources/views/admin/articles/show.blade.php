@extends('layouts.admin')

@section('title', $article->name)

@section('content')

<script>
    function height() {
        var x = document.getElementById("contentTextarea");
        x.style.height = x.scrollHeight + "px";
    }   
</script>

<section class="content">
    <div class="backButton">
        <a  href="/admin/articles"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>

    <article class="title">
        <h1>{{$article->name}}</h1>
        
    </article>

    <article class="center">
        <textarea readonly id="contentTextarea">{{$article->details}}</textarea>
    </article>

    <aside>
        <article>
            @if($article->draft === 0)
                <h2>This article is a draft</h2>
                <form action="{{ route('publishArticle') }}" method="post">
                    @csrf
                    @include('includes.error')
                    <input type="text" name="id" value="{{$article->id}}" style="display:none;">
                    <input type="submit" value="Publish Article">
                </form>
            @elseif($article->draft === 1)
                <h2>This article is published</h2>
                <form action="{{ route('unpublishArticle') }}" method="post">
                    @csrf
                    @include('includes.error')
                    <input type="text" name="id" value="{{$article->id}}" style="display:none;">
                    <input type="submit" value="Return to draft">
                </form>
            @endif
        </article>

        <article>
            <h2>Featured Image</h2>
            @if(isset($featuredImage))
                <img src="/uploads/images/{{$featuredImage->image->file}}" alt="{{$featuredImage->image->description}}">
                <button onClick="openForm()">Update Featured Image</button>
            @else 
                <form action="{{ route('storeArticleFeaturedImage') }}" method="post">
                    @csrf
                    @include('includes.error')

                    <label for="tag_id">Select Image: </label>
                    <select name="image_id" id="image_id">
                        <option value="">Select...</option>
                        @foreach($images as $image)
                        <option value="{{$image->id}}">{{$image->name}}</option>
                        @endforeach
                    </select>

                    <input type="text" name="article_id" id="article_id" value="{{$article->id}}" style="display:none;">

                    <input type="text" name="featured" id="featured" value=1 style="display:none;">

                    <input type="submit" value="Save">
                </form>
            @endif
        </article>

        <article>
            <h2>Article Tags</h2>
            <div class="tagContainer">
                @foreach($articleTags as $articleTag)
                    <div class="tag">
                        <p>{{$articleTag->tag->tag}}</p>
                        <a href="{{ route('deleteArticleTags', $articleTag->id) }}"><i class="fa-regular fa-circle-xmark"></i></a>
                    </div>
                @endforeach
            </div>
            <form action="{{ route('assignArticleTags') }}" method="post" class="articleTags">
                @csrf
                @include('includes.error')

                <label style="font-weight:bold;" for="tag_id">Select Tags:</label>
                <div class="tagDisplay">
                    @foreach($tags as $tag)
                    
                    <div>
                        <input type="checkbox" name="tag_id[]" id="tag_id" value="{{$tag->id}}">
                        <label for="tag_id">{{$tag->tag}}</label>
                    </div>
                    
                    @endforeach
                </div>
                <input type="text" name="article_id" id="article_id" value="{{$article->id}}" style="display:none;">

                <input type="submit" value="Save Tags">
            </form>
        </article>
    </aside>

    <article class="buttons">
        <button class="editButton"><a href="/admin/articles/{{$article->id}}/edit"><i class="fa-solid fa-pen-to-square"></i>  Edit</a></button>
        <button class="deleteButton" onClick="openSecondForm()"><i class="fa-solid fa-trash-can"></i>  Delete</button>
    </article>
</section>


@if(isset($featuredImage))
<div class="hiddenForm" id="hiddenForm" style="display:none;">
    <a onClick="closeForm()"><i class="fa-solid fa-xmark"></i></a> 
    <h2>Update Featured Image</h2>

    <form action="/admin/article/featuredImage/{{$featuredImage->id}}/edit" method="post" enctype="multipart/form-data">
        @csrf
        @include('includes.error')
        <label for="image_id">Select new logo:</label>
        <select name="image_id" id="image_id">
            <option value="">Select...</option>
            @foreach($images as $image)
            @if($image->id !== $featuredImage->image_id)
                <option value="{{$image->id}}">{{$image->name}}</option>
            @endif
            @endforeach
        </select>

        <input type="submit" value="Update">
    </form>
</div>
@endif

<div class="hiddenForm deleteForm" id="secondHiddenForm" style="display:none;">

    <h2>{{$article->name}}</h2>
    <p>Are you sure you want to delete this Article?</p>
    
    <section>
        <button onClick="closeSecondForm()" class="cancelButton">Cancel</button>
        <form action="/admin/articles/{{$article->id}}/delete" enctype="multipart/form-data">

            @csrf
            @include('includes.error')

            <input type="submit" value="Delete">
        </form>
    </section>
</div>
@endsection