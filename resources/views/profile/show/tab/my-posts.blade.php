<div class="d-flex align-items-start justify-content-center mb-5 mt-3 content">
    <div class="information col-3 mr-2">
        <div class="card introduction mb-2 shadow-sm">
            <div class="card-body">
                <h4 class="card-title mb-3">Giới thiệu</h4>
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-home mr-2"></i>
                    <p>{{ empty($profile->full_address) ? 'Không có gì để hiển thị' : $profile->full_address }}</p>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    <p>{{ empty($profile->full_address) ? 'Không có gì để hiển thị' : $profile->full_address }}</p>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fas fa-heart mr-2"></i>
                    <p>{{ empty($profile->full_address) ? 'Không có gì để hiển thị' : $profile->full_address }}</p>
                </div>
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
                        <img src="{{ asset('images/avatar.png') }}" alt="">
                        <h6 class="mt-2">Thanh Phú</h6>
                    </div>
                    <div class="col-4 text-center">
                        <img src="{{ asset('images/avatar.png') }}" alt="">
                        <h6 class="mt-2">Thanh Phú</h6>
                    </div>
                    <div class="col-4 text-center">
                        <img src="{{ asset('images/avatar.png') }}" alt="">
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
                    <img src="{{ asset('images/avatar.png') }}" class="avatar">
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
        <div class="card shadow-sm my-3 posts">
            <div class="card-body p-0">
                <div class="d-flex align-items-center p-3">
                    <div class="col-9 d-flex align-items-center">
                        <img src="{{ asset('images/avatar.png') }}" class="avatar">
                        <div class="ml-3">
                            <h6>{{ $current_user->full_name }}</h6>
                            <span class="time_post mr-1">33 phút</span> <i class="fas fa-globe-europe"></i>
                        </div>
                    </div>
                    <div class="col-3 text-right">
                        <button type="button" class="btn btn-light setting">
                            <i class="fas fa-ellipsis-h"></i>
                        </button>
                    </div>
                </div>
                <div>
                    <p class="mb-3 px-3">Làm người lớn mệt quá Ly muốn làm người giàu 😒</p>
                    <img class="post-image"
                        src="https://scontent-hkg4-2.xx.fbcdn.net/v/t1.6435-9/s1080x2048/196556840_353812382768488_6896262193822689303_n.jpg?_nc_cat=104&ccb=1-3&_nc_sid=8bfeb9&_nc_ohc=PBz24GAedfEAX_k86FB&_nc_ht=scontent-hkg4-2.xx&tp=7&oh=2c633fc519e9a9c4fbc3e4a83efcef34&oe=60E44426">
                    <div class="p-2 reaction">
                        <div class="d-flex reaction-count px-2">
                            <div class="col-6">
                                <img src="data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 16 16'%3e%3cdefs%3e%3clinearGradient id='a' x1='50%25' x2='50%25' y1='0%25' y2='100%25'%3e%3cstop offset='0%25' stop-color='%2318AFFF'/%3e%3cstop offset='100%25' stop-color='%230062DF'/%3e%3c/linearGradient%3e%3cfilter id='c' width='118.8%25' height='118.8%25' x='-9.4%25' y='-9.4%25' filterUnits='objectBoundingBox'%3e%3cfeGaussianBlur in='SourceAlpha' result='shadowBlurInner1' stdDeviation='1'/%3e%3cfeOffset dy='-1' in='shadowBlurInner1' result='shadowOffsetInner1'/%3e%3cfeComposite in='shadowOffsetInner1' in2='SourceAlpha' k2='-1' k3='1' operator='arithmetic' result='shadowInnerInner1'/%3e%3cfeColorMatrix in='shadowInnerInner1' values='0 0 0 0 0 0 0 0 0 0.299356041 0 0 0 0 0.681187726 0 0 0 0.3495684 0'/%3e%3c/filter%3e%3cpath id='b' d='M8 0a8 8 0 00-8 8 8 8 0 1016 0 8 8 0 00-8-8z'/%3e%3c/defs%3e%3cg fill='none'%3e%3cuse fill='url(%23a)' xlink:href='%23b'/%3e%3cuse fill='black' filter='url(%23c)' xlink:href='%23b'/%3e%3cpath fill='white' d='M12.162 7.338c.176.123.338.245.338.674 0 .43-.229.604-.474.725a.73.73 0 01.089.546c-.077.344-.392.611-.672.69.121.194.159.385.015.62-.185.295-.346.407-1.058.407H7.5c-.988 0-1.5-.546-1.5-1V7.665c0-1.23 1.467-2.275 1.467-3.13L7.361 3.47c-.005-.065.008-.224.058-.27.08-.079.301-.2.635-.2.218 0 .363.041.534.123.581.277.732.978.732 1.542 0 .271-.414 1.083-.47 1.364 0 0 .867-.192 1.879-.199 1.061-.006 1.749.19 1.749.842 0 .261-.219.523-.316.666zM3.6 7h.8a.6.6 0 01.6.6v3.8a.6.6 0 01-.6.6h-.8a.6.6 0 01-.6-.6V7.6a.6.6 0 01.6-.6z'/%3e%3c/g%3e%3c/svg%3e"
                                    width="18">
                                <span>18k</span>
                            </div>
                            <div class="col-6 text-right">
                                <span class="mr-2">488 bình luận</span>
                                <span>40 lượt chia sẻ</span>
                            </div>
                        </div>
                        <hr class="m-2">
                        <div class="d-flex align-items-center">
                            <div class="like col-4">
                                <i></i>
                                <span class="ml-2">Thích</span>
                            </div>

                            <div class="comment col-4">
                                <i></i>
                                <span class="ml-2">Bình luận</span>
                            </div>

                            <div class="share col-4">
                                <i></i>
                                <span class="ml-2">Chia sẻ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
