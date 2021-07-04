@foreach ($messages ?? [] as $message)
    @php
        $user = $message->user;
    @endphp
    <div class="contact load-message" data-target="{{ route('messenger.load', [$message->id]) }}">
        <span class="online"></span>
        <img src="{{ $user->avatar_path }}">
        <div>
            <p>{{ $user->full_name }}</p>
            <span>{{ $message->last_mess }}</span>
        </div>
    </div>
@endforeach
