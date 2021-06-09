@extends('layouts.app')
@section('content')
    <div class="card profile">
        <div class="d-flex align-items-center justify-content-center cover-avatar">
            <div class="col-8 text-center">
                <div class="cover-photo">
                    <img src="{{ asset('images/cover-photo.jpeg') }}" width="100%" height="350">
                    <button type="button" class="btn btn-light cover-btn">
                        <i class="fas fa-camera"></i> Chỉnh sửa ảnh bìa
                    </button>
                </div>
                <div class="avatar">
                    <img src="{{ asset('images/avatar.png') }}">
                    <button type="button" class="btn btn-light avatar-btn">
                        <i class="fas fa-camera"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="text-center">
            <h2 class="mt-3 mb-2">{{ $profile->full_name }}</h2>
            <a href="#" class="add-histoy">Thêm tiểu sử</a>
        </div>
        <div class="d-flex align-items-center justify-content-center navigation">
            <div class="col-7">
                <hr>
                <div class="d-flex align-items-center justify-content-center">
                    <div>
                        <button type="button" class="btn btn-light active">Bài viết</button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-light">Giới thiệu</button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-light">Bạn bè</button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-light">Ảnh</button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-light">Xem thêm <i class="fas fa-caret-down"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
