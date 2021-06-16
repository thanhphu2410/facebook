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
                    <button type="button" class="btn btn-light circle-plus">
                        <i class="fas fa-plus"></i>
                    </button>
                    <a data-toggle="collapse" href="#about_overview_1" role="button">Thêm nơi làm việc</a>
                    <div class="collapse" id="about_overview_1">
                        <div class="card card-body">
                            Some placeholder content for the collapse component. This panel is hidden by default but
                            revealed when the user activates the relevant trigger.
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <button type="button" class="btn btn-light circle-plus">
                        <i class="fas fa-plus"></i>
                    </button>
                    <a href="#">Thêm trường trung học</a>
                </div>
                <div class="mb-4">
                    <button type="button" class="btn btn-light circle-plus">
                        <i class="fas fa-plus"></i>
                    </button>
                    <a href="#">Thêm trường cao đẳng/đại học</a>
                </div>
                <div class="mb-4">
                    <button type="button" class="btn btn-light circle-plus">
                        <i class="fas fa-plus"></i>
                    </button>
                    <a href="#">Thêm tỉnh/thành phố hiện tại</a>
                </div>
                <div class="mb-4">
                    <button type="button" class="btn btn-light circle-plus">
                        <i class="fas fa-plus"></i>
                    </button>
                    <a href="#">Thêm quê quán</a>
                </div>
                <div class="mb-4">
                    <button type="button" class="btn btn-light circle-plus">
                        <i class="fas fa-plus"></i>
                    </button>
                    <a href="#">Thêm tình trạng mối quan hệ</a>
                </div>
            </div>

            <div class="tab-pane fade" id="about_work_and_education" role="tabpanel">
                <h1>Hello</h1>
            </div>

            <div class="tab-pane fade" id="about_places" role="tabpanel">
                <div class="mb-4">
                    <h5 class="mb-3">Nơi từng sống</h5>
                    <div class="mb-4 form-wrapper">
                        @include('profile.edit.form.about-places.current-address')
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="about_contact_and_basic_info" role="tabpanel">
                <div class="mb-4">
                    <h5 class="mb-3">Thông tin liên hệ</h5>
                    <div class="mb-4 form-wrapper">
                        @include('profile.edit.form.about-contact-and-basic-info.phone-number')
                    </div>
                    <div class="mb-4">
                        @include('profile.edit.form.about-contact-and-basic-info.email')
                    </div>
                </div>

                <div class="mb-4">
                    <h5 class="mb-3">Thông tin cơ bản</h5>
                    <div class="mb-4 form-wrapper">
                        @include('profile.edit.form.about-contact-and-basic-info.gender')
                    </div>
                    <div class="mb-4">
                        @include('profile.edit.form.about-contact-and-basic-info.date-of-birth')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
