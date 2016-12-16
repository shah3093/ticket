function ajaxcall() {
    var data = new FormData(document.getElementById("frmadd"));
    var url = $("#frmadd").attr('action');
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        async: false,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
            $("#loginfrom").hide();
            $("#loader").show();
        },
        success: function (resp) {
            if (resp.trim() != 'DONE') {
                $("#errorDiv").html(resp);
            } else {
                 window.location = base_url + 'admin/home/index';
            }
        },
        complete: function () {
            $("#loginfrom").show();
            $("#loader").hide();
        }
    });

}

$("body").on('click', '#btnadd', function (e) {
    e.preventDefault();
    var check = 1;
    if (!$("#email").val()) {
        $("#password").parent().removeClass("has-error");
        $("#email").parent().addClass("has-error");
        check = 0;
    } else if (!$("#password").val()) {
        $("#email").parent().removeClass("has-error");
        $("#password").parent().addClass("has-error");
        check = 0;
    }
    if (check == 1) {
        $("#email").parent().removeClass("has-error");
        $("#password").parent().removeClass("has-error");
        ajaxcall();
    }
});