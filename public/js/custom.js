function sendAjax(url, selector = ".app") {
    let result;
    $.ajax({
        async: false,
        url: url,
        type: "GET",
        success: function(data) {
            $(selector).html(data.html);
            result = data;
            $(window).scrollTop(0);
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

function changeAddressBar(url) {
    var obj = { Page: "Facebook", Url: url };
    history.pushState(obj, obj.Page, obj.Url);
}

$(document).on("click", ".gotohome", function(e) {
    e.preventDefault();
    sendAjax("/");
    changeActive($(".main-nav"), $("#home-nav"));
    changeAddressBar("/");
});

$(document).on("click", ".gotoprofile", function(e) {
    e.preventDefault();
    let result = sendAjax($(this).attr("href"));
    if (result.isMyProfile) {
        changeActive($(".main-nav"), $("#profile-nav"));
    }
    changeAddressBar($(this).attr("href"));
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

$(document).on("click", "#add-friend-btn", function(e) {
    e.preventDefault();
    $.ajax({
        url: $(this).attr("data-target"),
        type: "GET",
        success: function(data) {
            $("#wrapper-btn")
                .empty()
                .append(
                    '<button type="button" class="btn btn-primary cancel-friend-btn" id="cancel-friend-btn" data-target="' +
                        data.url +
                        '">' +
                        '<i class="fas fa-user-times"></i> ' +
                        "Huỷ bạn bè" +
                        "</button>"
                );
        }
    });
});

$(document).on("click", "#cancel-friend-btn", function(e) {
    e.preventDefault();
    $.ajax({
        url: $(this).attr("data-target"),
        type: "GET",
        success: function(data) {
            $("#wrapper-btn")
                .empty()
                .append(
                    '<button type="button" class="btn btn-primary add-friend-btn" id="add-friend-btn" data-target="' +
                        data.url +
                        '">' +
                        '<i class="fas fa-user-plus"></i> ' +
                        "Thêm bạn bè" +
                        "</button>"
                );
        }
    });
});

$(document).on("click", "#accept-friend", function(e) {
    e.preventDefault();
    $.ajax({
        url: $(this).attr("data-target"),
        type: "GET",
        success: function(data) {
            $("#wrapper-btn")
                .empty()
                .append(
                    '<button type="button" class="btn btn-primary friend-btn">' +
                        '<i class="fas fa-user-check"></i>' +
                        " Bạn bè" +
                        "</button>"
                );
        }
    });
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
            $("#districts")
                .empty()
                .append("<option value='' selected>Chọn quận/huyện</option>");
            $("#wards")
                .empty()
                .append("<option value='' selected>Chọn phường/xã</option>");
            data.forEach(function(item) {
                $("#districts").append(
                    "<option value='" +
                        item.id +
                        "'>" +
                        item.prefix +
                        " " +
                        item.name +
                        "</option>"
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
            $("#wards")
                .empty()
                .append("<option value='' selected>Chọn phường/xã</option>");
            data.forEach(function(item) {
                $("#wards").append(
                    "<option value='" +
                        item.id +
                        "'>" +
                        item.prefix +
                        " " +
                        item.name +
                        "</option>"
                );
            });
        }
    });
});

$(document).on("click", "#avatar-btn", function(e) {
    e.preventDefault();
    $("#avatar-input").click();
});

$(document).on("change", "#avatar-input", function(e) {
    e.preventDefault();
    var file = $("#avatar-input").get(0).files[0];
    if (file) {
        var formData = new FormData($(this).parent("form")[0]);
        ajaxSetup();
        $.ajax({
            url: $(this)
                .parent("form")
                .attr("action"),
            type: "POST",
            data: formData,
            success: function(data) {},
            cache: false,
            processData: false,
            contentType: false
        });

        // show preview image
        var reader = new FileReader();
        reader.onload = function() {
            $("#avatar-image").attr("src", reader.result);
        };
        reader.readAsDataURL(file);
    }
});

$(document).on("click", "#cover-btn", function(e) {
    e.preventDefault();
    $("#cover-input").click();
});

$(document).on("change", "#cover-input", function(e) {
    e.preventDefault();
    var file = $("#cover-input").get(0).files[0];
    if (file) {
        var formData = new FormData($(this).parent("form")[0]);
        ajaxSetup();
        $.ajax({
            url: $(this)
                .parent("form")
                .attr("action"),
            type: "POST",
            data: formData,
            success: function(data) {},
            cache: false,
            processData: false,
            contentType: false
        });

        // show preview image
        var reader = new FileReader();
        reader.onload = function() {
            $("#cover-image").attr("src", reader.result);
        };
        reader.readAsDataURL(file);
    }
});

$("textarea").on("input", function() {
    this.style.height = "auto";
    if (this.scrollHeight > 70) this.style.fontSize = "16px";

    if (this.scrollHeight < 250) {
        this.style.height = this.scrollHeight + "px";
    } else {
        this.style.height = "170px";
    }
});

$(document).on("click", "#image-path-icon", function(e) {
    e.preventDefault();
    console.log("hihi");
    $("#image-path-input").click();
});

$(document).on("change", "#image-path-input", function(e) {
    e.preventDefault();
    var files = $("#image-path-input").get(0).files;
    $("#body-images")
        .empty()
        .css("height", "auto")
        .append('<i class="fas fa-times-circle"></i>');
    for (i = 0; i < files.length; i++) {
        var reader = new FileReader();
        reader.onload = function(event) {
            $("#body-images").append(
                '<img class="mt-1" src="' +
                    event.target.result +
                    '" width="100%" height="250">'
            );
        };
        $("#body-images")
            .css("height", "190px")
            .css("overflow-y", "scroll");
        reader.readAsDataURL(files[i]);
    }
});

$(document).on("click", "#body-images i", function(e) {
    $("#body-images")
        .empty()
        .css("height", "auto");
});

$(document).on("submit", "#post_form", function(e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    ajaxSetup();
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: formData,
        success: function(data) {
            $("#new_post_modal").modal("hide");
            $("#new_post_modal textarea").val("");
            $("#image-path-input").val("");
            $("#body-images")
                .empty()
                .css("height", "auto");
            $("#all_posts").prepend(data.html);
        },
        cache: false,
        processData: false,
        contentType: false
    });
});

$("#new_post_modal").on("shown.bs.modal", function() {
    $(this)
        .find('textarea[name="body"]')
        .focus();
});

$(document).on("focus", "#search-profile-input", function(e) {
    e.preventDefault();
    $(this)
        .siblings(".search-profile")
        .css("display", "block");
    $("#search-icon").css("display", "none");
});

$(document).on(
    "click",
    ".app, .gotoprofile, #navContent, #exit-search-icon",
    function() {
        $(".search-profile").css("display", "none");
        $("#search-profile-input").val("");
        $("#search-icon").css("display", "block");
    }
);

$(document).on("keyup", "#search-profile-input", function(e) {
    e.preventDefault();
    $.ajax({
        url: $(this).attr("data-target") + "?name=" + $(this).val(),
        type: "GET",
        success: function(data) {
            $("#search-list-wrapper").html(data.html);
        }
    });
});

$(window).on("scroll", function(e) {
    e.preventDefault();
    if ($(window).scrollTop() == $(document).height() - $(window).height()) {
        let take = parseInt($("#take_val").val());
        let offset = parseInt($("#offset_val").val());
        let forWho = $("#all_posts").attr("data-target");
        console.log(forWho);
        $.ajax({
            url: "/load-more-posts?take=" + take + "&offset=" + offset + "&for=" + forWho,
            type: "GET",
            success: function(data) {
                $("#take_val").val(take + 10);
                $("#offset_val").val(offset + 10);
                $("#all_posts").append(data.html);
            }
        });
    }
});

$(document).on("click", ".unlike", function(e) {
    e.preventDefault();
    let that = $(this);
    ajaxSetup();
    $.ajax({
        url: "/like/" + $(this).attr("data-id"),
        type: "POST",
        data: {},
        success: function(data) {
            that.addClass("like");
            that.removeClass("unlike");
            that.closest(".reaction")
                .find("#like_counter")
                .text(data.likes);
        },
        cache: false,
        processData: false,
        contentType: false
    });
});

$(document).on("click", ".like", function(e) {
    e.preventDefault();
    let that = $(this);
    ajaxSetup();
    $.ajax({
        url: "/unlike/" + $(this).attr("data-id"),
        type: "POST",
        data: {},
        success: function(data) {
            that.addClass("unlike");
            that.removeClass("like");
            that.closest(".reaction")
                .find("#like_counter")
                .text(data.likes);
        },
        cache: false,
        processData: false,
        contentType: false
    });
});
