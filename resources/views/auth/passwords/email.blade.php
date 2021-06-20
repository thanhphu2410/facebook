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
    <link href="{{ asset('packages/lightbox/css/lightbox.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <nav class="shadow-sm navbar navbar-expand-lg navbar-light bg-light header">
        <a class="navbar-brand" href="/">
            <img src="https://cdn.worldvectorlogo.com/logos/facebook-7.svg" width="150">
        </a>
    </nav>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-6 shadow mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Tìm tài khoản của bạn</h4>
                    </div>

                    <div class="card-body">
                        <h6>Vui lòng nhập email.</h6>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group row mt-3">
                                <div class="col-12">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="Nhập email"
                                        value="{{ old('email') }}" required autofocus autocomplete="off">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Chúng tôi không thể tìm thấy email này</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 mt-3 text-right">
                                    <a href="/login">
                                        <button type="button" class="btn btn-light">
                                            Huỷ
                                        </button>
                                    </a>

                                    <button type="submit" class="btn btn-primary">
                                        Tìm kiếm
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>
    <script src="{{ asset('packages/lightbox/js/lightbox.js') }}"></script>
    <script src="{{ asset('js/fontawesome.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
