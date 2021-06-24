<div class="card shadow-lg messenger-item-wrapper">
    <div class="card-body p-0">
        <div class="contact shadow-sm p-2">
            <span class="online"></span>
            <img src="{{ $current_user->avatar_path }}">
            <div>
                <p>Phú</p>
            </div>
        </div>
        <div class="message p-2">
            <div class="left-message d-flex align-items-center">
                <img src="{{ $current_user->avatar_path }}">
                <p>Text message</p>
            </div>
            <div class="right-message mt-2 text-right">
                <p>Text message</p>
            </div>
        </div>
        <form class="my-2 input-form">
            <div class="d-flex align-items-end">
                <button class="btn btn-light actions-btn">
                    <img src="{{ asset('images/actions-button.png') }}" alt="">
                </button>
                {{-- <input class="form-control mr-sm-2" type="text" data-target="{{ route('get-profiles') }}"
                    placeholder="Aa" id="input_message"> --}}
                    <textarea name="" id="input_message" rows="1" placeholder="Aa"></textarea>
                <button class="btn btn-light border-0 send-btn">
                    <img src="{{ asset('images/send.svg') }}" alt="">
                </button>
            </div>
        </form>
    </div>
</div>
