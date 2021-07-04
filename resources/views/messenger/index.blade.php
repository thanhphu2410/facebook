<div class="card messenger-list-wrapper shadow-lg">
    <div class="card-body p-3">
        <h4 class="card-title">Messenger</h4>
        <form class="form-inline my-2 my-lg-0 search">
            <input class="form-control mr-sm-2" type="search" data-target="{{ route('get-messages') }}"
                placeholder="Tìm kiếm trên messenger" aria-label="Search" id="search-mess-input" autocomplete="off">
            <i class="fas fa-search" id="search-icon"></i>
        </form>
        <div class="mt-2" id="list">
            @include('messenger.list-message')
        </div>
    </div>
</div>
