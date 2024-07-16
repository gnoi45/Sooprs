<?php
session_start();
include_once 'function.php';
include_once 'env.php';


if (!isset($_SESSION['id']) || !isset($_SESSION['id']) || $_SESSION['loggedin'] != true) {
    $url = 'login-professional';
    header('Location: ' . $url);
    exit();
}

// include('config/dbconn.php');
$isSessionSet = isset($_SESSION['id']);
echo '<script>';
echo 'function checkSession() {';
echo '  return ' . ($isSessionSet ? 'true' : 'false') . ';';
echo '}';
echo '</script>';







$userCredentials = new DB_con();

$username = $userCredentials->getUser($_SESSION['id'], 'join_professionals');
$cut_id = $username['id'];

// print_r($username);
// die();
$title = 'Enquiries ';
$description = "Description";
$keywords = "key,words";



?>

<style>
    /* CSS */
    .button-33 {
        background-color: #006aff;
        border-radius: 100px;
        box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset, rgba(44, 187, 99, .15) 0 1px 2px, rgba(44, 187, 99, .15) 0 2px 4px, rgba(44, 187, 99, .15) 0 4px 8px, rgba(44, 187, 99, .15) 0 8px 16px, rgba(44, 187, 99, .15) 0 16px 32px;
        color: white;
        cursor: pointer;
        display: inline-block;
        font-family: CerebriSans-Regular, -apple-system, system-ui, Roboto, sans-serif;
        padding: 2px 14px;
        text-align: center;
        text-decoration: none;
        transition: all 250ms;
        border: 0;
        font-size: 16px;
        white-space: nowrap;

        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button-33:hover {
        box-shadow: rgba(44, 187, 99, .35) 0 -25px 18px -14px inset, rgba(44, 187, 99, .25) 0 1px 2px, rgba(44, 187, 99, .25) 0 2px 4px, rgba(44, 187, 99, .25) 0 4px 8px, rgba(44, 187, 99, .25) 0 8px 16px, rgba(44, 187, 99, .25) 0 16px 32px;
        transform: scale(1.05) rotate(-1deg);
    }

    /* .about-section-top {

        position: relative;

        height: 50vh;

        background-color: black;

        width: 100%;

        display: flex;

        align-items: center;

        justify-content: center;

    } */



    .about-section-top::before {

        content: "";

        background-image: url('https://res.cloudinary.com/dr4iluda9/image/upload/v1704436645/photo-of-people-having-meeting-3183186_g9f3qt.jpg');

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

    /* .about-section-top {

        height: 30vh;

        display: flex;

        background-repeat: no-repeat;

        align-items: center;

        justify-content: center;

    } */

    .bread-text p {

        position: relative;

        color: #ffffff;

        font-size: 3rem;



        text-align: center;

    }

    .category-heading button {
        display: inline;
        width: fit-content;
        font-size: 15px;
        border: 1px solid #d9d9d9;
        /* box-shadow: 0px 0px 8px -3px black; */
        border-radius: 10px;
        padding: 7px 16px;
        color: darkblue;


    }

    .category-heading input {
        display: inline;
        width: fit-content;
        font-size: 15px;
        border: 1px solid #d9d9d9;
        /* box-shadow: 0px 0px 8px -3px black; */
        border-radius: 10px;
        padding: 7px 16px;


    }

    .category-heading button:hover {
        background-color: #0068ff;
        box-shadow: 0px 0px 8px -3px black;
        color: white;


    }
</style>


<!-- Card design css    -->
<style>
    .card {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.5);
        max-width: -webkit-fill-available;
        display: flex;
        flex-direction: row;
        border-radius: 25px !important;
        position: relative;
    }

    .card h2 {
        margin: 0;
        padding: 0 1rem;
    }

    .card .title {
        padding: 1rem;
        text-align: right;
        color: green;
        font-weight: bold;
        font-size: 15px;
        text-transform: capitalize;
    }

    .card .desc {
        padding: 0.5rem 1rem;
        font-size: 14px;
    }

    .card .actions {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        align-items: center;
        padding: 0.5rem 1rem;
    }

    .card svg {
        width: 85px;
        height: 85px;
        margin: 0 auto;
    }

    .img-avatar {
        width: 80px;
        height: 80px;
        position: absolute;
        border-radius: 50%;
        border: 6px solid white;
        background-image: linear-gradient(-60deg, #16a085 0%, #f4d03f 100%);
        top: 15px;
        left: 85px;
    }

    .card-text {
        display: grid;
        grid-template-columns: 1fr 2fr;
    }

    .title-total {
        padding: 1em 1.5em 1em 1.5em;
    }

    .title-total h3,
    .title-total p {
        padding-left: 15px;
    }

    .title-total p {
        font-weight: 500;
        color: grey;
        text-transform: capitalize;
    }

    path {
        fill: white;
    }

    .img-portada {
        width: 100%;
    }

    .portada {
        width: 100%;
        height: 100%;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        /* background-image: url("https://m.media-amazon.com/images/S/aplus-media/vc/cab6b08a-dd8f-4534-b845-e33489e91240._CR75,0,300,300_PT0_SX300__.jpg"); */
        background-position-y: inherit;
        background-position-x: center;
        background-size: cover;
    }


    /* button {
        border: none;
        background: none;
        font-size: 24px;
        color: #8bc34a;
        cursor: pointer;
        transition: 0.5s;
    } */

    /* .actions button:hover {
        color: #4CAF50;
        transform: rotate(22deg);
    } */



    .plm-p span {
        font-size: 12px;
        text-transform: uppercase;
        margin-left: 15px;
        color: grey;
        display: inline-block;
        font-weight: 500;
    }

    .profile-image {
        padding: 5px;
        /* background-color: white; */
        border-radius: 10px;
    }

    .profile-image img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }

    .view-prof-btn {
        border-radius: 5px;
        padding: 4px 30px;
        background-color: #0078ff;
        color: #ffffff;
        font-size: 16px;
        border: none;
    }


    .grid-box-text p:nth-child(1) {
        font-weight: 700;
        font-size: 17px;
    }

    .grid-box-text p:nth-child(2) {
        font-size: 13px;
        color: grey;
    }

    .grid-box-text p:nth-child(3) {
        font-size: 13px;
        color: #006aff;
        font-weight: 500;
    }


    .fa-star {
        color: #F2BB16 !important;
        font-size: 10px;

    }

    form {
        width: -webkit-fill-available;
        display: flex;
        margin-bottom: 0;
    }




    /* .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #0077ff !important;
        background-color: white !important;
    } */



    /* SEarch bar  */


    /* Search bar  */

    .image-round-box {
        background: white;
        box-shadow: 0px 4px 6px -4px black;
        border-radius: 50%;
        padding: 7px;
    }
</style>

<style>
    .skill-set p {
        padding: 5px 15px;
        /* background: black; */
        border-radius: 5px;
        /* color: white; */
        font-size: 14px;
        display: inline-block;
        /* display: table; */
        /* display: table-caption; */

        text-align: center;
        margin: 5px 0;
    }

    /* .view-prof-btn {
        border-radius: 5px;
        padding: 7px 50px;
        background-color: #D9F2FD;
        color: #00A9F6;
        font-size: 16px;
        border: none;
        font-weight: 500;
    } */
    .nav-pills button {
      
        width: -webkit-fill-available;
        white-space: nowrap;
        margin: 5px 0;
    }

    .tab-content{
        padding: 30px 35px;
        background-color: white;
    }


    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #0053ce!important;
    background-color: white!important;
}
.nav-pills .nav-link {
    border-radius: 0!important;
    text-align: inherit!important;
}




.enquiry-box{
    background: white;
    padding: 15px 27px;
    /* border-radius: 10px; */
    /* box-shadow: 0px 0px 6px -3px black; */
    height: 100%;
}
</style>


<?php include "./header2.php" ?>

<!-- Demo header-->

<section class="about-section-top">

    <div class="container">

        <div class="bread-text">

            <p class="d-none d-md-block">My Projects</p>

            <p class="d-lg-none d-md-none" style="    font-size: 2rem!important;">My Projects</p>



        </div>



    </div>



</section>


<section class="top-sectop" style="padding:100px 0;">
    <div class="container">
        <div class="text-capitalize fs-6" style=" ">
            <a style="text-decoration:none; color: #758599;" href="/"> <i class="fa-solid fa-house"></i> </a>&nbsp; /
            &nbsp; <a class="fs-6" href="#" style="text-decoration:none; color: #758599;">My Projects</a>
            <!-- <button type="button" class="btn btn-primary btn-sm float-end rounded-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            New Enquiry
            </button> -->
        </div>
        <p id="customer-data-id" data-variable="<?php echo $username['id']; ?>"></p>
        <p id="customer-data-name" data-variable="<?php echo $username['name']; ?>"></p>
        <p id="customer-data-email" data-variable="<?php echo $username['email']; ?>"></p>
        <p id="customer-data-mobile" data-variable="<?php echo $username['mobile']; ?>"></p>
        <p id="customer-data-city" data-variable="<?php echo $username['city']; ?>"></p>


        
        <div class="row text-center mt-5" id="project-data">
           
           
          

        </div>

        

    </div>
    
</section>
<hr>
<img src="https://sooprs.com/assets/img/Group471.png" alt="" style="width:100%; height:auto;" srcset="">
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


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Enquiry</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form>
        <div class="modal-body">
                    
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Select service</label>
                        <select class="form-select" name="" id="services_category">
                            <option value="">Select any service</option>
                        </select>
                    </div>
                    
                    
                    <button type="button" class="btn btn-primary btn-sm rounded-0" id="sr_services_search">Search</button>
                </form>
        </div>
        
       

    </div>
  </div>
</div>


<div class="modal fade" id="postReviewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="postReviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <!-- <h1 class="modal-title fs-5" id="postReviewModalLabel">Modal title</h1> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="bg-white p-4" style="    width: -webkit-fill-available;">
                        <p class="text-capitalize text-center" style=" color: #758599;font-size: 25px;">
                            Write a review
                        </p>
                        <input type="hidden" name="professional_id" id="professional_id" value='2'>
                        <input type="hidden" name="customer_id" id="customer_id" value='<?php echo $username["id"] ?> '>
                        <input type="hidden" name="lead_id" id="lead_id" value='<?php echo $lead["id"] ?>'>



                            <div class="form-group mb-3">
                                <input type="hidden" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" value='<?php echo $username["name"] ?>' />
                            </div>
                            
                            <div class="form-group mb-3">
                                <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                            </div>

                            <p class="text-secondary">Overall, how satisfied were you with my work?</p>

                            <h4 class="text-center mt-2 mb-4">
                                <i class="fas fa-star star-light submit_starr mr-1" id="submit_starr_1" data-rating="1"></i>
                                <i class="fas fa-star star-light submit_starr mr-1" id="submit_starr_2" data-rating="2"></i>
                                <i class="fas fa-star star-light submit_starr mr-1" id="submit_starr_3" data-rating="3"></i>
                                <i class="fas fa-star star-light submit_starr mr-1" id="submit_starr_4" data-rating="4"></i>
                                <i class="fas fa-star star-light submit_starr mr-1" id="submit_starr_5" data-rating="5"></i>
                            </h4>
                            
                            
                            <div class="form-group text-center mt-4">
                                <button type="button" class="btn btn-success btn-sm" id="save_review">Submit
                                
                                </button>
                            </div>
                            
                            
                        </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div> -->
            </div>
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


<?php include "./footer.php" ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    window.onload = () => {

        showLoader();

         // Create a new FormData object and append form fields
         const formData = new FormData();
         formData.append('variable', <?php echo $cut_id; ?>);

        // Make an AJAX request to upload the form data
        const xhr = new XMLHttpRequest();
        xhr.open('POST', site_url+'/api2/public/index.php/get_projects_ajax');

        xhr.onload = function() {
        if (xhr.status === 200) {
            const decode_data = JSON.parse(xhr.responseText);
            var element = document.getElementById("project-data");
            var htmlContent = "";
            
            if(decode_data.status == 200){
                console.log(decode_data);

                if(decode_data.msg == 0 || decode_data.msg == null){
                    htmlContent += "<img class='enquiry-box' src='https://img.freepik.com/free-vector/no-data-concept-illustration_114360-616.jpg?w=740&t=st=1697721514~exp=1697722114~hmac=1c686beab542a2ba73188f309dd1107f755b514facbd67909dee49d0070511cb' style='width:100%; max-width:400px; height:auto; margin: auto; ' />";
                }else{
                    for (var i = 0; i < decode_data['msg'].length; i++) {
                        var item = decode_data['msg'][i];
                        
                        htmlContent += "<div class='col-md-4 col-sm-12 mt-3' >\
                                            <div class='enquiry-box' style='padding: 15px;    border-radius: 10px; position:relative;   height: 100%;box-shadow: 0px 0px 7px -3px black;'>\
                                                <p class='text-end text-secondary' style='font-size:12px'> "+ item["days"]['days'] + " Days ago</p>\
                                                <a href='<?php echo $SITE_URL ?>/project-detail/"+ item['id'] + "/"+ item['myLeadId'] + "'  >\
                                                    <h6 class='fw-bold text-start text-capitalize' style='color: #006aff;'>"+ item['project_title'] + "</h6>\
                                                </a>\
                                                <p class=' text-secondary text-start' style='font-size:13px'><b>Description</b> "+ item['description'] + "</p>\
                                                <p class=' text-secondary text-start' style='font-size:16px; font-weight:bold;'><b>Max Budget:</b> $"+ item['max_budget_amount'] + "</p>";

                                            if(item['project_status'] == 2){
                                                htmlContent += "<a href='write-review/"+ item['id'] + "/"+ item['professional_id'] + "' class=' text-primary' style='font-size:12px; font-weight:bold;float: inline-end;'>Review&nbsp;&nbsp;<i class='fa-solid fa-pen-to-square text-primary'></i></a>";
                                            }
                                                
                                            htmlContent += "<a href='<?php echo $SITE_URL ?>/project-detail/"+ item['id'] + "/"+ item['myLeadId'] + "'  style='font-size: 12px;font-weight: bold;float: inline-end;margin-right: 10px;'><span>&nbsp;<i class='fa-solid fa-message text-primary' title='chat a little'></i></span></a>\
                                                            </div>\
                                                        </div >";


                        
    
                        // htmlContent += "<div class='col-md-4 col-sm-12 mt-3' >\
                        //     <div class='enquiry-box' >\
                        //         <h5>"+ item['service-name'] + "</h5>\
                        //         " + faqdiv + "\
                        //     </div>\
                        // </div >";
                    }
                }
                    
                element.innerHTML = htmlContent;
                hideLoader();

                // toastr.success('resume uploaded successfully', 'Success'); 
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

        // Send the FormData object with the XMLHttpRequest
        xhr.send(formData);
    }
</script>

<script>
    $('#save_review').click(function(){

var user_name = $('#user_name').val();
var user_review = $('#user_review').val();
var customer_id = $('#customer_id').val();
var professional_id = $('#professional_id').val();
var lead_id = $('#lead_id').val();


if(user_name == '' || user_review == '')
{
    alert("Please Fill Both Field");
    return false;
}
else
{
    $.ajax({
        url:site_url+"/api2/public/index.php/submit_review",
        method:"POST",
        data:{rating_data:rating_data, user_name:user_name, user_review:user_review,customer_id:customer_id,professional_id:professional_id,lead_id:lead_id},
        success:function(data)
        {
            var parsed_data = JSON.parse(data);

            $('#postReviewModal').modal('hide');

            if(parsed_data.status == 400){
                alert(parsed_data.msg);

            }else{

                $("#success_div").css('display','block');
                setTimeout(function () {
                    window.location.reload();
                }, 3000);
               
            }


        }
    })
}

});
</script>