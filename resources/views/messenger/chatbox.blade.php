@php
$user = $chat->random_user;
$title = $chat->title ? $chat->title : $user->full_name;
@endphp
<div class="card shadow-lg messenger-item-wrapper">
    <div class="card-body p-0">
        <div class="contact shadow-sm p-2 remove-chatbox">
            <span class="online"></span>
            <img src="{{ $user->avatar_path }}">
            <div>
                <p>{{ $title }}</p>
            </div>
        </div>
        <div class="message p-2" id="message_wrapper">
            @foreach ($chat->items as $item)
                @if ($item->user_id == auth()->id())
                    <div class="right-message mt-3">
                        @if ($item->image)
                            <img src="{{ $item->image->image_path }}">
                        @else
                            <p>{{ $item->content }}</p>
                        @endif
                    </div>
                @else
                    <div class="left-message d-flex align-items-center mt-2">
                        <img src="{{ $item->user->avatar_path }}">
                        @if ($item->image)
                            <img class="image ml-2" src="{{ $item->image->image_path }}">
                        @else
                            <p>{{ $item->content }}</p>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
        <form class="my-2 input-form" id="individual_chat_form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $chat->id }}" name="chat_id">
            <div class="d-flex align-items-end">
                <input type="file" id="add-image" class="d-none" name="image">
                <button class="btn btn-light actions-btn" id="actions-btn">
                    <img src="{{ asset('images/actions-button.png') }}" alt="">
                </button>
                <textarea name="content" id="input_message" rows="1" placeholder="Aa"></textarea>
                <button class="btn btn-light border-0 send-btn" type="submit">
                    <img src="{{ asset('images/send.svg') }}" alt="">
                </button>
            </div>
        </form>
    </div>
</div>
