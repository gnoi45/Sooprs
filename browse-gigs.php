<?php
session_start();
include_once 'function.php';
include_once 'env.php';

// if (!isset($_SESSION['id']) || !$_SESSION['id'] || $_SESSION['loggedin'] != true) {
//     $url = 'login-professional';
//     header('Location: ' . $url);
//     exit();
// }

if (isset($_SESSION['id']) &&  $_SESSION['loggedin'] == true) {
    // $url = 'login-professional';
    // header('Location: ' . $url);
    // exit();
    
    $loggedinUser = new DB_con();
    $username = $loggedinUser->fetchProf($_SESSION['id']);
    $allservices = $loggedinUser->get_all_services();
}

$title = 'Gigs';
$description = "Description";
$keywords = "key,words";
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">

<style>
    .active-setting {
        color: blue !important;
    }

    label {
        color: black !important;
        font-size: 16px !important;
        margin-bottom: 5px;

    }

    .left_side_p {
        color: grey;
        font-size: 13px;
        margin-bottom: 10px;
    }

    .form-check-label {
        /* color:grey!important; */
        font-size: 13px !important;
        font-weight: 100 !important;
    }

    input::placeholder,
    textarea::placeholder,
    select.placeholder-shown {
        font-weight: bold;
        opacity: 0.5;
        font-size: 13px;
        /* color: red; */
    }

    .choices__input::placeholder {
        font-weight: bold;
        opacity: 1;
        font-size: 13px;
        /* color: red; */
    }

    .choices__inner {
        display: inline-block;
        vertical-align: top;
        width: 100%;
        background-color: #f9f9f9;
        padding: 5.5px 7.5px 2.75px;
        border: 1px solid #ddd;
        border-radius: 5.5px;
        font-size: 14px;
        min-height: 44px;
        overflow: hidden;
    }


    .form-control {

        border: 1px solid darkgrey !important;
    }


    .choices {
        position: relative;
        overflow: hidden;
        margin-bottom: 5px;
        font-size: 16px;
    }


    .round-add-btn {
        border-radius: 10%;
        width: 100px;
        height: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px #878787 solid;
        border-style: dashed;
        overflow: hidden;
    }

    input,
    textarea,
    select {
        font-size: 13px !important;
    }


    #input_gig_price {
        padding: 10px 10px 10px 30px !important;
    }

    .form-control {

        padding: 0.5rem .75rem !important;

    }

    #success_msg_gif {
        text-align: -webkit-center;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    .gig_card {
        border-radius: 5px;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;

        padding: 8px;
    }


    .gig-card-img {
        /* background-image: url(https://images.unsplash.com/photo-1579353977828-2a4eab540b9a?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2FtcGxlfGVufDB8fDB8fHww); */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 160px;
        width: -webkit-fill-available;
    }

    .gig-card-content .heading_p {
        font-size: 13px;
        height: 65px;
    }

    .gig_owner_pic img {
        width: 30px;
        border-radius: 50%;
        height: 30px;
    }

    .gig_owner_pic p {
        font-size: 14px;
    }


    .fa-ellipsis-vertical {
        position: absolute;
        top: 5;
        right: 5;
        padding: 5px;
        cursor: pointer;
    }






    /* Styling for the popup */
    .popup {
        display: none;
        position: absolute;
        right: 30px;
        background-color: #f9f9f9;
        padding: 3px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        z-index: 1;
        border-radius: 8px;
        width: 4rem;
    }

    /* Styling for the popup options */
    .option {
        cursor: pointer;
        padding: 5px;
    }


    .search_gig {
        border-radius: 10px;
    }






    .search {
        position: relative;
        box-shadow: 0 0 40px rgba(51, 51, 51, .1);

    }

    .search input {

        height: 50px;
        text-indent: 5px;
        border: 2px solid #d6d4d4;
        border-radius: 25px;

    }


    .search input:focus {

        box-shadow: none;
        border: 2px solid blue;


    }

    .search .fa-search {

        position: absolute;
        top: 20px;
        left: 16px;

    }

    .search button {

        position: absolute;
        top: 5px;
        right: 5px;
        height: 41px;
        width: 41px;
        background: blue;
        border-radius: 25px;
        font-size: 14px;

    }

    .about-section-top::before {
        content: "";
        background-image: url(https://res.cloudinary.com/dr4iluda9/image/upload/v1709885069/photo-of-people-having-meeting-3183186_g9f3qt_w9zu76.webp);
        background-repeat: no-repeat;
        background-size: cover;
        position: absolute;
        background-position-y: center;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        opacity: 0.4;
    }


    #next_button,
    #prev_button {
        border: 1px solid darkgrey;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        background: none;
        margin-right: 10px;
        
    }



    .live_li li {
        list-style: none;
        border-bottom: 1px solid darkgrey;
        font-size: 13px;
    }
</style>


<?php include "./header2.php" ?>

<section class="about-section-top">
    <div class="container">
        <div class="bread-text">
            <p class="d-none d-md-block">Gigs</p>
            <p class="d-lg-none d-md-none" style="    font-size: 2rem!important;">Gigs</p>
        </div>
    </div>
</section>

<section class="top-sectop" style="background-color: #e0e0e0;padding: 30px 0 100px 0;">
    <div class="container-fluid">
        <!-- <h1 class="text-center mb-3" id="create_gig_heading" style="    font-weight: 600; opacity: 0.8;">Browse<span
                style="color:#0d6efd"> Gigs</span></h1> -->
        <div class="row justify-content-center">


            <div class="col-md-3">
                <div class="card h-100">
                    <div class="card-body">

                        <div class="search_bar mt-3 ">
                            <div class="container">

                                <div class="row height d-flex justify-content-center align-items-center">

                                    <div class="col-md-12 p-0">

                                        <div class="search">
                                            <input type="text" class="form-control" id="keyword" placeholder="Search..."
                                                name="keyword">
                                            <button type="submit" id="search_gig" class="btn btn-primary"><i
                                                    class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                        <!-- <div class="search">
                                            <input type="text" class="form-control" id="live_keyword"
                                                placeholder="Search..." name="live_keyword">
                                            <button type="submit" id="live_search_gig" class="btn btn-primary"><i
                                                    class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                        <div id="display"></div> -->
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="accordion mt-3" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Category
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="category-heading " id="main_cat_accordian">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="accordion mt-3" id="accordionExample2">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Sub Category
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <div class="category-heading " id="sub_cat_accordian">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 ">


                <div class="card flex-fill">

                    <div class="card-body">
                        <div class="next_prev_btns text-end ">
                            <button id="prev_button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button id="next_button"><i class="fa-solid fa-arrow-right-long"></i></button>
                            

                        </div>
                        <div class="p-2 " style="font-size:13px;">
                            Showing <span id="ShowingResultsCount">0</span> of <span id="totalResultsCount">0</span> results
                        </div>
                        <div class="row" id="gig_cards_row">

                            <!-- <div class="col-md-3">
                                <div class="gig_card">
                                    <div class="gig-card-img rounded" style="background-image:url('https://images.unsplash.com/photo-1579353977828-2a4eab540b9a?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2FtcGxlfGVufDB8fDB8fHww')">
                                    </div>
                                    <div class="gig-card-content p-2">
                                        <div class="gig_owner_pic d-flex     align-items-center">
                                            <img src="https://images.unsplash.com/photo-1579353977828-2a4eab540b9a?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2FtcGxlfGVufDB8fDB8fHww" alt="gig-owner-pic">
                                            <p class="fw-medium ms-2">Vikas sharma</p>
                                        </div>
                                        <p class="heading_p mt-2">I will create custom company logo design for your business</p>
                                        <p class="mt-2"><i class="fa-solid fa-star"></i> <strong>4.5</strong></p>

                                        <p class="mt-2">From <strong>$ 2000</strong></p>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>


                </div>



            </div>

            <!-- 
<a href=""></a> -->

        </div>

    </div>
</section>


<div class="toast" id="myToast" data-bs-autohide="true">
    <!-- <div class="toast-header">
        <strong class="me-auto"><i class="bi-bell-fill"></i>notification</strong>
        <small>1 sec ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
    </div> -->
    <div class="toast-body">
        <p id="error_message"></p>
    </div>
</div>

<div class="loader-container" id="loader">
    <div class="loader">
        <img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1705386434/sooprs-svg_bseaya.svg' style='    position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 110px;'>

    </div>
</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


<script>
    toastr.options = {
        "positionClass": "toast-top-right",
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }


</script>




<script>
    $(document).ready(function () {



        showLoader();
        var offset = 0;
        var limit = 9;

        // var formPage = new FormData();
        // formPage.append('offset', offset);
        $("#prev_button").prop('disabled', true);

        function getAllGigs(offset, limit) {
            var formPage = new FormData();
            formPage.append('offset', offset);
            formPage.append('limit', limit);

            console.log("offset ", offset);
            console.log(" limit ", limit);

            $.ajax({
                url: site_url + "/api2/public/index.php/get_all_gigs", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: formPage,                  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data)   // A function to be called if request succeeds
                {

                    var new_data = JSON.parse(data);
                    if (new_data.status == 200) {
                        console.log("has more false ", new_data.has_more);
                        if (new_data.has_more === false) {
                            $("#next_button").prop('disabled', true);
                        } else {
                            $("#next_button").prop('disabled', false);

                        }

                        console.log(new_data.msg);
                        $("#gig_cards_row").empty();

                        $("#ShowingResultsCount").text(new_data.msg.count);
                        $("#totalResultsCount").text(new_data.msg.all_total_gigs);
                        $.each(new_data.msg, function (index, service) {
                            // Creating options in main category dropdoen
                            var btnBody = '';
                            btnBody += '<div class="col-md-4 mb-3">';
                            btnBody += '<a href="<?php echo $SITE_URL ?>/buy-gig?gig_id=' + service.gig_unique_id + '"><div class="gig_card h-100">';
                            btnBody += '<div class="gig-card-img rounded position-relative" style="background-image:url(' + site_url + "/assets/files/" + service.gig_img + ')">';


                            btnBody += '</div>';
                            btnBody += '<div class="gig-card-content p-2">';
                            btnBody += '<div class="gig_owner_pic d-flex align-items-center">';
                            btnBody += '<img src="https://images.unsplash.com/photo-1579353977828-2a4eab540b9a?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2FtcGxlfGVufDB8fDB8fHww" alt="gig-owner-pic">';
                            btnBody += '<p class="fw-medium ms-2">' + service.professional.name + '</p>';
                            btnBody += '</div>';
                            btnBody += '<p class="heading_p mt-2">' + service.gig_title + '</p>';
                            btnBody += '<p class="mt-2"><i class="fa-solid fa-star"></i> <strong>4.5</strong></p>';
                            btnBody += '<p class="mt-2">From <strong>$ ' + service.gig_price + '</strong></p>';
                            btnBody += '</div>';
                            btnBody += '</div></a>';
                            btnBody += '</div>';
                            $("#gig_cards_row").append(btnBody);
                        });



                        hideLoader();

                    } else {
                        $("#ShowingResultsCount").text("0");

                    }

                }
            });
        }


        getAllGigs(offset, limit);

        $('#next_button').on('click', function () {
            // showLoader();
            offset = offset + limit;
            console.log("next_button offset ", offset);
            console.log("next_button limit ", limit);
            $("#prev_button").prop('disabled', false);

            getAllGigs(offset, limit);
        });
        $('#prev_button').on('click', function () {
            // showLoader();

            if (offset > 9) {
                offset = offset - limit;
                getAllGigs(offset, limit);

            } else {
                offset = offset - limit;
                $("#prev_button").prop('disabled', true);
                getAllGigs(offset, limit);

            }

            console.log("prev_button offset ", offset);
            console.log("prev_button limit ", limit);
        });

        // fill main categories on laod 
        $.ajax({
            url: site_url + "/api2/public/index.php/sr_services_new_main_category", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: "",                  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {

                var new_data = JSON.parse(data);
                if (new_data.status == 200) {
                    console.log(new_data.msg);
                    $.each(new_data.msg, function (index, service) {
                        // Creating options in main category dropdoen
                        var btnBody = '';
                        // var clickedClass = index === 0 ? 'clicked' : '';
                        btnBody += '<button class="mb-2 me-3 main_cat "  data-value="' + service.id + '">' + service.service_name + '</button>';
                        $("#main_cat_accordian").append(btnBody);
                    });
                    hideLoader();

                } else {

                }

            }
        });


        var form = new FormData();
        form.append('main_cat_id', 34);
        // console.log(this.value);
        // sub category on load 
        $.ajax({
            url: site_url + "/api2/public/index.php/sr_services_new_sub_category",
            type: "POST",  // Change to POST if your server expects a POST request
            data: form,  // Send the main category ID as a query parameter
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data) {
                var new_data = JSON.parse(data);
                if (new_data.status == 200) {
                    console.log(new_data.msg);
                    // Clear existing subcategory options
                    $("#sub_cat_accordian").empty();
                    // $("#sub_cat_accordian").append('<button data-value="" disabled selected>Select category</button>');

                    // Append new subcategory options
                    $.each(new_data.msg, function (index, service) {
                        var option = '<button class="sub_cat mb-2 me-2" data-value="' + service.id + '">' + service.service_name + '</button>';
                        $("#sub_cat_accordian").append(option);
                    });
                    hideLoader();
                } else {
                    // Handle error case
                    console.error('Error: ' + new_data.msg);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Handle AJAX error
                console.error('AJAX error: ' + textStatus + ', ' + errorThrown);
                hideLoader();
            }
        });



        // Use event delegation to attach the click event to dynamically generated .popupButton elements
        $(document).on('click', '.popupButton', function () {
            var popup = $(this).next('.popup');
            // Hide all other popups
            $('.popup').not(popup).hide();
            // Toggle the display of the corresponding popup
            popup.toggle();
        });

        // Close the popup when clicking outside of it
        $(window).on('click', function (event) {
            if (!$(event.target).closest('.popupButton').length && !$(event.target).closest('.popup').length) {
                $('.popup').hide();
            }
        });




        //  search code 
        $('#search_gig').click(function () {
            var keyword = $('#keyword').val();
            if (keyword !== "") {

                var keywordForm = new FormData();
                keywordForm.append('keyword', keyword);

                $.ajax({
                    url: site_url + "/api2/public/index.php/search_gig",
                    type: "POST",  // Change to POST if your server expects a POST request
                    data: keywordForm,  // Send the main category ID as a query parameter
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData: false,        // To send DOMDocument or non processed data file it is set to false
                    success: function (data) {
                        var new_data = JSON.parse(data);
                        if (new_data.status == 200) {
                            console.log(new_data.msg);
                            $("#gig_cards_row").empty("");
                            $("#ShowingResultsCount").text(new_data.msg.count);


                            $.each(new_data.msg, function (index, service) {
                                // Creating options in main category dropdoen
                                var btnBody = '';
                                btnBody += '<div class="col-md-4">';
                                btnBody += '<a href="<?php echo $SITE_URL ?>/buy-gig?gig_id=' + service.gig_unique_id + '"><div class="gig_card h-100">';
                                btnBody += '<div class="gig-card-img rounded position-relative" style="background-image:url(' + site_url + "/assets/files/" + service.gig_img + ')">';


                                btnBody += '</div>';
                                btnBody += '<div class="gig-card-content p-2">';
                                btnBody += '<div class="gig_owner_pic d-flex align-items-center">';
                                btnBody += '<img src="https://images.unsplash.com/photo-1579353977828-2a4eab540b9a?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2FtcGxlfGVufDB8fDB8fHww" alt="gig-owner-pic">';
                                btnBody += '<p class="fw-medium ms-2">' + service.professional.name + '</p>';
                                btnBody += '</div>';
                                btnBody += '<p class="heading_p mt-2">' + service.gig_title + '</p>';
                                btnBody += '<p class="mt-2"><i class="fa-solid fa-star"></i> <strong>4.5</strong></p>';
                                btnBody += '<p class="mt-2">From <strong>$ ' + service.gig_price + '</strong></p>';
                                btnBody += '</div>';
                                btnBody += '</div></a>';
                                btnBody += '</div>';
                                $("#gig_cards_row").append(btnBody);
                            });

                            hideLoader();
                        } else {
                            // Handle error case
                            $("#ShowingResultsCount").text("0");

                            console.error('Error: ' + new_data.msg);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // Handle AJAX error
                        console.error('AJAX error: ' + textStatus + ', ' + errorThrown);
                        hideLoader();
                    }
                });

            }
        });


        // Filter professionals acc. to main category
        $(document).on('click', '#main_cat_accordian .main_cat', function (event) {
            console.log("cat filter accordian");

            var elementToRemoveClass = document.querySelector('#main_cat_accordian .clicked');
            if (elementToRemoveClass) {
                elementToRemoveClass.classList.remove('clicked');

            }
            event.target.classList.add('clicked');
            var dataValue = $(this).data('value');

            var mainCatForm = new FormData();
            mainCatForm.append('id', dataValue);

            $.ajax({
                url: site_url + "/api2/public/index.php/filter_gig_main_cat",
                type: "POST",  // Change to POST if your server expects a POST request
                data: mainCatForm,  // Send the main category ID as a query parameter
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data) {
                    var new_data = JSON.parse(data);
                    if (new_data.status == 200) {
                        console.log(new_data.msg);
                        $("#gig_cards_row").empty("");
                        $("#ShowingResultsCount").text(new_data.msg.count);

                        $.each(new_data.msg, function (index, service) {
                            // Creating options in main category dropdoen
                            var btnBody = '';
                            btnBody += '<div class="col-md-4">';
                            btnBody += '<a href="<?php echo $SITE_URL ?>/buy-gig?gig_id=' + service.gig_unique_id + '"><div class="gig_card h-100">';
                            btnBody += '<div class="gig-card-img rounded position-relative" style="background-image:url(' + site_url + "/assets/files/" + service.gig_img + ')">';


                            btnBody += '</div>';
                            btnBody += '<div class="gig-card-content p-2">';
                            btnBody += '<div class="gig_owner_pic d-flex align-items-center">';
                            btnBody += '<img src="https://images.unsplash.com/photo-1579353977828-2a4eab540b9a?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2FtcGxlfGVufDB8fDB8fHww" alt="gig-owner-pic">';
                            btnBody += '<p class="fw-medium ms-2">' + service.professional.name + '</p>';
                            btnBody += '</div>';
                            btnBody += '<p class="heading_p mt-2">' + service.gig_title + '</p>';
                            btnBody += '<p class="mt-2"><i class="fa-solid fa-star"></i> <strong>4.5</strong></p>';
                            btnBody += '<p class="mt-2">From <strong>$ ' + service.gig_price + '</strong></p>';
                            btnBody += '</div>';
                            btnBody += '</div></a>';
                            btnBody += '</div>';
                            $("#gig_cards_row").append(btnBody);
                        });

                        hideLoader();
                    } else {
                        // Handle error case
                        $("#gig_cards_row").empty("");
                        $("#ShowingResultsCount").text("0");

                        var btnBody = '';
                        btnBody += '<div class="col-md-12 d-flex justify-content-center">';
                        btnBody += '<img style="width:400px;" src="https://res.cloudinary.com/dr4iluda9/image/upload/v1703768248/not-found_sao2fh.webp" alt="no result found">';
                        btnBody += '</div>';
                        $("#gig_cards_row").append(btnBody);

                        console.error('Error: ' + new_data.msg);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Handle AJAX error
                    console.error('AJAX error: ' + textStatus + ', ' + errorThrown);
                    hideLoader();
                }
            });


            var subCatForm = new FormData();
            subCatForm.append('main_cat_id', dataValue);
            console.log("qwertyuio");
            $.ajax({
                url: site_url + "/api2/public/index.php/sr_services_new_sub_category",
                type: "POST",  // Change to POST if your server expects a POST request
                data: subCatForm,  // Send the main category ID as a query parameter
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data) {
                    var new_data = JSON.parse(data);
                    if (new_data.status == 200) {
                        console.log(new_data.msg);
                        // Clear existing subcategory options
                        $("#sub_cat_accordian").empty();
                        // $("#sub_cat_accordian").append('<button data-value="" disabled selected>Select category</button>');

                        // Append new subcategory options
                        $.each(new_data.msg, function (index, service) {
                            var option = '<button class="sub_cat mb-2 me-2" data-value="' + service.id + '">' + service.service_name + '</button>';
                            $("#sub_cat_accordian").append(option);
                        });
                        hideLoader();
                    } else {
                        // Handle error case
                        console.error('Error: ' + new_data.msg);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Handle AJAX error
                    console.error('AJAX error: ' + textStatus + ', ' + errorThrown);
                    hideLoader();
                }
            });

        });



        // Filter professionals acc. to sub category
        $(document).on('click', '#sub_cat_accordian .sub_cat', function (event) {
            console.log("cat filter accordian");

            var elementToRemoveClass = document.querySelector('#sub_cat_accordian .clicked');
            if (elementToRemoveClass) {
                elementToRemoveClass.classList.remove('clicked');

            }
            event.target.classList.add('clicked');
            var dataValue = $(this).data('value');

            var mainCatForm = new FormData();
            mainCatForm.append('id', dataValue);

            $.ajax({
                url: site_url + "/api2/public/index.php/filter_gig_sub_cat",
                type: "POST",  // Change to POST if your server expects a POST request
                data: mainCatForm,  // Send the main category ID as a query parameter
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data) {
                    var new_data = JSON.parse(data);
                    if (new_data.status == 200) {
                        console.log(new_data.msg);
                        $("#gig_cards_row").empty("");
                        $("#ShowingResultsCount").text(new_data.msg.count);

                        $.each(new_data.msg, function (index, service) {
                            // Creating options in main category dropdoen
                            var btnBody = '';
                            btnBody += '<div class="col-md-4">';
                            btnBody += '<a href="<?php echo $SITE_URL ?>/buy-gig?gig_id=' + service.gig_unique_id + '"><div class="gig_card h-100">';
                            btnBody += '<div class="gig-card-img rounded position-relative" style="background-image:url(' + site_url + "/assets/files/" + service.gig_img + ')">';


                            btnBody += '</div>';
                            btnBody += '<div class="gig-card-content p-2">';
                            btnBody += '<div class="gig_owner_pic d-flex align-items-center">';
                            btnBody += '<img src="https://images.unsplash.com/photo-1579353977828-2a4eab540b9a?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2FtcGxlfGVufDB8fDB8fHww" alt="gig-owner-pic">';
                            btnBody += '<p class="fw-medium ms-2">' + service.professional.name + '</p>';
                            btnBody += '</div>';
                            btnBody += '<p class="heading_p mt-2">' + service.gig_title + '</p>';
                            btnBody += '<p class="mt-2"><i class="fa-solid fa-star"></i> <strong>4.5</strong></p>';
                            btnBody += '<p class="mt-2">From <strong>$ ' + service.gig_price + '</strong></p>';
                            btnBody += '</div>';
                            btnBody += '</div></a>';
                            btnBody += '</div>';
                            $("#gig_cards_row").append(btnBody);
                        });

                        hideLoader();
                    } else {
                        // Handle error case
                        $("#gig_cards_row").empty("");
                        $("#ShowingResultsCount").text("0");

                        var btnBody = '';
                        btnBody += '<div class="col-md-12 d-flex justify-content-center">';
                        btnBody += '<img style="width:400px;" src="https://res.cloudinary.com/dr4iluda9/image/upload/v1703768248/not-found_sao2fh.webp" alt="no result found">';
                        btnBody += '</div>';
                        $("#gig_cards_row").append(btnBody);

                        console.error('Error: ' + new_data.msg);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Handle AJAX error
                    console.error('AJAX error: ' + textStatus + ', ' + errorThrown);
                    hideLoader();
                }
            });

        });










        // live search code 
        function fill(Value) {
            //Assigning value to "search" div in "search.php" file.
            $('#live_keyword').val(Value);
            //Hiding "display" div in "search.php" file.
            $('#display').hide();
        }


        $("#live_keyword").keyup(function () {
            //Assigning search box value to javascript variable named as "name".
            var name = $('#live_keyword').val();

            var livekeywordForm = new FormData();
            livekeywordForm.append('keyword', name);

            //Validating, if "name" is empty.
            if (name == "") {
                //Assigning empty value to "display" div in "search.php" file.
                $("#display").html("");
            }
            //If name is not empty.
            else {
                //AJAX is called.
                $.ajax({
                    url: site_url + "/api2/public/index.php/live_search_gig",
                    type: "POST",  // Change to POST if your server expects a POST request
                    data: livekeywordForm,  // Send the main category ID as a query parameter
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData: false,        // To send DOMDocument or non processed data file it is set to false
                    success: function (data) {
                        var new_data = JSON.parse(data);
                        $("#display").empty();
                        if (new_data.status == 200) {
                            console.log(new_data.msg);
                            $("#gig_cards_row").empty("");
                            $("#ShowingResultsCount").text(new_data.msg.count);

                            
                            $("#display").append(new_data.msg.html);

                            hideLoader();
                        } else {
                            // Handle error case
                            $("#ShowingResultsCount").text("0");

                            console.error('Error: ' + new_data.msg);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // Handle AJAX error
                        console.error('AJAX error: ' + textStatus + ', ' + errorThrown);
                        hideLoader();
                    }
                });

            }
        });

    });


</script>



<?php include "./footer.php" ?>