@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{route('login.admin.categories.store')}}" method="POST" class="d-flex justify-content-center">
            @csrf
            <input class="form-control w-75" name="category_name">
            <button type="submit" class="btn btn-primary ml-2">Save</button>
        </form>
    </div>

@endsection
