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
                </div>
            </div>
        </div>
    </div>

    <div class="tab">
        @include('profile.tab.my-posts')
    </div>
</div>