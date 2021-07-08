@foreach ($messages ?? [] as $message)
    @php
        $user = $message->chat_users[0]->user;
        $title = $message->title ? $message->title : $user->full_name;
    @endphp
    <div class="contact load-message" data-target="{{ route('messenger.load', [$message->id]) }}">
        <span class="online"></span>
        <img src="{{ $user->avatar_path }}">
        <div>
            <p>{{ $title }}</p>
            @if ($message->last_mess)
                <span>{{ $message->last_mess }} · {{ $message->updated_at->format('m-d') }}</span>
            @else
                <span></span>
            @endif
        </div>
    </div>
@endforeach
