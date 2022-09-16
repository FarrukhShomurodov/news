@extends('layouts.app')

@section('content')

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="">#</th>
                <th scope="">name</th>
                <th><a class="btn btn-primary" href="{{route('login.admin.categories.create')}}">Create</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th>{{$category->id}}</th>
                    <td>{{$category->category_name}}</td>
                    <th>
                        <a class="btn btn-primary" href="{{route('login.admin.categories.destroy', $category->id)}}">Delete</a>
                        <a class="btn btn-primary ml-2" href="{{route('login.admin.categories.edit', $category->id)}}">Edit</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
