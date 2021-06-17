<div class="row">
    @include('home.left-sidebar')

    @include('home.content')

    @include('home.right-sidebar')
</div>

<div class="modal fade" id="new_post_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title col-7 text-right">Tạo bài viết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('posts.store') }}" method="post" id="post_form">
                    @csrf
                    <input type="hidden" value="{{ $current_user->id }}" name="user_id">
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ $current_user->avatar_path }}" class="avatar">
                        <h6 class="ml-3">{{ $current_user->full_name }}</h6>
                    </div>
                    <div class="body-content">
                        <textarea name="body"
                            placeholder="{{ $current_user->first_name }} ơi, bạn đang nghĩ gì thế?"></textarea>
                        <div id="body-images">

                        </div>
                    </div>
                    <input type="file" id="image-path-input" class="d-none" accept='image/*' name="image_path[]"
                        multiple>
                    <div class="d-flex align-items-center justify-content-between border rounded p-3 mt-2">
                        <h6>Thêm vào bài viết</h6>
                        <div class="icons">
                            <button><i class="image-video" id="image-path-icon"></i></button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm btn-block mt-4">Đăng</button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script src="{{ asset('backend/lightbox/js/lightbox.js') }}"></script>
    <script>
        lightbox.option({
            'resizeDuration': 10,
            'wrapAround': true,
            'disableScrolling': true
        })

    </script>
@endsection
