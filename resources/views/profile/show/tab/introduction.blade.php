<div class="row align-items-stretch justify-content-center my-3 introduction-tab">
    <div class="col-3 card py-2 px-3 navigation">
        <h4>Giới thiệu</h4>
        <div class="nav flex-column nav-pills mt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" data-toggle="pill" href="#about_overview" role="tab" aria-selected="true">
                Tổng quan
            </a>
            <a class="nav-link" data-toggle="pill" href="#about_work_and_education" role="tab" aria-selected="false">
                Công việc và học vấn
            </a>
            <a class="nav-link" data-toggle="pill" href="#about_places" role="tab" aria-selected="false">
                Nơi từng sống
            </a>
            <a class="nav-link" data-toggle="pill" href="#about_contact_and_basic_info" role="tab"
                aria-selected="false">
                Thông tin liên hệ cơ bản
            </a>
        </div>
    </div>
    <div class="col-5 card p-3">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="about_overview" role="tabpanel">
                <div class="mb-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p>{{ empty($profile->full_address) ? 'Không có gì để hiển thị' : $profile->full_address }}</p>
                            <p class="about_places_title">Nơi làm việc</p>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p>{{ empty($profile->full_address) ? 'Không có gì để hiển thị' : $profile->full_address }}</p>
                            <p class="about_places_title">Học vấn</p>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p>{{ empty($profile->full_address) ? 'Không có gì để hiển thị' : $profile->full_address }}</p>
                            <p class="about_places_title">Địa chỉ hiện tại</p>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p>{{ empty($profile->full_address) ? 'Không có gì để hiển thị' : $profile->full_address }}</p>
                            <p class="about_places_title">Mối quan hệ</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="about_work_and_education" role="tabpanel">
                <h1>Hello</h1>
            </div>

            <div class="tab-pane fade" id="about_places" role="tabpanel">
                <div class="mb-4">
                    <h5 class="mb-3">Nơi từng sống</h5>
                    <div class="mb-4 form-wrapper">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p>{{ empty($profile->full_address) ? 'Không có gì để hiển thị' : $profile->full_address }}</p>
                                <p class="about_places_title">Địa chỉ hiện tại</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="about_contact_and_basic_info" role="tabpanel">
                <div class="mb-4">
                    <h5 class="mb-3">Thông tin liên hệ</h5>
                    <div class="mb-4 form-wrapper">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p>{{ empty($profile->phone) ? 'Không có gì để hiển thị' : $profile->phone }}</p>
                                <p class="about_places_title">Số điện thoại</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p>{{ $profile->email }}</p>
                                <p class="about_places_title">Email</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h5 class="mb-3">Thông tin cơ bản</h5>
                    <div class="mb-4 form-wrapper">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p>{{ empty($profile->gender) ? 'Không có gì để hiển thị' : $profile->gender }}</p>
                                <p class="about_places_title">Giới tính</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p>{{ $profile->date_of_birth }}</p>
                                <p class="about_places_title">Ngày sinh</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
