@extends('news.index')
@section('tag')
    <div class="tag d-flex flex-column small m-5">
        @foreach($post_tags as $post_tag)
            <a href="{{route('news.tagPosts', $post_tag->id)}}" class="text-dark text-decoration-none">
                {{$post_tag->tag_name}}
            </a>
        @endforeach
    </div>
@endsection
@section('posts')
    <div class="container">
        <h5>{{$post->title}}</h5>
        @php echo $post->description @endphp
    </div>
@endsection
