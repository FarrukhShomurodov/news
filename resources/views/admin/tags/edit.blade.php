@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{route('login.admin.tags.update', $tag->id)}}" method="POST" class="d-flex justify-content-center">
            @csrf
            @method('PUT')
            <input class="form-control w-75" name="tag_name" value="{{$tag->tag_name}}">
            <button type="submit" class="btn btn-primary ml-2">Update</button>
        </form>
    </div>

@endsection
