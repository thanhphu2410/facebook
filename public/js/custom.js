$(function() {
    var seYear = $("#year");
    var date = new Date();
    var cur = date.getFullYear();

    seYear.append('<option value=""> Year </option>');
    for (i = cur; i >= 1900; i--) {
        seYear.append('<option value="' + i + '">' + i + "</option>");
    }

    //Tháng tự động điền vào select
    var seMonth = $("#month");
    var date = new Date();

    var month = new Array();
    month[1] = "January";
    month[2] = "February";
    month[3] = "March";
    month[4] = "April";
    month[5] = "May";
    month[6] = "June";
    month[7] = "July";
    month[8] = "August";
    month[9] = "September";
    month[10] = "October";
    month[11] = "November";
    month[12] = "December";

    seMonth.append('<option value="">Month</option>');
    for (i = 12; i > 0; i--) {
        seMonth.append('<option value="' + i + '">' + month[i] + "</option>");
    }

    //Ngày tự động điền vào select
    function dayList(month, year) {
        var day = new Date(year, month, 0);
        return day.getDate();
    }

    $("#year, #month").change(function() {
        //Đoạn code lấy id không viết bằng jQuery để phù hợp với đoạn code bên dưới
        var y = document.getElementById("year");
        var m = document.getElementById("month");
        var d = document.getElementById("day");

        var year = y.options[y.selectedIndex].value;
        var month = m.options[m.selectedIndex].value;
        var day = d.options[d.selectedIndex].value;
        if (day == " ") {
            var days = year == " " || month == " " ? 31 : dayList(month, year);
            d.options.length = 0;
            d.options[d.options.length] = new Option("Day", " ");
            for (var i = 1; i <= days; i++)
                d.options[d.options.length] = new Option(i, i);
        }
    });

    $("#custom").on("change", function() {
        if ($("#custom").is(":checked")) {
            $("#select-custom").attr("style", "display: block !important");
        }
    });

    $("#male, #female").on("change", function() {
        $("#select-custom").removeAttr("style");
    });

    $(document).on("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
        }
    });

    // $("#register-btn").on("click", function() {
    //     var parent = $(this).parents("form");
    //     if (parent.find("input[name=last_name]").val().trim() == false) {
            
    //     }
    // });
});
