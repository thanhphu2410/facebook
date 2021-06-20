@forelse ($profiles ?? [] as $item)
    <a class="gotoprofile" href="{{ route('profile', [$item->id]) }}">
        <div class="contact mb-0 mt-2">
            <span class="online"></span>
            <img src="{{ $item->avatar_path }}">
            <span>{{ $item->full_name }}</span>
        </div>
    </a>
@empty
    <div class="p-2">
        <p class="text-center not-found-text">Không tìm thấy người dùng nào</p>
    </div>
@endforelse
