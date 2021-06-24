<div class="card messenger-list-wrapper shadow-lg">
    <div class="card-body p-3">
        <h4 class="card-title">Messenger</h4>
        <form class="form-inline my-2 my-lg-0 search">
            <input class="form-control mr-sm-2" type="search" data-target="{{ route('get-profiles') }}"
                placeholder="Tìm kiếm trên messenger" aria-label="Search">
            <i class="fas fa-search" id="search-icon"></i>
        </form>
        <div class="mt-2">
            <div class="contact">
                <span class="online"></span>
                <img src="{{ $current_user->avatar_path }}">
                <div>
                    <p>Phú</p>
                    <span>Thanh Phú</span>
                </div>
            </div>

            <div class="contact">
                <img src="{{ $current_user->avatar_path }}">
                <div>
                    <p>Phú</p>
                    <span>Thanh Phú</span>
                </div>
            </div>

            <div class="contact">
                <img src="{{ $current_user->avatar_path }}">
                <div>
                    <p>Phú</p>
                    <span>Thanh Phú</span>
                </div>
            </div>
        </div>
    </div>
</div>
