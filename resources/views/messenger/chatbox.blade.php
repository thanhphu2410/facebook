@php
    $user = $chat->user;
@endphp
<div class="card shadow-lg messenger-item-wrapper">
    <div class="card-body p-0">
        <div class="contact shadow-sm p-2 toggle-chatbox">
            <span class="online"></span>
            <img src="{{ $user->avatar_path }}">
            <div>
                <p>{{ $user->full_name }}</p>
            </div>
        </div>
        <div class="message p-2" id="message_wrapper">
            @foreach ($chat->items as $item)
                @if ($item->user_id == auth()->id())
                    <div class="right-message mt-3 text-right">
                        <p>{{ $item->content }}</p>
                    </div>
                @else
                    <div class="left-message d-flex align-items-center mt-2">
                        <img src="{{ $user->avatar_path }}">
                        <p>{{ $item->content }}</p>
                    </div>
                @endif
            @endforeach
        </div>
        <form class="my-2 input-form" id="individual_chat_form" method="POST">
            @csrf
            <input type="hidden" value="{{ $chat->id }}" name="chat_id">
            <div class="d-flex align-items-end">
                <button class="btn btn-light actions-btn">
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
