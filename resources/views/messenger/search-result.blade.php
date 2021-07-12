@foreach ($profiles ?? [] as $user)
    <form action="{{ route('messenger.store') }}" method="post">
        @csrf
        <input type="hidden" value="{{ $user->id }}" name="user_ids[]">
        <div class="contact store-message">
            @if ($user->isOnline())
                <span class="online"></span>
            @endif
            <img src="{{ $user->avatar_path }}">
            <div>
                <p>{{ $user->full_name }}</p>
                <span></span>
            </div>
        </div>
    </form>
@endforeach
