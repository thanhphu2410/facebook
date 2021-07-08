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

$(document).on("submit", "#new_message_form", function(e) {
    e.preventDefault();
    // store new message
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
});
