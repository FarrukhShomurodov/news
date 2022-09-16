@extends('layouts.app')

@section('content')

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="">#</th>
                <th scope="">name</th>
                <th><a class="btn btn-primary" href="{{route('login.admin.posts.create')}}">Create</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th>{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <th>
                        <a class="btn btn-primary" href="{{route('login.admin.posts.destroy', $post->id)}}">Delete</a>
                        <a class="btn btn-primary ml-2" href="{{route('login.admin.posts.edit', $post->id)}}">Edit</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
