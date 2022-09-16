<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="{{ url('./css/style.css') }}" rel="stylesheet">
</head>
<body>

    <nav class="nav justify-content-around align-items-center m-2">
        <a class="text-decoration-none text-dark" href="/"><h2>MostByte news</h2></a>
        <button type="button" class="btn btn-primary">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('login.admin.index')}}" class="text-white text-decoration-none">admin</a>
                @else
                    <a href="{{ route('login') }}" class="text-white text-decoration-none">Log in</a>
                @endif
            @endif
        </button>
    </nav>
    <ul class="text-center small p-0 newsCategory">
        @foreach($categories as $category)
            <li><a href="{{route('news.posts',$category->id)}}" class="text-dark text-decoration-none">{{$category->category_name}}</a></li>
        @endforeach
    </ul>
    <div class="py-4 d-flex">
        @yield('tag')
        @yield('posts')
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
