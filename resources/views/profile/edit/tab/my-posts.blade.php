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
                    <img src="https://scontent.fhan2-2.fna.fbcdn.net/v/t31.18172-8/22047972_734867140057787_4771538064359262849_o.jpg?_nc_cat=111&ccb=1-3&_nc_sid=8bfeb9&_nc_ohc=E5BP5W-P4zMAX8s0mp-&_nc_ht=scontent.fhan2-2.fna&oh=cc6039067e1efcc8a652cd0c27aa4f1f&oe=60E88119"
                        alt="">
                    <img src="https://scontent.fhan2-2.fna.fbcdn.net/v/t31.18172-8/22047972_734867140057787_4771538064359262849_o.jpg?_nc_cat=111&ccb=1-3&_nc_sid=8bfeb9&_nc_ohc=E5BP5W-P4zMAX8s0mp-&_nc_ht=scontent.fhan2-2.fna&oh=cc6039067e1efcc8a652cd0c27aa4f1f&oe=60E88119"
                        alt="">
                    <img src="https://scontent.fhan2-2.fna.fbcdn.net/v/t31.18172-8/22047972_734867140057787_4771538064359262849_o.jpg?_nc_cat=111&ccb=1-3&_nc_sid=8bfeb9&_nc_ohc=E5BP5W-P4zMAX8s0mp-&_nc_ht=scontent.fhan2-2.fna&oh=cc6039067e1efcc8a652cd0c27aa4f1f&oe=60E88119"
                        alt="">
                    <img src="https://scontent.fhan2-2.fna.fbcdn.net/v/t31.18172-8/22047972_734867140057787_4771538064359262849_o.jpg?_nc_cat=111&ccb=1-3&_nc_sid=8bfeb9&_nc_ohc=E5BP5W-P4zMAX8s0mp-&_nc_ht=scontent.fhan2-2.fna&oh=cc6039067e1efcc8a652cd0c27aa4f1f&oe=60E88119"
                        alt="">
                </div>
            </div>
        </div>
        <div class="card mt-2 shadow-sm">
            <div class="card-body p-2">
                <div class="d-flex align-items-baseline justify-content-between">
                    <div>
                        <h5>Bạn bè</h5>
                        <p class="number-of-friends">300 người bạn</p>
                    </div>
                    <button type="button" class="btn btn-light all-friends-btn">Xem tất cả</button>
                </div>
                <div class="mt-3 recent-friends row">
                    <div class="col-4 text-center mb-2">
                        <img src="{{ $profile->avatar_path }}" alt="">
                        <h6 class="mt-2">Thanh Phú</h6>
                    </div>
                    <div class="col-4 text-center">
                        <img src="{{ $profile->avatar_path }}" alt="">
                        <h6 class="mt-2">Thanh Phú</h6>
                    </div>
                    <div class="col-4 text-center">
                        <img src="{{ $profile->avatar_path }}" alt="">
                        <h6 class="mt-2">Thanh Phú</h6>
                    </div>
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
            <input type="hidden" value="10" id="take_val">
            <input type="hidden" value="5" id="offset_val">
            @foreach ($posts as $item)
                @include('home.post')
            @endforeach
        </div>
    </div>
</div>
