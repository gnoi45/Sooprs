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

$title = 'Gig details';
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
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
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


    .right_side_box {
        height: 300px;
        /* background: aqua; */
        margin-top: 10px;
        border: 1px solid darkgrey;
        padding: 10px;
        position: sticky;
        top: 100px;
    }

    .buy_gig_button {
        background: black !important;
        width: -webkit-fill-available !important;
        color: white !important;
    }

    #professional_image {
        width: 60px;
        height: 60px;
        background-size: cover;
        background-position: center;
        border-radius: 50%;
    }

    .features {
        list-style: none;
        list-style-image: none;
        margin: 0;
        padding: 6px;
    }

    .features li {
        color: #95979d;
    }

    span {
        cursor: pointer;
    }

    .number {
        margin: 10px;
    }

    .minus,
    .plus {
        width: 20px;
        height: 20px;
        background: #f2f2f2;
        border-radius: 4px;
        padding: 5px 5px 5px 5px;
        border: 1px solid #ddd;
        /* display: inline-block; */
        vertical-align: middle;
        text-align: center;
    }

    input {
        height: 34px;
        width: 40px;
        text-align: center;
        font-size: 26px;
        border: 1px solid #ddd;
        border-radius: 4px;
        display: inline-block;
        vertical-align: middle;
    }

    .zoom {
        /* padding: 50px; */
        /* background-color: green; */
        transition: transform .3s;
        /* Animation */
        /* width: 200px;
        height: 200px; */
        margin: 0 auto;
    }

    .zoom:hover {
        transform: scale(1.05);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }

    .tech_pill {
        padding: 1px 10px;
        border-radius: 25px;
        border: 1px solid #006aff;
        margin-right: 10px;
        width: fit-content;
        font-size: 13px;
    }

    .categories_div p {
        font-size: 15px;
        /* color: darkgrey; */

    }
</style>
<script>
    showLoader();
</script>

<?php include "./header2.php" ?>


<section class="top-sectop" style="background-color: #e0e0e0;padding: 30px 0 100px 0;">
    <div class="container">
        <!-- <h1 class="text-center mb-3" id="create_gig_heading" style="    font-weight: 600; opacity: 0.8;">Browse<span style="color:#0d6efd"> Gigs</span></h1> -->
        <p class="text-capitalize fs-6" style=" padding: 30px 30px;">
            <a style="text-decoration:none; color: #758599;" href="/"> <i class="fa-solid fa-house"></i> </a>&nbsp; /
            &nbsp;
            <a class="fs-6" href="<?php echo $SITE_URL ?>/browse-gigs"
                style="text-decoration:none; color: #758599;">Browse Gigs</a>&nbsp; /
            &nbsp; <a class="fs-6" href="#" style="text-decoration:none; color: #758599;" id="current_gig_name"></a>
        </p>
        <div class="row justify-content-center">

            <div class="col-lg-12 col-md-12 col-sm-12 ">


                <div class="card flex-fill">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h1 id="gig_title" class="fw-bold pt-4 pb-4"
                                    style="    font-size: 26px;    color: darkslategrey;"></h1>
                                <div class="d-flex ">
                                    <div class="mb-4 me-4" id="professional_image" style="background-image:url()">
                                        <!-- <img id="professional_image" src="" alt=""> -->
                                    </div>
                                    <div>
                                        <p class="fw-bold " style="margin-bottom: 10px;" id="prof_name"></p>
                                        <i class="fa-solid fa-star"></i> <strong id="prof_rating"></strong>
                                    </div>

                                </div>
                                <div style="    overflow: hidden;height:60vh;">
                                    <div class="zoom">
                                        <a id="gig_image_fancy" href="" class="fancybox" data-fancybox="gallery1">
                                            <img id="gig_image" src="" alt="gig-main-image"
                                                style="    width: -webkit-fill-available;">
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="fw-bold fs-4 mb-3">About this gig</p>
                                    <div class="d-flex  align-items-center categories_div">
                                    <div class="mb-3 me-1">
                                        <!-- <p class="fw-bold mb-3">Main category</p> -->
                                        <div id="main_cat" class="tech_pill">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <!-- <p class="fw-bold mb-3">Sub category</p> -->
                                        <div id="sub_cat" class="tech_pill">
                                        </div>
                                    </div>
                                </div>
                                    <pre style="font-size:16px;text-align: justify;" id="gig_desc">

                                    </pre>
                                </div>

                                
                                <div class="mb-3">
                                    <p class="fw-bold mb-3">Technologies</p>
                                    <div id="skills">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <p class="fw-bold mb-3">Related Tags</p>
                                    <div id="tags_array">
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-4">
                                <div class="right_side_box">
                                    <div class="mt-4">
                                        <div class="d-flex" style="align-items: baseline;">
                                            <p>Gig price </p>
                                            <p class="fw-bold fs-4 ms-2 gig_price" id=""></p>
                                        </div>
                                    </div>
                                    <div>
                                        <ul class="features">
                                            <li class="qSePHwK flex flex-items-center">
                                                <span class="glAQDp5 bvg2_O1 ZbQv8bb C7W1J6j me-2" aria-hidden="true"
                                                    style="width: 16px; height: 16px;">
                                                    <i class="fa-solid fa-check"></i>
                                                </span>2 platforms
                                            </li>
                                            <li class="qSePHwK flex flex-items-center">
                                                <span class="glAQDp5 bvg2_O1 ZbQv8bb C7W1J6j me-2" aria-hidden="true"
                                                    style="width: 16px; height: 16px;">
                                                    <i class="fa-solid fa-check"></i></span>15 shares
                                            </li>
                                            <li class="qSePHwK flex flex-items-center">
                                                <span class="glAQDp5 bvg2_O1 ZbQv8bb C7W1J6j me-2" aria-hidden="true"
                                                    style="width: 16px; height: 16px;">
                                                    <i class="fa-solid fa-check"></i></span>Content creation
                                            </li>
                                            <li class="qSePHwK flex flex-items-center">
                                                <span class="glAQDp5 bvg2_O1 ZbQv8bb C7W1J6j me-2" aria-hidden="true"
                                                    style="width: 16px; height: 16px;">
                                                    <i class="fa-solid fa-check"></i></span>Engagement with prospects
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="text-center mt-4">
                                        <button class="btn buy_gig_button" type="button" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                            Continue
                                            &nbsp;<i class="fa-solid fa-arrow-right"></i></button>
                                    </div>


                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                                        aria-labelledby="offcanvasRightLabel">

                                        <div class="offcanvas-body">
                                            <div class="offcanvas-header">
                                                <!-- <h5 class="offcanvas-title" id="offcanvasRightLabel">Order options</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                                    aria-label="Close"></button> -->
                                            </div>
                                            <div class=" mt-3 mb-3 d-flex justify-content-between align-items-center">
                                                <h5 class="offcanvas-title fw-medium" id="offcanvasRightLabel"
                                                    style="font-size:15px;">Order options</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                                    aria-label="Close"></button>
                                            </div>
                                            <hr>
                                            <div>
                                                <div class="rounded p-3"
                                                    style="    height: 100px; border: 1px solid grey;">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p>Price</p>
                                                        <p class="gig_price fw-bold"></p>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p>Gig quantity</p>
                                                        <div class="number">
                                                            <span class="minus">-</span>
                                                            <input type="text" value="1" id="quantity" />
                                                            <span class="plus">+</span>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="mt-5">
                                                    <form id="buy_gig_form" action="">
                                                        <input id="total_price_hidden_input" type="hidden" name="amount" value="" >
                                                        <input id="user_id" type="hidden" name="user_id" value="<?php echo $username['email'] ?>" >
                                                        <input id="gig_id" type="hidden" name="gig_id" value="" >

                                                        <button type="submit" id="final_checkOut_btn"
                                                            class="btn buy_gig_button">
                                                            Continue ( $ <span id="total_price">0</span> )
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                </div>



            </div>



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


<!-- Modal -->
<div class="modal fade" id="loginAlertModal" tabindex="-1" aria-labelledby="loginAlertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- <div class="modal-header">
          <h1 class="modal-title fs-5" id="loginAlertModalLabel"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div> -->
        <div class="modal-body text-center">
          <p class="mb-4 fs-3">Please login to continue... </p><a class="login-btn  fw-medium text-decoration-none border border-primary px-2" href="<?php echo $SITE_URL ?>/login-professional">Login</a>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
      </div>
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
    let amount;
  var options = 
    {
        "key": "<?php echo $RAZR_PAY_KEY ?>", // Enter the Key ID generated from the Dashboard

        "amount": 100,
        "currency": "INR",
        "description": "Techninza",
        "image": "https://res.cloudinary.com/dr4iluda9/image/upload/v1691132151/sooprs/sooprs_logo_blue_side2_flxyxx.png",
        "prefill":
        {
        "email": '',
        "contact": +919900000000,
        },
        config: {
            display: {
                blocks: {
                    utib: 
                    { //name for Axis block
                        name: "Pay using Axis Bank",
                        instruments: 
                        [
                            {
                                method: "card",
                                issuers: ["UTIB"]
                            },
                            {
                                method: "netbanking",
                                banks: ["UTIB"]
                            },
                        ]
                    },
                    other:
                    { //  name for other block
                        name: "Other Payment modes",
                        instruments: 
                        [
                            {
                                method: "card",
                                issuers: ["ICIC"]
                            },
                            {
                                method: 'netbanking',
                            }
                        ]
                    }
                },
                
                sequence: ["block.utib", "block.other"],
                preferences: {
                show_default_blocks: true // Should Checkout show its default blocks?
                }
            }
        },
        "handler": function (response) {
        saveData(response.razorpay_payment_id);
        },
        "modal": {
        "ondismiss": function () {
            if (confirm("Are you sure, you want to close the form?")) {
            txt = "You pressed OK!";
            console.log("Checkout form closed by the user");
            } else {
            txt = "You pressed Cancel!";
            console.log("Complete the Payment")
            }
            }
        }
    };
  
    let form = document.getElementById('buy_gig_form');
    form.addEventListener('submit', (event) =>{      
      event.preventDefault();      
        let buyformData = new FormData(form);      
        // Set email and contact from form data
        // options.prefill.email = buyformData.get('email');        
        amount = buyformData.get('amount');
        // options.prefill.contact = buyformData.get('contact');
        options.amount = amount*100*83;
        var rzp1 = new Razorpay(options);
        rzp1.open();        
    });

    let saveData = (payment_id) => {
        const xhr = new XMLHttpRequest();        
        let buyformData = new FormData();
        buyformData.append('amount', amount*83);
        buyformData.append('user_id', document.getElementById('user_id').value);
        buyformData.append('gig_id', document.getElementById('gig_id').value);

        buyformData.append('payment_id', payment_id);

        xhr.open('POST', site_url+'/api2/public/index.php/gig_order');
        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if(response.status == 200){

                    toastr.success('Payment Successful', 'Success'); 
                    
                    
                }else{
                    toastr.error(response.msg, 'Error');
                }                
            } else {
                // Request failed
                console.error('Error uploading form:', xhr.status, xhr.statusText);
            }
        };
        xhr.onerror = function() {
            console.error('Network error occurred');
        };
        // Send the buyFormData object with the XMLHttpRequest
        xhr.send(buyformData);
    }
</script>


<script>
    $(document).ready(function () {
        showLoader();

        // Function to get query parameter by name
        function getQueryParam(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }

        // Get the gig_id from the URL
        const gigId = getQueryParam('gig_id');
        console.log("gig id from url ", gigId);

        const formdata = new FormData();
        formdata.append('gigId', gigId);


        // setting gig_price for future use 
        let gig__price = 0;

        $.ajax({
            url: site_url + "/api2/public/index.php/get_gig_details", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: formdata,                  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {

                var new_data = JSON.parse(data);
                if (new_data.status == 200) {
                    console.log(new_data.msg);
                    document.getElementById('current_gig_name').innerHTML = new_data.msg.gig_title;
                    document.getElementById('gig_title').innerHTML = new_data.msg.gig_title;
                    document.getElementById('gig_desc').innerHTML = new_data.msg.gig_desc;

                    const newPrice = "$ " + new_data.msg.gig_price;
                    gig__price = new_data.msg.gig_price;
                    // Get all elements with the class name 'gig_price'
                    const gigPriceElements = document.getElementsByClassName('gig_price');
                    // Loop through the collection and update the innerHTML of each element
                    for (let i = 0; i < gigPriceElements.length; i++) {
                        gigPriceElements[i].innerHTML = newPrice;
                    }
                    // document.getElementById('prof_name').innerHTML = new_data.msg.professional.name;
                    document.getElementById('prof_rating').innerHTML = new_data.msg.professional.rating;
                    
                    document.getElementById('prof_name').innerHTML = "<a style='text-decoration: underline;' href='"+site_url+"/professional/"+new_data.msg.professional.slug+"'>"+new_data.msg.professional.name+"</a>";



                    console.log("propf img ", new_data.msg.professional.image);
                    const imageUrl = new_data.msg.professional.image; // Replace with your image URL
                    document.getElementById('professional_image').style.backgroundImage = `url(${imageUrl})`;

                    $('#gig_image').attr('src', site_url + '/assets/files/' + new_data.msg.gig_img);
                    document.getElementById('total_price').innerHTML = new_data.msg.gig_price;
                    document.getElementById('total_price_hidden_input').value = new_data.msg.gig_price;
                    $('#gig_image_fancy').attr('href', site_url + '/assets/files/' + new_data.msg.gig_img);


                    const technologies = new_data.msg.technologies;
                    console.log("tech ", technologies);
                    if(technologies){

                        $.each(technologies, function (index, tech) {
                            $("#skills").append('<span class="tech_pill">' + tech + '</span>');
                        });
                    }
                    // document.getElementById('skills')

                    document.getElementById('main_cat').innerHTML = new_data.msg.main_category;
                    document.getElementById('sub_cat').innerHTML = new_data.msg.sub_category;
                    console.log("tags ",new_data.msg.tags_array);
                    if(new_data.msg.tags_array !== null){

                        $.each(new_data.msg.tags_array, function (index, tag) {
                            $("#tags_array").append('<span class="tech_pill text-secondary">' + tag + '</span>');
                        });
                    }else{
                        $("#tags_array").append('<span class=" text-secondary">No related tags</span>');
                    }


                    document.getElementById('gig_id').value = new_data.msg.gig_unique_id;


                    hideLoader();

                } else {

                }

            }
        });




        // const gigPrice = parseFloat($('#gig_price').text());
        console.log("gig_price ", gig__price);
        function updateTotalPrice() {
            const quantity = parseInt($('#quantity').val());
            const totalPrice = gig__price * quantity;
            // $('#total_price').text(totalPrice.toFixed(2));
            $('#total_price').text(totalPrice);
            $('#total_price_hidden_input').val(totalPrice); 

        }


        // Initial total price calculation
        updateTotalPrice();

        $('.minus').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            updateTotalPrice(); // Update total price after quantity change
            return false;
        });

        $('.plus').click(function () {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            updateTotalPrice(); // Update total price after quantity change
            return false;
        });

        $('#quantity').on('input', function () {
            var newValue = parseInt($(this).val());
            if (!isNaN(newValue) && newValue > 0) {
                updateTotalPrice(); // Update total price on direct input change
            } else {
                $(this).val(1); // Reset to 1 if input is invalid
                updateTotalPrice(); // Update total price with valid value
            }
        });

    });





</script>

<script>
    document.getElementById('final_checkOut_btn').addEventListener('click', function () {
        // showLoader();
       var userLoggedIn = getCookie('user_logged_in');
       if(!userLoggedIn){
            $('#loginAlertModal').modal('show');
            // localStorage.setItem('gig_buy_link', site_url+'/buy-gig');
            localStorage.setItem('redirectAfterLogin', window.location.href);
            window.location.href = site_url+'/login-professional';
       }
        // $.ajax({
        //     url: site_url + "/api2/public/index.php/auth_check", // Url to which the request is send
        //     type: "POST",             // Type of request to be send, called as method
        //     data: "",                  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        //     contentType: false,       // The content type used when sending data to the server.
        //     cache: false,             // To unable request pages to be cached
        //     processData: false,        // To send DOMDocument or non processed data file it is set to false
        //     success: function (data)   // A function to be called if request succeeds
        //     {

        //         var new_data = JSON.parse(data);
        //         if (new_data.status == 400) {

        //             hideLoader();
        //             toastr.error(new_data.msg, 'Error');

        //         } else {
        //             hideLoader();
        //             toastr.success(new_data.msg, 'Success');
        //         }

        //     }
        // });

    });
</script>





<?php include "./footer.php" ?>