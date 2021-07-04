<div class="col-3 left-sidebar p-3">
    <a class="gotoprofile" href="{{ route('profile', [$auth->id]) }}">
        <div class="left-item gotoprofile">
            <img src="{{ $auth->avatar_path }}">
            <span class="pl-2">{{ $auth->full_name }}</span>
        </div>
    </a>

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
