var current_url = base_url + "admin/seats/listing";

$(function () {

    load_data(current_url);

    $("body").on("click", "#addform", function (e) {
        e.preventDefault();
        $("#listing").html(" ");
        $("#loadergif").show();
        $.post(base_url + "admin/seats/formview", {}, function (result) {
            $("#listing").html(" ");
            $("#loadergif").hide();
            $("#addform").hide();
            $("#contentform").html(result);
        });
    });

    $("body").on("click", "#cancel", function (e) {
        e.preventDefault();
        $("#addform").show();
        load_data(current_url);
    });

    $("body").on("click", "#submitform", function (e) {
        e.preventDefault();
        var check = 0;
        $(".required").each(function () {
            if (!$(this).val()) {
                $(this).parent().addClass("has-error");
                check = 1;
            } else {
                $(this).parent().removeClass("has-error");
            }
        });
        if (check == 0) {
            var data = new FormData(document.getElementById("frmAdd"));
            var url = $("#frmAdd").attr('action');
            datainsertdb(data, url);
        }
    });

    $("body").on("click", ".edit", function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        $("#listing").html(" ");
        $("#loadergif").show();
        $.post(base_url + "admin/seats/formview/" + id, {}, function (result) {
            $("#listing").html(" ");
            $("#loadergif").hide();
            $("#addform").hide();
            $("#contentform").html(result);
        });
    });

    $("body").on("click", ".delete", function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: true
        },
                function () {
                    $.post(base_url + "admin/seats/delete/" + id, {}, function () {
                        load_data(current_url);
                    });
                });
    });


});