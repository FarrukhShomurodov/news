@extends('layouts.app')

@section('content')

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="">#</th>
                <th scope="">name</th>
                <th><a class="btn btn-primary" href="{{route('login.admin.tags.create')}}">Create</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <th>{{$tag->id}}</th>
                    <td>{{$tag->tag_name}}</td>
                    <th>
                        <a class="btn btn-primary" href="{{route('login.admin.tags.destroy', $tag->id)}}">Delete</a>
                        <a class="btn btn-primary ml-2" href="{{route('login.admin.tags.edit', $tag->id)}}">Edit</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
