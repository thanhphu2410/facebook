<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facebook</title>
    <link rel="shortcut icon" href="{{ asset('images/facebook-favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body>
    {{-- @if ($errors->any())
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	@endif --}}

    <div class="row justify-content-center content align-items-center">
        <div class="col-6">
            <img src="{{ asset('images/facebook-logo.svg') }}" width="300">
            <h3 class="pl-4">
                Facebook giúp bạn kết nối và chia sẻ với mọi người trong cuộc sống của bạn.
            </h3>
        </div>
        <div class="col-5">
            <div class="card shadow p-3 mb-3 bg-white login-card col-11">
                <div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg 
       @if (!isset($registering)) @error('email') is-invalid @enderror @endif" placeholder="Email hoặc số điện thoại" name="email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg 
       @if (!isset($registering)) @error('password') is-invalid @enderror @endif" placeholder="Mật khẩu" name="password"
                                value="{{ old('password') }}">
                        </div>
                        @if ($errors->any() && !isset($registering))
                            <div class="small-text-danger my-2">Thông tin không chính xác. Vui lòng nhập lại</div>
                        @endif
                        <button type="submit" class="btn btn-primary btn-lg w-100 font-weight-bold">Đăng nhập</button>
                        <div class="text-center mt-3">
                            <a href="#" class="forget-pwd-a">Quên mật khẩu?</a>
                        </div>
                        <hr>
                        <div class="text-center p-2">
                            <button type="button" class="btn btn-success btn-lg" data-toggle="modal"
                                data-target="#register-form">Tạo tài khoản mới</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-11">
                <p><a href="#">Tạo Trang</a> dành cho người nổi tiếng, nhãn hiệu hoặc doanh nghiệp.</p>
            </div>
        </div>
    </div>

    <div class="modal fade" id="register-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h3 class="modal-title" id="exampleModalLabel">Đăng ký</h3>
                        <span>Nhanh chóng và dễ dàng.</span>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="d-flex">
                            <div class="form-group w-50 pr-2">
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                    placeholder="Họ" name="last_name" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <div class="small-text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                    placeholder="Tên" name="first_name" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <div class="small-text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Số di động hoặc email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="small-text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="Mật khẩu mới" name="password">
                            @error('password')
                                <div class="small-text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                placeholder="Nhập lại mật khẩu" name="password_confirmation">
                            @error('password_confirmation')
                                <div class="small-text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex mb-2">
                            <select class="custom-select mr-2 @error('year') is-invalid @enderror" name="year" id="year"
                                size="1">
                            </select>
                            <select class="custom-select mr-2 @error('month') is-invalid @enderror" name="month"
                                id="month" size="1"></select>
                            <select class="custom-select @error('day') is-invalid @enderror" name="day" id="day"
                                size="1">
                                <option value=" " selected="selected">Day</option>
                            </select>
                        </div>
                        @error('year')
                            <div class="small-text-danger">{{ $message }}</div>
                        @enderror
                        @error('month')
                            <div class="small-text-danger">{{ $message }}</div>
                        @enderror
                        @error('day')
                            <div class="small-text-danger">{{ $message }}</div>
                        @enderror
                        <div class="dflex mt-3">
                            <div
                                class="border rounded custom-control custom-radio custom-control-inline py-2 w-30 pl-35">
                                <input type="radio" id="male" value="male" name="gender" class="custom-control-input"
                                    {{ old('gender') == 'male' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="male">Nam</label>
                            </div>
                            <div
                                class="border rounded custom-control custom-radio custom-control-inline py-2 w-30 pl-35">
                                <input type="radio" id="female" value="female" name="gender"
                                    class="custom-control-input" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="female">Nữ</label>
                            </div>
                            <div class="border rounded custom-control custom-radio custom-control-inline py-2 pl-35"
                                style="width: 149px; margin: 0">
                                <input type="radio" id="custom" name="gender" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="custom">Tuỳ chỉnh</label>
                            </div>
                        </div>
                        @error('gender')
                            <div class="small-text-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="d-none mb-3" id="select-custom">
                            <select class="custom-select" size="1">
                                <option value="" selected="selected" disabled>Chọn danh xưng</option>
                                <option value="">Cô ấy: "Chúc cô ấy sinh nhật vui vẻ!"</option>
                                <option value="">Anh ấy: "Chúc anh ấy sinh nhật vui vẻ!"</option>
                                <option value="">Họ: "Chúc họ sinh nhật vui vẻ!"</option>
                            </select>
                            <span class="small-text">
                                Danh xưng của bạn hiển thị với tất cả mọi người.
                            </span>
                            <div class="form-group mt-2">
                                <input type="password" class="form-control" placeholder="Giới tính (không bắt buộc)">
                            </div>
                        </div>
                        <span class="small-text mt-2">
                            Bằng cách nhấp vào Đăng ký, bạn đồng ý với Điều khoản,
                            Chính sách dữ liệu và Chính sách cookie của chúng tôi.
                            Bạn có thể nhận được thông báo của chúng tôi qua SMS và hủy nhận bất kỳ lúc nào.
                        </span>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success font-weight-bold">
                                Đăng ký
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
    @if ($errors->any() && isset($registering))
        <script>
            $('#register-form').modal('show')

        </script>
    @endif
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
