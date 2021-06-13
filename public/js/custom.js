function sendAjax(url, selector = ".app") {
    let result;
    $.ajax({
        async: false,
        url: url,
        type: "GET",
        success: function(data) {
            $(selector).html(data.html);
            result = data;
        },
        error: function(e) {
            if (e.status == 401) {
                window.location.href = "/login";
            }
        }
    });
    return result;
}

function changeActive(selector_1, selector_2) {
    selector_1.removeClass("active");
    selector_2.addClass("active");
}

function ajaxSetup() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
}

$(document).on("click", ".gotohome", function(e) {
    e.preventDefault();
    sendAjax("/");
    changeActive($(".main-nav"), $("#home-nav"));
});

$(document).on("click", ".gotoprofile", function(e) {
    e.preventDefault();
    let result = sendAjax($(this).attr("href"));
    if (result.isMyProfile) {
        changeActive($(".main-nav"), $("#profile-nav"));
    }
});

$(document).on("click", "#introduction-tab", function(e) {
    e.preventDefault();
    sendAjax($(this).attr("data-target"), ".tab");
    changeActive($(".navigation button"), $(this));
});

$(document).on("click", "#myposts-tab", function(e) {
    e.preventDefault();
    sendAjax($(this).attr("data-target"), ".tab");
    changeActive($(".navigation button"), $(this));
});

$(document).on("submit", ".profile-update", function(e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    let wrapper = $(this).parents(".form-wrapper");
    ajaxSetup();
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: formData,
        success: function(data) {
            wrapper.html(data.html);
        },
        cache: false,
        processData: false,
        contentType: false
    });
});

$(document).on("change", "#provinces", function(e) {
    e.preventDefault();
    $.ajax({
        url: $(this).attr("data-target") + "?province_id=" + $(this).val(),
        type: "GET",
        success: function(data) {
            $("#districts").empty().append(
                "<option value='' selected>Chọn quận/huyện</option>"
            );
            $("#wards").empty().append(
                "<option value='' selected>Chọn phường/xã</option>"
            );
            data.forEach(function(item) {
                $("#districts").append(
                    "<option value='" + item.id + "'>" + item.name + "</option>"
                );
            });
        }
    });
});

$(document).on("change", "#districts", function(e) {
    e.preventDefault();
    $.ajax({
        url: $(this).attr("data-target") + "?district_id=" + $(this).val(),
        type: "GET",
        success: function(data) {
            $("#wards").empty().append(
                "<option value='' selected>Chọn phường/xã</option>"
            );
            data.forEach(function(item) {
                $("#wards").append(
                    "<option value='" + item.id + "'>" + item.name + "</option>"
                );
            });
        }
    });
});
