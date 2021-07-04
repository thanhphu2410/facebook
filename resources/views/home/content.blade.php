<div class="mt-4 pl-2 col-6 mb-5 content">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <img src="{{ $auth->avatar_path }}" class="avatar">
                <div class="ml-3 wdut" data-toggle="modal" data-target="#new_post_modal">
                    {{ $auth->first_name }} ơi, bạn đang nghĩ gì thế?
                </div>
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

    <div id="all_posts" for="{{ implode(',', $auth->all_friends_ids()) }}">
        <input type="hidden" value="10" id="take_val">
        <input type="hidden" value="5" id="offset_val">
        @foreach ($posts as $item)
            @include('home.post')
        @endforeach
    </div>
</div>
