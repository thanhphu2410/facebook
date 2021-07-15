$(document).on("input", "#input_message", function(e) {
    e.preventDefault();
    let minHeight = parseInt($(".message").css("height"));
    let oldHeight = parseInt(this.style.height || 44);
    this.style.height = "auto";

    if (this.scrollHeight > 70) this.style.fontSize = "14px";
    if (this.scrollHeight < 116) {
        this.style.height = this.scrollHeight + "px";
    } else {
        this.style.height = "116px";
    }

    let newHeight = parseInt(this.style.height);
    $(".message").css("height", minHeight - (newHeight - oldHeight) + "px");
});

/* 
    ==========================LOAD MESSAGE==========================
*/
$(document).on("click", ".load-message", function(e) {
    e.preventDefault();
    let target = $(this).attr("data-target");
    let id = target.substr(target.lastIndexOf("/") + 1);
    $("#current_chat_id").val(id);
    $.ajax({
        url: $(this).attr("data-target"),
        type: "GET",
        success: function(data) {
            $(".messenger-icon").removeClass("active");
            $(".messenger-list-wrapper").remove();
            $(".messenger-item-wrapper").remove();
            $(".app").prepend(data.html);
            $("#message_wrapper").animate(
                { scrollTop: $(document).height() },
                1000
            );
        }
    });
});

/* 
    ==========================CREATE NEW MESSAGE IN SEARCH FORM==========================
*/
$(document).on("click", ".store-message", function(e) {
    e.preventDefault();

    // remove input value in search bar
    $("#search-mess-input").val("");

    // close messenger box
    $(".messenger-icon").removeClass("active");
    $(".messenger-list-wrapper").remove();

    // load message
    $.ajax({
        url: $("#search-mess-input").attr("data-target") + "?name=",
        type: "GET",
        success: function(data) {
            $(".messenger-list-wrapper #list").empty();
            $(".messenger-list-wrapper #list").append(data.html);
        }
    });

    // store new message
    var formData = new FormData($(this).closest("form")[0]);
    ajaxSetup();
    $.ajax({
        url: $(this)
            .closest("form")
            .attr("action"),
        type: "POST",
        data: formData,
        success: function(data) {
            $(".messenger-item-wrapper").remove();
            $(".app").prepend(data.html);
            $("#message_wrapper").animate(
                { scrollTop: $(document).height() },
                1000
            );
        },
        cache: false,
        processData: false,
        contentType: false
    });
});

$(document).on("click", ".remove-chatbox", function(e) {
    e.preventDefault();
    $("#current_chat_id").val("");
    $(this)
        .closest(".messenger-item-wrapper")
        .remove();
});

/* 
    ==========================STORE NEW MESSAGE==========================
*/
$(document).on("submit", "#chat_form", function(e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    let content = $("#input_message")
        .val()
        .trim();
    if (content == false) {
        return false;
    }
    ajaxSetup();
    $.ajax({
        url: "/messenger/store-item",
        type: "POST",
        data: formData,
        success: function(data) {
            $("#input_message").css("height", 44);
            $(".message").css("height", 345);
            $("#input_message").val("");
            $("#message_wrapper").append(
                '<div class="right-message mt-3">' +
                    "<p>" +
                    data.content +
                    "</p>" +
                    "</div>"
            );
            $("#message_wrapper").animate(
                { scrollTop: $(document).height() },
                1000
            );
        },
        cache: false,
        processData: false,
        contentType: false
    });
});

$(document).on("click", ".messenger-icon", function(e) {
    e.preventDefault();
    let messenger_icon = $(this);
    if ($(".messenger-list-wrapper").length) {
        messenger_icon.removeClass("active");
        $(".messenger-list-wrapper").remove();
    } else {
        $.ajax({
            url: "/messenger",
            type: "GET",
            success: function(data) {
                $(".header").append(data.html);
                messenger_icon.addClass("active");
            }
        });
    }
});

$(document).on("keyup", "#search-mess-input", function(e) {
    e.preventDefault();
    $.ajax({
        url: $(this).attr("data-target") + "?name=" + $(this).val(),
        type: "GET",
        success: function(data) {
            $(".messenger-list-wrapper #list").empty();
            $(".messenger-list-wrapper #list").append(data.html);
        }
    });
});

$(document).on("click", "#actions-btn", function(e) {
    e.preventDefault();
    $("#add-image").click();
});

/* 
    ==========================IMAGE CHAT==========================
*/
$(document).on("change", "#add-image", function(e) {
    e.preventDefault();
    var formData = new FormData($("#chat_form")[0]);
    ajaxSetup();
    $.ajax({
        url: "/messenger/store-item",
        type: "POST",
        data: formData,
        success: function(data) {
            $("#add-image").val("");
            $("#message_wrapper").append(
                '<div class="right-message mt-3">' +
                    "<img src='" +
                    data.image +
                    "'>" +
                    "</div>"
            );
            $("#message_wrapper").animate(
                { scrollTop: $(document).height() },
                1000
            );
        },
        cache: false,
        processData: false,
        contentType: false
    });
});

/* 
    ==========================NEW MESSAGE BOX==========================
*/
$(document).on("click", ".new-message-box", function() {
    $.ajax({
        url: $(this).attr("data-target"),
        type: "GET",
        success: function(data) {
            $(".messenger-icon").removeClass("active");
            $(".messenger-list-wrapper").remove();
            $(".messenger-item-wrapper").remove();
            $(".app").prepend(data.html);
        }
    });
});

/* 
    ==========================CREATE NEW MESSAGE IN NEW MESSAGE BOX==========================
*/
$(document).on("submit", "#new_message_form", function(e) {
    e.preventDefault();
    // store new message
    let checked = $('input[name="user_ids[]"]:checked').length;
    if (checked > 0) {
        var formData = new FormData($(this)[0]);
        ajaxSetup();
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: formData,
            success: function(data) {
                $(".messenger-item-wrapper").remove();
                $(".app").prepend(data.html);
                $("#message_wrapper").animate(
                    { scrollTop: $(document).height() },
                    1000
                );
            },
            cache: false,
            processData: false,
            contentType: false
        });
    } else {
        $(".messenger-item-wrapper").remove();
    }
});
