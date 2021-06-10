function sendAjax(url, selector = ".app") {
    let result;
    $.ajax({
        async: false,
        url: url,
        type: "get",
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

$(document).on("submit", "#about_places_1", function(e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: formData,
        success: function(data) {
            
        },
        cache: false,
        processData: false,
        contentType: false
    });
});
