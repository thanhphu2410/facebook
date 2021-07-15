<div class="comments-wrapper collapse" id="comment-wrapper-{{ $post->id }}">
    <hr class="m-2">
    @include('comment.form')

    <div class="list-comment-wrapper">
        @foreach ($post->comments as $comment)
            @include('comment.list')
        @endforeach
    </div>
</div>
