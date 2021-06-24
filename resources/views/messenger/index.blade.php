<div class="card messenger-list-wrapper shadow-lg">
    <div class="card-body p-3">
        <h4 class="card-title">Messenger</h4>
        <form class="form-inline my-2 my-lg-0 search">
            <input class="form-control mr-sm-2" type="search" data-target="{{ route('get-profiles') }}"
                placeholder="Tìm kiếm trên messenger" aria-label="Search">
            <i class="fas fa-search" id="search-icon"></i>
        </form>
        <div class="mt-2">
            @foreach ($messages as $message)
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
        </div>
    </div>
</div>
