@extends('layouts.app')
@section('content')
    <input type="hidden" value="{{ $profile->id }}" id="profile_id">
    <div class="profile" id="profile">
        <div class="card">
            <div class="d-flex align-items-center justify-content-center cover-avatar">
                <div class="col-9 text-center">
                    <div class="cover-photo">
                        <form action="{{ route('profile.update', [$profile->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <img src="{{ $profile->cover_path }}" width="100%" height="350" id="cover-image">
                            <input type="file" id="cover-input" class="d-none" accept='image/*' name="cover_photo">
                            <button type="button" class="btn btn-light cover-btn" id="cover-btn">
                                <i class="fas fa-camera"></i> Chỉnh sửa ảnh bìa
                            </button>
                        </form>
                    </div>
                    <div class="avatar">
                        <form action="{{ route('profile.update', [$profile->id]) }}" method="post">
                            @csrf
                            <img src="{{ $profile->avatar_path }}" id="avatar-image">
                            <input type="file" id="avatar-input" class="d-none" accept='image/*' name="avatar">
                            <button type="button" class="btn btn-light avatar-btn" id="avatar-btn">
                                <i class="fas fa-camera"></i>
                            </button>
                        </form>
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
                            <button type="button" class="btn btn-light active" id="myposts-tab"
                                data-target="{{ route('profile.myposts-tab', [$profile->id]) }}">Bài viết</button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-light" id="introduction-tab"
                                data-target="{{ route('profile.introduction-tab', [$profile->id]) }}">Giới thiệu</button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-light">
                                Bạn bè
                                <span class="friend-count">{{ $profile->all_friends()->count() }}</span>
                            </button>
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

        <div class="tab">
            @include('profile.edit.tab.my-posts')
        </div>
    </div>
@endsection