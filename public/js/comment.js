$(document).on("click", ".comment-input-image-btn", function() {
    $(this)
        .siblings(".comment-input-image")
        .click();
});

$(document).on("change", ".comment-input-image", function() {
    var formData = new FormData($(this).closest("form")[0]);
    let wrapper = $(this)
        .closest(".comments-wrapper")
        .find(".list-comment-wrapper");
    let that = $(this);
    ajaxSetup();
    $.ajax({
        url: $(this)
            .closest("form")
            .attr("action"),
        type: "POST",
        data: formData,
        success: function(data) {
            that.closest("form")
                .find(".comment-input")
                .val("");
            that.val("");
            wrapper.append(data.html);
        },
        cache: false,
        processData: false,
        contentType: false
    });
});

$(document).on("keyup", ".comment-input", function(e) {
    e.preventDefault();
    var formData = new FormData($(this).closest("form")[0]);
    let wrapper = $(this)
        .closest(".comments-wrapper")
        .find(".list-comment-wrapper");
    let body = $(this)
        .val()
        .trim();
    if (e.keyCode === 13) {
        e.preventDefault();
        $(this).val("");
        if (body == false) {
            return false;
        }

        ajaxSetup();
        $.ajax({
            url: $(this)
                .closest("form")
                .attr("action"),
            type: "POST",
            data: formData,
            success: function(data) {
                wrapper.append(data.html);
            },
            cache: false,
            processData: false,
            contentType: false
        });
        return false;
    }
});
