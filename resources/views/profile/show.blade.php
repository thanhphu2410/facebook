@extends('layouts.app')
@section('content')
    <div class="profile">
        <div class="card">
            <div class="d-flex align-items-center justify-content-center cover-avatar">
                <div class="col-9 text-center">
                    <div class="cover-photo">
                        <img src="{{ asset('images/cover-photo.jpeg') }}" width="100%" height="350">
                    </div>
                    <div class="avatar">
                        <img src="{{ asset('images/avatar.png') }}">
                    </div>
                </div>
            </div>
            <div class="text-center">
                <h2 class="mt-3 mb-2">{{ $profile->full_name }}</h2>
            </div>
            <div class="d-flex align-items-center justify-content-center navigation">
                <div class="col-7">
                    <hr>
                    <div class="d-flex align-items-center justify-content-center">
                        <div>
                            <button type="button" class="btn btn-light active" id="myposts-tab"
                                data-target="{{ route('profile.myposts-tab', [$profile->id]) }}">
                                Bài viết
                            </button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-light" id="introduction-tab"
                                data-target="{{ route('profile.introduction-tab', [$profile->id]) }}">
                                Giới thiệu
                            </button>
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
                        <div>
                            @if ($auth->areFriends($profile->id))
                                <button type="button" class="btn btn-primary friend-btn" id="add-friend-btn"
                                    data-target="{{ route('add-friend', [$profile->id]) }}">
                                    <i class="fas fa-user-plus"></i>
                                    Bạn bè
                                </button>
                            @elseif($auth->notAccepted($profile->id))
                                <button type="button" class="btn btn-primary add-friend-btn" id="response-friend-btn"
                                    data-toggle="dropdown">
                                    <i class="fas fa-user-check"></i>
                                    Phản hồi
                                </button>
                                <div class="dropdown-menu shadow-lg border-0" aria-labelledby="response-friend-btn">
                                    <a class="dropdown-item" href="#">Xác nhận</a>
                                    <a class="dropdown-item" href="#">Xoá lời mời</a>
                                </div>
                            @elseif($auth->hasAdded($profile->id))
                                <button type="button" class="btn btn-primary cancel-friend-btn" id="cancel-friend-btn"
                                    data-target="{{ route('cancel-friend', [$profile->id]) }}">
                                    <i class="fas fa-user-times"></i>
                                    Huỷ bạn bè
                                </button>
                            @else
                                <button type="button" class="btn btn-primary add-friend-btn" id="add-friend-btn"
                                    data-target="{{ route('add-friend', [$profile->id]) }}">
                                    <i class="fas fa-user-plus"></i>
                                    Thêm bạn bè
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab">
            @include('profile.tab.my-posts')
        </div>
    </div>
@endsection
