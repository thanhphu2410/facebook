@if (!empty($profile->phone))
    <div class="d-flex align-items-center justify-content-between">
        <div>
            <p>{{ $profile->phone }}</p>
            <p class="about_places_title">Số điện thoại</p>
        </div>
        <div class="dropdown">
            <button type="button" class="btn btn-light" data-toggle="collapse" href="#{{ $view_name }}_collapse" role="button">
                <i class="fas fa-pen"></i>
            </button>
        </div>
    </div>
@else
    <button type="button" class="btn btn-light circle-plus">
        <i class="fas fa-plus"></i>
    </button>
    <a data-toggle="collapse" href="#{{ $view_name }}_collapse" role="button">
        Thêm số điện thoại
    </a>
@endif
<div class="collapse" id="{{ $view_name }}_collapse">
    <form class="profile-update" method="post"
        action="{{ route('profile.update', [$profile->id]) }}">
        @csrf
        <input type="hidden" value="{{ $view_name }}" name="view_name">
        <div class="mt-3">
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone"
                placeholder="Nhập số điện thoại" autocomplete="off" value="{{ $profile->phone }}">
            </div>
            <button type="submit" class="btn btn-light mt-3">Lưu</button>
        </div>
    </form>
</div>