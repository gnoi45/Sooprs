<?php
session_start();
include_once 'function.php';
include_once 'env.php';

if (!isset($_SESSION['id']) || !$_SESSION['id'] || $_SESSION['loggedin'] != true) {
    $url = 'login-professional';
    header('Location: ' . $url);
    exit();
}

$loggedinUser = new DB_con();
$username = $loggedinUser->fetchProf($_SESSION['id']);
$allservices = $loggedinUser->get_all_services();

$title = 'Professional profile ';
$description = "Description";
$keywords = "key,words";
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">

<style>
    
    .active-setting {
        color: blue !important;
    }

    label{
        color:black!important;
        font-size: 16px!important;
        margin-bottom:5px;
        
    }

    .left_side_p{
        color:grey;
        font-size: 13px;
        margin-bottom: 10px;
    }

    .form-check-label{
        /* color:grey!important; */
        font-size:13px!important;
        font-weight: 100!important;
    }

    input::placeholder,textarea::placeholder, select.placeholder-shown{
        font-weight: bold;
        opacity: 0.5;
        font-size:13px;
        /* color: red; */
    }

    .choices__input::placeholder {
        font-weight: bold;
        opacity: 1;
        font-size:13px;
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
        
        border: 1px solid darkgrey!important;
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

    input, textarea, select {
        font-size:13px!important;
    }


    #input_gig_price{
        padding: 10px 10px 10px 30px !important;
    }

    .form-control {
        
        padding: 0.5rem .75rem!important;
        
    }

    #success_msg_gif{
        text-align: -webkit-center;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    .gig_card{
        border-radius: 5px;
        /* box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; */
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        padding: 8px;
    }
    

    .gig-card-img{
        /* background-image: url(https://images.unsplash.com/photo-1579353977828-2a4eab540b9a?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2FtcGxlfGVufDB8fDB8fHww); */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 160px;
        width: -webkit-fill-available;
    }

    .gig-card-content .heading_p{
        font-size:13px;
        height: 65px;
    }

    .gig_owner_pic img{
        width: 30px;
        border-radius: 50%;
        height: 30px;
    }

    .gig_owner_pic p{
        font-size:14px;
    }


    .fa-ellipsis-vertical{
        position:absolute;
        top:5;
        right:5;
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

</style>


<?php include "./header2.php" ?>


<section class="top-sectop" style="background-color: #e0e0e0;padding: 30px 0 100px 0;">
    <div class="container">
        <h1 class="text-center mb-3" id="create_gig_heading" style="    font-weight: 600; opacity: 0.8;">My<span style="color:#0d6efd"> Gigs</span></h1>
        <div class="row justify-content-center">
           
            <div class="col-lg-12 col-md-12 col-sm-12 ">

           
                <div class="card flex-fill">

                    <div class="card-body">
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
        <img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1705386434/sooprs-svg_bseaya.svg'  style='    position: absolute;
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
    $(document).ready( function(){


        




        showLoader();
        const professional_slug = "<?php echo $username['slug'] ?>";
        const professional_image = "<?php echo $username['image'] ?>";
        const professional_name = "<?php echo $username['name'] ?>";



        console.log("professional slug gig ",professional_slug);

        const formdata = new FormData();
        formdata.append('professional_slug',professional_slug);
        $.ajax({
            url: site_url+"/api2/public/index.php/get_my_gigs", // Url to which the request is send
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
                    $.each(new_data.msg, function(index, service) {
                        // Creating options in main category dropdoen
                        var btnBody = '';                       
                        btnBody += '<div class="col-md-3 mb-3">';
                            btnBody += '<div class="gig_card h-100">';
                                btnBody += '<div class="gig-card-img rounded position-relative" style="background-image:url('+site_url+"/assets/files/"+service.gig_img+')">';
                                    btnBody += '<i class="fa-solid fa-ellipsis-vertical popupButton"></i>';
                                    btnBody += ' <div id="popup" class="popup">';
                                        // btnBody += '<div class="option  p-1">';
                                        //     btnBody += '<span style="font-size:13px;"  class="edit_gig" data-edit="'+service.gig_unique_id+'"> Edit</span>';
                                        // btnBody += '</div>';
                                        btnBody += '<div class="option  p-1">';
                                            btnBody += '<span style="font-size:13px;"  class="delete_gig" data-delete="'+service.gig_unique_id+'"> Delete</span>';
                                        btnBody += '</div>';
                                    btnBody += '</div>';
                                btnBody += '</div>';
                                    btnBody += '<div class="gig-card-content p-2">';
                                        btnBody += '<div class="gig_owner_pic d-flex align-items-center">';
                                            btnBody += '<img src="'+professional_image+'" alt="gig-owner-pic">'; 
                                            btnBody += '<p class="fw-medium ms-2">'+professional_name+'</p>';
                                        btnBody += '</div>';
                                        btnBody += '<p class="heading_p mt-2">'+service.gig_title+'</p>'; 
                                        btnBody += '<p class="mt-2"><i class="fa-solid fa-star"></i> <strong>4.5</strong></p>'; 
                                        btnBody += '<p class="mt-2">From <strong>$ '+service.gig_price+'</strong></p>';
                                btnBody += '</div>';                             
                            btnBody += '</div>';
                        btnBody += '</div>';
                        $("#gig_cards_row").append(btnBody);
                    });
                    hideLoader();
                    
                } else {
                    
                }
            
            }
        });



        // Use event delegation to attach the click event to dynamically generated .popupButton elements
        $(document).on('click', '.popupButton', function() {
            var popup = $(this).next('.popup');
            // Hide all other popups
            $('.popup').not(popup).hide();
            // Toggle the display of the corresponding popup
            popup.toggle();
        });

        // Close the popup when clicking outside of it
        $(window).on('click', function(event) {
            if (!$(event.target).closest('.popupButton').length && !$(event.target).closest('.popup').length) {
                $('.popup').hide();
            }
        });


        // delete gig 
        // Handle click event for delete option
        $(document).on('click', '.delete_gig', function() {
            var gigId = $(this).data('delete');
            var $gigCard = $(this).closest('.col-md-3');
            const delFormData = new FormData();
            delFormData.append('gig_id',gigId);

            if (confirm('Are you sure you want to delete this gig?')) {
                $.ajax({
                    url: site_url+"/api2/public/index.php/delete_gig", // Your delete URL
                    type: 'POST',
                    data: delFormData,
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData: false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(response) {
                        var new_data = JSON.parse(response);
                        if (new_data.status == 200) {
                            alert('Gig deleted successfully.');
                            // Optionally, remove the gig card from the DOM
                            $gigCard.remove();
                        } else {
                            alert('Failed to delete the gig. Please try again.');
                        }
                    },
                    error: function() {
                        alert('An error occurred while deleting the gig. Please try again.');
                    }
                });
            }
        });


    });


</script>



<?php include "./footer.php" ?>


