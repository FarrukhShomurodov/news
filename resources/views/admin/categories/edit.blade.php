@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{route('login.admin.categories.update', $category->id)}}" method="POST" class="d-flex justify-content-center">
            @csrf
            @method('PUT')
            <input class="form-control w-75" name="category_name" value="{{$category->category_name}}">
            <button type="submit" class="btn btn-primary ml-2">Update</button>
        </form>
    </div>

@endsection
