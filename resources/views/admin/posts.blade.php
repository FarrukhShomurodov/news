@extends('layouts.app')
@section('content')
    <div class="container posts">

    </div>
@endsection
@section('script')
    <script>

        $(document).ready(function () {
            console.log(post_ids)
            {{--$(".categoryId").click($(function () {--}}
            {{--    $('.post').remove()--}}
            {{--    $.ajax({--}}
            {{--        url: '/api/posts/' + {{$id}},--}}
            {{--        type: "GET",--}}
            {{--        success: function (response) {--}}
            {{--            for (let i = 0; i < response.length; i++) {--}}
            {{--                let description = response[i].description;--}}
            {{--                let titles = response[i].title;--}}
            {{--                let posts = "<div class='post'><div class='col text-center m-auto'><p>"+titles+"</p>"+description+"</div><div class='float-right'><button type='button' class='btn btn-primary'>Edit</button><button type='button' class='btn btn-primary ml-2'>Delete</button></div></div>"--}}
            {{--                $('.posts').append(posts)--}}
            {{--            }--}}
            {{--        }--}}
            {{--    })--}}
            {{--}))--}}
        })


    </script>
@endsection
