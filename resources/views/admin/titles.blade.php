@extends('layouts.app')
@section('content')
    <div class="container titles">

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
                $(".categoryId").click($(function () {
                    $('.title').remove()
                    $.ajax({
                        url: '/api/posts/' + {{$id}},
                        type: "GET",
                        success: function (response) {
                            for (let i = 0; i < response.length; i++) {
                                let titles = response[i].title;
                                let id = response[i].id;
                                let posts = "<div class='title col text-center m-auto'><p class='posts_id'><input type='hidden' value='"+id+"'><a href='{{route('login.admin.posts.showPosts')}}'>"+titles+"</a></p></div><hr></div>"
                                $('.titles').append(posts)
                            }
                        }
                    })
                }))
            $(document).on("click", ".posts_id", function (){
                let post_ids = $(this).children('input').val()
            })

        })


    </script>
@endsection
