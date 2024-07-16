$("#upload-images-btn").on('click', function () {
    showLoader();
    var form = document.getElementById('upload-images');
    var formData = new FormData(form);
    
    // Read selected files
    $.ajax({
        type: 'POST',
        url: site_url + "/api2/public/index.php/portfolioImages",  // PHP script to handle the image upload
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var newdata = JSON.parse(response);

            if(newdata.status == 200){
                hideLoader();                
                $('#error_message').text(newdata.msg);
                $('.toast').toast('show');
                location.reload();
            }else{

                // $('#output').html(newdata.msg);  // Display the response from the server
                hideLoader();                
                $('#error_message').text(newdata.msg);
                $('.toast').toast('show');
                // location.reload();
            }

        },
        error: function (error) {
            hideLoader();                
            $('#error_message').text("newdata.msg");
            $('.toast').toast('show');
        }
    });

});


// Remove portfolios 
$('.remove-portfolio').on('click', function () {
    showLoader();
    let portfolio_id = $(this).data('id');
    let clickedElement = $(this);
    $.ajax({
        url: site_url + "/api2/public/index.php/remove_portfolio",
        type: 'POST',
        data: { id: portfolio_id },
        success: function (response) {
            var showmsg = JSON.parse(response);
            if (showmsg.status == 200) {
                // $(this).closest('.text-center').empty();
                // $(this).closest('.text-center').remove();

                clickedElement.parent().parent().remove();
                hideLoader();
                $('#error_message').text(showmsg.msg);
                $('.toast').toast('show');
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX error:', error);
        },
    });
});