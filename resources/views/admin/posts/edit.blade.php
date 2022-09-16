@extends('layouts.app')

@section('content')
    <div class="container">
        <form action='{{ route('login.admin.posts.update', $post->id) }}' enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col d-flex justify-content-around align-items-center">
                    <b>Title:</b>
                    <input type="text" class="form-control m-1" name='title' value="{{$post->title}}">
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-around align-items-center">
                    <b>Title description:</b>
                    <textarea class="w-100 form-control" name='title_description'>{{$post->title_description}}</textarea>
                </div>
            </div>
            <div class="col d-flex justify-content-around align-items-center mt-2">
                <label>Select Title img</label>
                <input type="file" name="title_image">
                <b>Category:</b>
                <select class="select2 form-control" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->category_name}}</option>
                    @endforeach
                </select>

                <b class="ml-3">Tag:</b>
                <select class="select2 form-control" multiple="multiple" name="tags[]">
                    @foreach($tags as $tag)
                        @foreach ($post->tags as $tag_id)
                            <option value="{{$tag->id}}" {{$tag->id == $tag_id->id  ? 'selected' : ''}}>{{$tag->tag_name}}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>

            <div class="col mx-auto text-center mt-2">
                <b>Description</b>
                <textarea class="form-control" name="description" id="summernote">{{$post->description}}</textarea>
            </div>

            <div class="d-flex col justify-content-around align-items-center">
                <button type="submit" class="login_register_add_new btn mt-2">Update</button>
            </div>
        </form>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 400,
            });
        });
    </script>
@endsection

