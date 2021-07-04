@foreach ($profiles ?? [] as $user)
    <div class="contact new-message" data-target="{{ route('messenger.store', [$user->id]) }}">
        <span class="online"></span>
        <img src="{{ $user->avatar_path }}">
        <div>
            <p>{{ $user->full_name }}</p>
            <span></span>
        </div>
    </div>
@endforeach
