$(document).ready(function () {
    $("#submit_btn").click(function () {
        console.log("clicked");
        var form = $('#contact_frm')[0];
        var data = new FormData(form);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            //url: "submition/topgear_contact_action.php",
            url: "contact_frm_action.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 6000000,
            beforeSend: function () {
                // Show image container
                $("#submition_loader").show();
            },
            success: function (data) {
                $(document).ajaxStop(function () {
                    $(".show_success_msg").html(data);
                });
                // alert (data);
            },
            complete: function (data) {
                // Hide image container
                $("#submition_loader").hide();
            }
        });
    });
});