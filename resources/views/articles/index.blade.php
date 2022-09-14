@extends('layouts.app')

@section('title', 'Blog - Mega EV')

@section('content')
<h1>Blog</h1>
<p>Lorem ipsum dolor sit amet. Sit maiores enim ab natus ducimus ea dolor dolores ut laboriosam 
    provident est dolore nesciunt. Est voluptatem tempore ut cumque repellat et suscipit voluptas 
    est galisum tempore non necessitatibus corrupti. Sed blanditiis cumque eos consectetur mollitia 
    aut alias eos voluptatibus molestias sit iure molestiae aut necessitatibus voluptatem cum 
    necessitatibus expedita. Eum laborum omnis et dolorem voluptas quo autem minus eum ducimus 
    distinctio aut rerum dolores ab eaque minus sed perspiciatis. Quis consequatur ex commodi 
    cupiditate ut deleniti harum aut quia quibusdam.</p>

<section class="blog">
    @foreach($articles as $article)
    @if($article->draft === 1)
    <article>
        @foreach($articleImages as $articleImage)
        @if($articleImage->article->id === $article->id)
        <img src="/uploads/images/{{$articleImage->image->file}}" alt="{{$articleImage->image->description}}">
        @endif
        @endforeach
        <div>
            <h2>{{$article->name}}</h2>
            <p>Posted: {{$article->updated_at->format('d-m-Y')}}</p>
            <a href="/blog/{{$article->id}}">Read More <i class="fa-solid fa-arrow-right"></i></a>

            <section class="tagContainer">
                @foreach($articleTags as $articleTag)
                @if($articleTag->article_id === $article->id)
                    <p>{{$articleTag->tag->tag}}</p>
                @endif
                @endforeach
            </section>
            
            
        </div>
    </article>
    @endif
    @endforeach
</section>
@endsection