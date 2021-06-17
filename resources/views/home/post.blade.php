<div class="card shadow-sm my-3 posts">
    <div class="card-body p-0">
        <div class="d-flex align-items-center p-3">
            <div class="col-9 d-flex align-items-center">
                <img src="{{ $item->user->avatar_path }}" class="avatar">
                <div class="ml-3">
                    <a class="gotoprofile" href="{{ route('profile', [$item->user->id]) }}">
                        <h6>{{ $item->user->full_name }}</h6>
                    </a>
                    <span class="time_post mr-1">{{ $item->created_at->format('d-m') }}</span>
                    <i class="fas fa-globe-europe"></i>
                </div>
            </div>
            <div class="col-3 text-right">
                <button type="button" class="btn btn-light setting">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
            </div>
        </div>

        <div>
            <p class="mb-3 px-3">{{ $item->body }}</p>
            @foreach ($item->images as $image)
                <a href="{{ $image->image_path }}" data-lightbox="post_image_{{ $item->id }}">
                    <img class="post-image {{ $loop->index != 0 ? 'd-none' : '' }}" src="{{ $image->image_path }}">
                </a>
            @endforeach
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
