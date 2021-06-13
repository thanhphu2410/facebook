<div class="d-flex align-items-center justify-content-between">
    <div>
        <p>{{ $profile->gender }}</p>
        <p class="about_places_title">Giới tính</p>
    </div>
    <div class="dropdown">
        <button type="button" class="btn btn-light" data-toggle="collapse" href="#{{ $view_name }}_collapse">
            <i class="fas fa-pen"></i>
        </button>
    </div>
</div>

<div class="collapse" id="{{ $view_name }}_collapse">
    <form class="profile-update" method="post"
        action="{{ route('profile.update', [$profile->id]) }}">
        @csrf
        <input type="hidden" value="{{ $view_name }}" name="view_name">
        <div class="mt-3">
            <span>Chọn giới tính</span>
            <select class="custom-select my-2" name="gender">
                <option value="Male" {{ "Male" == $profile->gender ? 'selected' : '' }}>
                    Nam
                </option>
                <option value="Female" {{ "Female" == $profile->gender ? 'selected' : '' }}>
                    Nữ
                </option>
            </select>
            <button type="submit" class="btn btn-light mt-3">Lưu</button>
        </div>
    </form>
</div>