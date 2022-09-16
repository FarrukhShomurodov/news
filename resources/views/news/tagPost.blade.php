@extends('news.index')
@section('tag')
    <div class="tag d-flex flex-column small m-5">
        @foreach($tags as $tag)
            <a href="{{route('news.tagPosts', $tag->id)}}" class="text-dark text-decoration-none">
                {{$tag->tag_name}}
            </a>
        @endforeach
    </div>
@endsection
@section('posts')
    <div class="container">
        @foreach($posts as $post)
            <div class="d-flex col justify-content-around">
                <div>
                    <a href="{{route('news.description', $post->id)}}" class="text-dark text-decoration-none text-center">
                        <h5> {{$post->title}}</h5>
                    </a>
                    <span>
                        {{$post->title_description}}
                    </span>
                </div>
                <img src="{{\Illuminate\Support\Facades\Storage::url($post->title_image)}}" width="600px">
            </div>
            <hr>
        @endforeach
    </div>
@endsection
