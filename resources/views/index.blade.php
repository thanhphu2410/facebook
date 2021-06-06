@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-3 left-sidebar p-3">
            <div class="left-item">
                <img src="{{ asset('images/avatar.jpeg') }}">
                <span class="pl-2">{{ auth()->user()->full_name }}</span>
            </div>

            <div class="left-item-icon">
                <img src="{{ asset('images/friends-icon.png') }}">
                <span>Bạn bè</span>
            </div>

            <div class="left-item-icon">
                <img src="{{ asset('images/group-icon.png') }}">
                <span>Nhóm</span>
            </div>

            <div class="left-item-icon">
                <img src="{{ asset('images/marketplace-icon.png') }}">
                <span>Marketplace</span>
            </div>

            <div class="left-item-icon">
                <img src="{{ asset('images/watch-icon.png') }}">
                <span>Watch</span>
            </div>

            <div class="left-item-icon">
                <img src="{{ asset('images/event-icon.png') }}">
                <span>Sự kiện</span>
            </div>

            <div class="left-item-icon">
                <img src="{{ asset('images/bookmark-icon.png') }}">
                <span>Đã lưu</span>
            </div>

            <div class="left-item-icon">
                <img src="{{ asset('images/messenger-icon.png') }}">
                <span>Messenger</span>
            </div>
        </div>

        <div class="mt-4 pl-2 col-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/avatar.jpeg') }}" class="avatar">
                        <div class="ml-3 wdut">{{ auth()->user()->first_name }} ơi, bạn đang nghĩ gì thế?</div>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="stream col-4">
                            <i></i>
                            <span class="ml-2">Video trực tiếp</span>
                        </div>

                        <div class="image-video col-4">
                            <i></i>
                            <span class="ml-2">Ảnh/Video</span>
                        </div>

                        <div class="activity col-4">
                            <i></i>
                            <span class="ml-2">Cảm xúc/Hoạt động</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
