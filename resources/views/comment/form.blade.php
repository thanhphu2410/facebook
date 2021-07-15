<div class="d-flex align-items-center p-2">
    <img src="{{ $auth->avatar_path }}" class="avatar">
    <form action="{{ route('comments.store') }}" method="post" class="comment-form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <input type="hidden" name="user_id" value="{{ $auth->id }}">
        <div class="d-flex align-items-center textarea ml-2">
            <textarea name="body" placeholder="Viết bình luận..." class="comment-input"></textarea>
            <div>
                <input type="file" name="image_path" accept="image/*" class="d-none comment-input-image">
                <button type="button" class="btn comment-input-image-btn">
                    <i class="fas fa-camera"></i>
                </button>
            </div>
        </div>
    </form>
</div>
