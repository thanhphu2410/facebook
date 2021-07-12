<div class="col-3 pl-3 mt-4 right-sidebar">
    <div class="d-flex align-items-center top">
        <div class="col-6">
            <span>Người liên hệ</span>
        </div>
        <div class="col-6 text-right">
            <button type="button" class="btn btn-light mr-1">
                <i class="fas fa-video"></i>
            </button>

            <button type="button" class="btn btn-light mr-1">
                <i class="fas fa-search"></i>
            </button>

            <button type="button" class="btn btn-light">
                <i class="fas fa-ellipsis-h"></i>
            </button>
        </div>
    </div>
    <div class="mt-2">
        @foreach ($friends as $friend)
            @php
                $user = $friend->from != $auth->id ? $friend->from_user : $friend->to_user;
            @endphp
            <div class="contact">
                @if ($user->isOnline())
                    <span class="online"></span>
                @endif
                <img src="{{ $user->avatar_path }}">
                <span>{{ $user->full_name }}</span>
            </div>
        @endforeach
    </div>
</div>
