@php $fr_helper = fr_helper($profile->id); @endphp
<div class="profile">
    <div class="card">
        <div class="d-flex align-items-center justify-content-center cover-avatar">
            <div class="col-9 text-center">
                <div class="cover-photo">
                    <img src="{{ $profile->cover_path }}" width="100%" height="350">
                </div>
                <div class="avatar">
                    <img src="{{ $profile->avatar_path }}">
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
                        <button type="button" class="btn btn-light">Bạn bè
                            <span class="friend-count">{{ $profile->all_friends()->count() }}</span>
                        </button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-light">Ảnh</button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-light">Xem thêm <i
                                class="fas fa-caret-down"></i></button>
                    </div>
                    <div id="wrapper-btn">
                        @if ($fr_helper->areFriends())
                            <button type="button" class="btn btn-primary friend-btn">
                                <i class="fas fa-user-check"></i>
                                Bạn bè
                            </button>
                        @elseif($fr_helper->notAccepted())
                            <button type="button" class="btn btn-primary add-friend-btn" id="response-friend-btn"
                                data-toggle="dropdown">
                                <i class="fas fa-user-check"></i>
                                Phản hồi
                            </button>
                            <div class="dropdown-menu shadow-lg border-0" aria-labelledby="response-friend-btn">
                                <a class="dropdown-item" href="#"
                                    data-target="{{ route('accept-friend', [$profile->id]) }}" id="accept-friend">
                                    Xác nhận
                                </a>
                                <a class="dropdown-item" href="#"
                                    data-target="{{ route('cancel-friend', [$profile->id]) }}"
                                    id="cancel-friend-btn">
                                    Xoá lời mời
                                </a>
                            </div>
                        @elseif($fr_helper->hasAdded())
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
        @include('profile.show.tab.my-posts')
    </div>
</div>
