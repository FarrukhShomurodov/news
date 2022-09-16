@extends('layouts.app')

@section('content')

        <div class="container">
            <form action='{{ route('login.admin.store') }}' method="POST">
                @csrf
                <div class="row">
                    <div class="col d-flex justify-content-around align-items-center">
                        <b>Title:</b>
                        <input type="text" class="form-control m-1" name='title'>
                    </div>
                </div>

                <div class="col d-flex justify-content-around align-items-center mt-2">
                    <b>Category:</b>
                    <select class="category_tag form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>

                    <b class="ml-3">Tag:</b>
                    <select class="category_tag form-control" multiple="multiple" name="tags[]">
                        @foreach($tags as $tag)

                            <option value="{{$tag->id}}">{{$tag->tag_name}}</option>

                        @endforeach
                    </select>
                </div>

                <div class="col mx-auto text-center mt-2">
                    <b>Description</b>
                    <textarea class="form-control" name="description" id="summernote"></textarea>
                </div>

                <div class="d-flex col justify-content-around align-items-center">
                    <button type="submit" class="login_register_add_new btn">Add new</button>
                </div>
            </form>
        </div>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.category_tag').select2({
                tags: true
            });
            $('#summernote').summernote({
                height: 400,
            });
        });
    </script>
@endsection

