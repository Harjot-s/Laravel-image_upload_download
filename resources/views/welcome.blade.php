<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <style>
            .download_btn{
                position: absolute;
                right: 15px;
                bottom: 0px;
            } 
            .delete_btn{
                position: absolute;
                right: 14px;
                top: 0px;
            }      
       </style>
    </head>
    <body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="container text-center py-3">
        <form action="{{ route('imageUpload') }}" method="post" enctype="multipart/form-data">
            @csrf
        <input type="file" name="image">
        <input type="submit" class="btn btn-warning">
        </form>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($data as $item)
                <div class="col md-4">
                    <div>
                        <img src="{{ asset('public/images/'.$item->name) }}" class="img-fluid shadow" alt="." height="500">

                        <form action="{{ route('image.delete', $item->id) }}">
                            <button class="btn btn-outline-danger delete_btn"> <i class="fa fa-times" aria-hidden="true"></i> </button>
                        </form>
                        
                        <form action="{{ route('image.download', $item->id) }}">
                            <button class="btn btn-info download_btn"><i class="fa fa-download" aria-hidden="true"></i> </button>
                        </form>
                    </div>
                </div>
            @endforeach
           
        </div>
    </div>

        <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div> -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
