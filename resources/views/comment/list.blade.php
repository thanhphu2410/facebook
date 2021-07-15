@if ($comment->body)
    <div class="d-flex align-items-start p-2">
        <img src="{{ $comment->user->avatar_path }}" class="avatar">
        <div class="ml-2 px-3 py-2 comment-list">
            <p>
                <b>{{ $comment->user->full_name }}</b>
            </p>
            <span>{{ $comment->body }}</span>
        </div>
    </div>
    <div class="d-flex align-items-start mb-3">
        @if ($comment->image_path)
            <div class="comment-image">
                <img src="{{ $comment->image_path }}">
            </div>
        @endif
    </div>
@else
    <div class="d-flex align-items-center p-2">
        <img src="{{ $comment->user->avatar_path }}" class="avatar">
        <p class="ml-3">
            <b>{{ $comment->user->full_name }}</b>
        </p>
    </div>
    <div class="d-flex align-items-start mb-3" style="margin-top: -10px;">
        @if ($comment->image_path)
            <div class="comment-image">
                <img src="{{ $comment->image_path }}">
            </div>
        @endif
    </div>
@endif
