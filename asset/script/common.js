function load_data(url) {
    $("#loadergif").show();
    $.post(url, {}, function (resp) {
        $("#listing").html(resp);
        $("#loadergif").hide();
        $("#contentform").html(" ");
    });
}


function datainsertdb(data, url) {
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
            $("#contentform").hide();
            $("#loadergif").show();
        },
        success: function (resp) {
            if (resp.trim() != 'DONE') {
                $("#errorDiv").html(resp);
                $("#loadergif").hide();
                $("#contentform").show();
            } else {
                $("#addform").show();
                $("#contentform").show();
                load_data(current_url);
            }
        }
    });

}
