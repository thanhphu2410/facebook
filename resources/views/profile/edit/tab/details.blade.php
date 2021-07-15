<div class="d-flex align-items-start justify-content-center mb-5 mt-3 content">
    <div class="information col-3 mr-2">
        <div class="card introduction mb-2 shadow-sm">
            <div class="card-body">
                <h4 class="card-title mb-3">Giới thiệu</h4>
                <button type="button" class="btn btn-light btn btn-block mb-3">Chỉnh sửa chi tiết</button>
                <button type="button" class="btn btn-light btn btn-block mb-3">Thêm sở thích</button>
                <button type="button" class="btn btn-light btn btn-block">Thêm nội dung đáng chú ý</button>
            </div>
        </div>
        <div class="card shadow-sm">
            <div class="card-body p-2">
                <div class="d-flex align-items-baseline justify-content-between">
                    <h5 class="card-title mb-3">Ảnh</h5>
                    <button type="button" class="btn btn-light all-images-btn">Xem tất cả</button>
                </div>
                <div class="mt-2 recent-images">
                    @foreach ($post_images as $key => $image)
                        <a href="{{ $image }}" data-lightbox="gallery_{{ $key }}">
                            <img src="{{ $image }}">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card mt-2 shadow-sm">
            <div class="card-body p-2">
                <div class="d-flex align-items-baseline justify-content-between">
                    <div>
                        <h5>Bạn bè</h5>
                        <p class="number-of-friends">{{ $profile->all_friends()->count() }} người bạn</p>
                    </div>
                    <button type="button" class="btn btn-light all-friends-btn">Xem tất cả</button>
                </div>
                <div class="mt-3 recent-friends row">
                    @foreach ($friends as $friend)
                        @php
                            $user = $friend->from != $auth->id ? $friend->from_user : $friend->to_user;
                        @endphp
                        <div class="col-4 text-center mb-2">
                            <a class="gotoprofile main-nav" href="{{ route('profile', [$user->id]) }}"
                                id="profile-nav">
                                <img src="{{ $user->avatar_path }}" alt="">
                                <h6 class="mt-2">
                                    {{ $user->full_name }}
                                </h6>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="my-posts col-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <img src="{{ $profile->avatar_path }}" class="avatar">
                    <div class="ml-3 wdut">Bạn đang nghĩ gì?</div>
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

        <div id="all_posts" for="{{ $profile->id }}">
            <input type="hidden" value="2" id="page">
            @foreach ($posts as $post)
                @include('home.post')
            @endforeach
        </div>
    </div>
</div>
