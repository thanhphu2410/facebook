<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facebook</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/facebook-favicon.ico') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body>
    <nav class="shadow-sm navbar navbar-expand-lg navbar-light bg-light header">
        <a class="navbar-brand fb-logo" href="/">
            <i class="fab fa-facebook"></i>
        </a>
        <form class="form-inline my-2 my-lg-0 seach">
            <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm trên facebook" aria-label="Search">
            <i class="fas fa-search"></i>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto center-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img src="{{ asset('images/video-marketing.svg') }}" width="26">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-store"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-users"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-store"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="d-flex align-items-center">
            <a href="{{ route('profile', [$current_user->id]) }}">
                <div class="right-side-nav">
                    <img src="{{ asset('images/avatar.png') }}" class="avatar">
                    <span>{{ $current_user->first_name }}</span>
                </div>
            </a>
            <div class="right-icon">
                <i class="fas fa-plus"></i>
            </div>
            <div class="right-icon">
                <i class="fab fa-facebook-messenger"></i>
            </div>
            <div class="right-icon">
                <i class="fas fa-bell"></i>
            </div>
            <div class="right-icon">
                <i class="fas fa-caret-down"></i>
            </div>
        </div>
    </nav>

    <div>
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/fontawesome.js') }}"></script>
</body>

</html>
