@foreach ($chats ?? [] as $chat)
    @php
        $user = $chat->random_user;
        $title = $chat->title ? $chat->title : $user->full_name;
    @endphp
    <div class="contact load-message" data-target="{{ route('messenger.load', [$chat->id]) }}">
        <span class="online"></span>
        <img src="{{ $user->avatar_path }}">
        <div>
            <p>{{ $title }}</p>
            @if ($chat->last_mess)
                <span>{{ $chat->last_mess }} · {{ $chat->updated_at->format('m-d') }}</span>
            @else
                <span></span>
            @endif
        </div>
    </div>
@endforeach
