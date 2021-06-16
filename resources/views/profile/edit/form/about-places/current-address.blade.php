@php
    $provinces = App\Models\Province::all();
@endphp
@if (!empty($profile->province_id))
    <div class="d-flex align-items-center justify-content-between">
        <div>
            <p>{{ $profile->full_address }}</p>
            <p class="about_places_title">Địa chỉ hiện tại</p>
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
        Thêm địa chỉ hiện tại
    </a>
@endif

<div class="collapse" id="{{ $view_name }}_collapse">
    <form class="profile-update" method="post"
        action="{{ route('profile.update', [$profile->id]) }}">
        @csrf
        <input type="hidden" value="{{ $view_name }}" name="view_name">
        <div class="mt-3">
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address"
                placeholder="Nhập địa chỉ" autocomplete="off" value="{{ $profile->address }}">
            </div>

            <span>Chọn thành phố</span>
            <select class="custom-select my-2" name="province_id" id="provinces" data-target="{{ route('get-districts') }}">
                @if (empty($profile->province_id))
                    <option selected value="">Chọn thành phố</option>
                @endif 
                @foreach ($provinces as $item)
                    <option value="{{ $item->id }}"
                        {{ $item->id == $profile->province_id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>

            <span>Chọn quận/huyện</span>
            <select class="custom-select my-2" name="district_id" id="districts" data-target="{{ route('get-wards') }}">
                @if (empty($profile->province_id))
                    <option selected value="">Chọn quận/huyện</option>
                @else 
                    @if (empty($profile->district_id))
                        <option selected value="">Chọn quận/huyện</option>
                    @endif
                    @foreach ($profile->province->districts ?? [] as $item)
                        <option value="{{ $item->id }}"
                            {{ $item->id == $profile->district_id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                @endif
            </select>

            <span>Chọn phường/xã</span>
            <select class="custom-select my-2" name="ward_id" id="wards">
                @if (empty($profile->district_id))
                    <option selected value="">Chọn phường/xã</option>
                @else 
                    @if (empty($profile->ward_id))
                        <option selected value="">Chọn phường/xã</option>
                    @endif
                    @foreach ($profile->district->wards ?? [] as $ward)
                        <option value="{{ $ward->id }}"
                            {{ $ward->id == $profile->ward_id ? 'selected' : '' }}>
                            {{ $ward->name }}
                        </option>
                    @endforeach
                @endif
            </select>
            <button type="submit" class="btn btn-light mt-3">Lưu</button>
        </div>
    </form>
</div>