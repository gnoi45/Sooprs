
$('#addServForm').submit(function (e) {
    e.preventDefault(); // Prevent the form from submitting in the traditional way

    showLoader();
    var formData = {
        service: $('#addServForm #services_category').val(),
        profid: $('#profid').val()

    };


    $.ajax({
        type: 'POST',
        url: site_url + '/api2/public/index.php/addServForm', // Replace with your PHP file path
        data: formData,
        success: function (response) {
            $("#addServiceModal").modal("hide");



            var jsonResponse = JSON.parse(response);
            var message = jsonResponse.msg;
            var status = jsonResponse.status;

            hideLoader();

            if (status == 200) {
                $('#error_message').text(message);
                $('.toast').toast('show');
            }
            if (status == 400) {
                $('#error_message').text(message);
                $('.toast').toast('show');
            }
            // setTimeout(function () {
            location.reload();

            // }, 1000);

        }
    });
});





var circleXmarks = document.querySelectorAll(".remove-service");

function removeService(event) {

    showLoader();
    var clickedButton = event.target;
    var dataSerValue = clickedButton.dataset.servid;
    var dataPrfValue = clickedButton.dataset.prfid;
    // console.log(dataSerValue,dataPrfValue);

    $.ajax({
        url: site_url + "/api2/public/index.php/remove_professional_service",
        method: "POST",
        data: {
            dataSerValue: dataSerValue,
            dataPrfValue: dataPrfValue
        },
        success: function (response) {
            var jsonResponse = JSON.parse(response);
            var message = jsonResponse.msg;
            var status = jsonResponse.status;

            var parentSpan = clickedButton.parentElement;
            parentSpan.remove(); // Remove the whole <span> element
            hideLoader();
            if (status == 200) {
                $('#error_message').text(message);
                $('.toast').toast('show');
            }
            if (status == 400) {
                $('#error_message').text(message);
                $('.toast').toast('show');
            }
        },
        error: function (xhr, status, error) {
            // Handle error
            // console.log("Error:", error);
        }

    });
}
circleXmarks.forEach(function (button) {
    button.addEventListener("click", removeService);
});