<form action="{{ route('messenger.store') }}" method="post" id="new_message_form">
    @csrf
    <div class="card shadow-lg messenger-item-wrapper">
        <div class="card-body p-0">
            <div class="shadow-sm p-2">
                <div class="d-flex align-items-center justify-content-between">
                    <p>Tin nhắn mới</p>
                    <div>
                        <button class="btn btn-light" type="submit">
                            Save
                        </button>
                    </div>
                </div>
            </div>
            <div class="message p-2">
                @foreach ($users as $user)
                    <div class="contact">
                        <img src="{{ $user->avatar_path }}">
                        <div class="custom-control custom-checkbox ml-4">
                            <input type="checkbox" class="custom-control-input" id="user_{{ $user->id }}"
                                name="user_ids[]" value="{{ $user->id }}">
                            <label class="custom-control-label"
                                for="user_{{ $user->id }}">{{ $user->full_name }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</form>
