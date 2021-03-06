<div class="mt-4 pl-2 col-lg-6 mb-5 content">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <img src="{{ $auth->avatar_path }}" class="avatar">
                <div class="ml-3 wdut" data-toggle="modal" data-target="#new_post_modal">
                    {{ $auth->first_name }} ơi, bạn đang nghĩ gì thế?
                </div>
            </div>
            <hr>
            <div class="d-flex align-items-center post-options">
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

    @php
        $forWho = implode(',', $auth->all_friends_ids()) . ',' . $auth->id;
    @endphp
    <div id="all_posts" for="{{ $forWho }}">
        <input type="hidden" value="2" id="page">
        @foreach ($posts as $post)
            @include('home.post')
        @endforeach
    </div>
</div>
