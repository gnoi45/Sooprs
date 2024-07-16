<?php
session_start();
include_once 'function.php';
include_once 'env.php';
include('config/dbconn.php');

$userCredentials = new DB_con();

if (isset($_SESSION['id'])) {
    $username = $userCredentials->fetchProf($_SESSION['id']);
    // print_r($username);
}
if (isset($_POST['view_lead_btn'])) { 
    
    if (isset($_SESSION['id'])) {
        $lead_mail = $userCredentials->lead_purchase_mail($username['email']);
        $lead_id = $_POST['lead_id'];    
        $redirectURL = $SITE_URL."/lead/".$lead_id;    
        header('Location: '.$redirectURL);
        exit();       
    }else{
        $url = $SITE_URL.'/login-professional';
        header('Location: ' . $url);
        exit();
    }    
}
$title = 'Leads ';
$description = "Description";
$keywords = "key,words";
?>
<?php include "./header2.php" ?>
<style>
    /* CSS */
   
/* 
    .about-section-top {

        position: relative;

        height: 15vh;

        background-color: black;

        width: 100%;

        display: flex;

        align-items: center;

        justify-content: center;
        background-repeat: no-repeat;


    } */




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


    .bread-text p {

        position: relative;

        color: #ffffff;

        font-size: 3rem;



        text-align: center;

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
        /* background: #fff;
        border-radius: 4px; */
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        border: none;
        /* max-width: -webkit-fill-available;
        display: flex;
        flex-direction: row;
        border-radius: 25px !important;
        position: relative; */
    }

    /* .card h2 {
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
    } */

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

    /* .card-text {
        display: grid;
        grid-template-columns: 1fr 2fr;
    } */

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




    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: darkblue !important;
        background-color: white !important;
    }



    /* SEarch bar  */


    /* Search bar  */

    .image-round-box {
        background: white;
        box-shadow: 0px 4px 6px -4px black;
        border-radius: 50%;
        padding: 7px;
    }
     @media screen and (max-width: 480px) {
    .sooprs-bids {
        font-size: 1em;font-weight: 400; margin-bottom: 0; color: #343C6A;float:none;
    }
    .sooprs-pt {
         font-size: 1.2em;font-weight: 700; margin-bottom: 0; color: #343C6A;float:none;
    }
     .sooprs-desc {
        font-size: .9em;font-weight: 400; margin-bottom: 0;margin-top:5px; color: #343C6A;float:left;
    }
    .skill-set p {
    padding: 2px 15px;
    border: 1px solid #0dcaf0bf;
    border-radius: 15em;
    font-size: 12px;
    display: inline-block;
    text-align: center;
    margin: 5px 0;
}
.sooprs-budget {
    font-size:.9em;
    padding-top: 1em;
}
     }
     
      @media screen and (min-width: 490px) {
      .sooprs-bids {
        font-size: 1em;font-weight: 400; margin-bottom: 0; color: #343C6A;float:right;
    }   
    .sooprs-pt {
         font-size: 1.5em;font-weight: 700; margin-bottom: 0; color: #343C6A;float:left;
    }
    .sooprs-desc {
        font-size: .9em;font-weight: 400; margin-bottom: 0;margin-top:5px; color: #343C6A;float:left;
    }
    .skill-set p {
    padding: 2px 15px;
    border: 1px solid #0dcaf0bf;
    border-radius: 15em;
    font-size: 12px;
    display: inline-block;
    text-align: center;
    margin: 5px 0;
}
.sooprs-budget {
    font-size:.9em;
    padding-top: 1em;
}
      }



    /* offcanvas filter  */
    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 40px;
        left: 0;
        background-color: #ffffff;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
    }

    .sidenav a:hover {
    color: #f1f1f1;
    }

    .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
    }

    #main {
    transition: margin-left .5s;
    padding: 16px;
    }

    @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
    }

    .accordion-button:focus {
       
        box-shadow: none;
    }



    /* button animation "sign up button " */
    
.wrap-btn {
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}



#btn-wrap::before {
  content: '';
  border-radius: 1000px;
  min-width: calc(300px + 12px);
  min-height: calc(60px + 12px);
  border: 6px solid #00FFCB;
  box-shadow: 0 0 60px rgba(0,255,203,.64);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  opacity: 0;
  transition: all .3s ease-in-out 0s;
}

#btn-wrap:hover, .#btn-wrap:focus {
  color: #313133;
  transform: translateY(-6px);
}

#btn-wrap:hover::before, #btn-wrap:focus::before {
  opacity: 1;
}

#btn-wrap::after {
  content: '';
  width: 10px; height: 10px;
  border-radius: 100%;
  border: 6px solid #00FFCB;
  position: absolute;
  z-index: 0;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: ring 1.5s infinite;
}

#btn-wrap:hover::after, #btn-wrap:focus::after {
  animation: none;
  display: none;
}

@keyframes ring {
  0% {
    width: 30px;
    height: 30px;
    opacity: 1;
  }
  100% {
    width: 300px;
    height: 300px;
    opacity: 0;
  }
}

   
</style>

<section class="about-section-top">
    <div class="container">
        <div class="bread-text">
            <p class="d-none d-md-block">Browse Project</p>
            <p class="d-lg-none d-md-none" style="    font-size: 2rem!important;">Browse Project</p>
        </div>
    </div>
</section>



<section class="top-sectop " style="    background: #f3f3f3;">
    <div class="container">
        <p class="text-capitalize fs-6" style=" padding: 30px 30px;">
            <a style="text-decoration:none; color: #758599;" href="/"> <i class="fa-solid fa-house"></i> </a>&nbsp; /
            &nbsp; <a class="fs-6" href="#" style="text-decoration:none; color: #758599;">Projects</a>&nbsp;
        </p>
        <div class="row justify-content-center">
            
            <div class="col-lg-4 col-md-4 col-sm-12" style="    padding: 0px 20px;">
                <div class="container" style="    position: sticky;top: 70px;">
                    <div class="filter-div pb-4  d-none d-md-block" style="    border-radius: 10px;    padding: 15px;position:sticky;" id="stickytypeheader">
                        <p style="">
                         <!-- <img src="assets/img/filter-icon.png"> -->
                         <!-- <span class="fs-5 fw-semibold"> Filter</span> </p> -->
                        <!-- <div class=" cat-heading-leads" style=" 12px;">
                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <p class=" fw-semibold" style="    ">
                                       
                                            By Category
                                        </p>
                                        <?php
                                        if (isset($_GET['service'])) {
                                            echo "<a href='all-professionals'><p  style='text-decoration:underline'>Clear filter</p></a>";
                                        }
                                        ?>
                                    </div>
                                    <div class='category-heading'>
                                        <button class="service  mt-3" id="service-all" data-value="0">All</button>
                                        <button class="service  mt-3" id="" data-value="1">Web Development</button>
                                        <button class="service mt-3" data-value="14">Web Designing</button>
                                        <button class="service mt-3" data-value="16">Internet of Things</button>
                                        <button class=" service mt-3" data-value="5">Digital Marketing</button>
                                        <button class=" service mt-3" data-value="2">App Development</button>
                                        <button class=" service mt-3" data-value="23">Graphic Designing</button>
                                        <button class=" service mt-3" data-value="7">SEO</button>
                                    </div>
                                    
                                </div>
                            </div>
                            

                        </div> -->
                        <div class=" cat-heading-leads" style=" 12px;">
                        <a href='https://sooprs.com/browse-job' ><p class="p-1 mb-3"  style='text-decoration:underline'>Clear filter</p></a>

                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item" style='    border: var(--bs-accordion-border-width) solid #ffffff;'>
                                    <h2 class="accordion-header" style='    --bs-accordion-active-bg: #ffffff; --bs-accordion-border-color: #ffffff;'>
                                        <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                           By Category
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class='categories-heading'>
                                            <!-- <button class="service  mt-3" id="service-all" data-value="0">All</button>
                                            <button class="service  mt-3" id="" data-value="1">Web Development</button>
                                            <button class=" service mt-3" data-value="7">SEO</button>

                                            <button class="service mt-3" data-value="14">Web Designing</button>
                                            <button class="service mt-3" data-value="16">Internet of Things</button>
                                            <button class=" service mt-3" data-value="2">App Development</button>
                                            <button class=" service mt-3" data-value="5">Digital Marketing</button>
                                            <button class=" service mt-3" data-value="23">Graphic Designing</button> -->

                                            


                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    

                    <!-- mobile filter  -->

                    <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <div class="filter-div pb-4 " style="padding: 15px;" id="stickytypeheader">
                           
                            <div class=" category-heading-mobile cat-heading-leads" style=" 12px;">
                                
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <p class=" fw-semibold" style="    ">
                                     <!-- <img src="assets/img/Group-975.png" alt="category" > -->
                                        By category
                                    </p>
                                    <?php
                                    if (isset($_GET['service'])) {
                                        echo "<a href='leads'><p  style='text-decoration:underline'>Clear filter</p></a>";
                                    }
                                    ?>
                                </div>
                                    <div class='categories-heading'>
                                        <!-- <button class="service  mt-3" id="service-all-mob" data-value="0">All</button>
                                        <button class="service  mt-3" id="" data-value="1">Web Development</button>
                                        <button class="service mt-3" data-value="14">Web Designing</button>
                                        <button class="service mt-3" data-value="16">Internet of Things</button>
                                        <button class=" service mt-3" data-value="5">Digital Marketing</button>
                                        <button class=" service mt-3" data-value="2">App Development</button>
                                        <button class=" service mt-3" data-value="23">Graphic Designing</button>
                                        <button class=" service mt-3" data-value="7">SEO</button> -->
                                    </div>

                            </div>
                        </div>
                    </div>






                    <!-- <div class=" "  id="offcanvasExample" >
                        <div class="offcanvas-header">
                            
                            <button type="button" class="btn-close" id="closeOffcanvas"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="filter-div pb-4 bg-light " style="    border-radius: 10px;    padding: 15px;  box-shadow: 0px 0px 6px -3px black;" id="stickytypeheader">
                                <p style="    padding: 10px 0 0 10px;"> <img src="assets/img/filter-icon.png"><span class="fs-5 fw-semibold"> Filter</span> </p>
                                <hr>
                                <div class="category-heading cat-heading-leads" style=" 12px;">
                                    
                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <p class=" fw-semibold" style="    "> <img src="assets/img/Group-975.png" alt="category" >
                                            Category
                                        </p>
                                        <?php
                                        if (isset($_GET['service'])) {
                                            echo "<a href='leads'><p  style='text-decoration:underline'>Clear filter</p></a>";
                                        }
                                        ?>
                                    </div>
                                    <button class="service  mt-3" id="service-all-mob" data-value="0">All</button>
                                    <button class="service  mt-3" id="" data-value="1">Web Development</button>
                                    <button class="service mt-3" data-value="14">Web Designing</button>
                                    <button class="service mt-3" data-value="16">Internet of Things</button>
                                    <button class=" service mt-3" data-value="5">Digital Marketing</button>
                                    <button class=" service mt-3" data-value="2">App Development</button>
                                    <button class=" service mt-3" data-value="23">Graphic Designing</button>
                                    <button class=" service mt-3" data-value="7">SEO</button>

                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 ">
                <?php
                
                if(isset($_SESSION['id'])){
                    $pro_id = $_SESSION['id'];
                        echo '<p id="professional-data-id" data-variable="<?php echo $pro_id; ?>"></p>';
                }
                ?>
                
                <!-- <button id="filterButton" class="btn btn-primary btn-sm ps-3 pe-3 mb-3 text-white d-sm-block d-md-none" type="button">
                    Filter
                </button> -->
                <div class="mb-3 ">
                    <span class=" d-sm-block d-md-none" style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; Filter projects</span>
                </div>

                <!-- <div>
                    <span class="jobsCounter">0</span> <span style="font-size: 13px;color: darkgrey;">jobs found</span>
                </div> -->
                <div class="d-flex justify-content-between p-1 mb-3">
                    <p style="font-size: 0.9rem;">Showing <span class="fw-bold" id="all_counts">0</span> results</p>

                    <div class="wrap-btn">
                        <a   class="login-btn  fw-medium text-decoration-none border border-primary px-2" style="background: #006aff; color: white;" href="<?php echo $SITE_URL ?>/join-professional">Join as professional</a>
                    </div>

                </div>
                <div class="ps-2 pe-2" id="leads-data">

                    <!-- New design lisitng   -->



                    <!-- New design lisitng   -->

                </div>

                <div class="text-center pt-4 mb-4">

                    <button id="load-more-leads" class="btn text-primary fw-bold">
                    <div class="loader-container" id="loader">
                        <div class="loader">
                            <img src='https://sooprs.com/assets/img/images/sooprs-fav.png'  style='    position: absolute;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                width: 110px;'>

                        </div>
                    </div>
                    Show more projects</button>
                    <div id="data-message"></div>
                </div>
            </div>

        </div>

    </div>
    </div>
</section>
<div class="loader-container" id="loader">
    <div class="loader">
    <img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1705386434/sooprs-svg_bseaya.svg'  >

    </div>
</div>

<script>
    $(document).ready( function(){        
        showLoader();
        $.ajax({
            url: site_url+"/api2/public/index.php/sr_services_new_cat", // Url to which the request is send
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
                    $.each(new_data.msg, function(index, service) {
                        // Create a button element with the service_name and data-value attribute
                        var btnBody = '';
                        btnBody += '<div class="main_service" >';
                        btnBody += '<div class="d-flex align-items-center main_service_toggle" data-target="child_'+service.id+'" id="main_'+service.id+'">';

                        btnBody += '<i class="toggle-icon fa-regular fa-square-plus" style="    color: #006aff;"></i>';
                        btnBody += '<button class="mainservice" data-value="'+service.id+'" style=" border: none; background: none;">'+service.service_name+'</button>';
                        btnBody += '</div>';

                        btnBody += '<div class="child_services ms-3 d-none"  id="child_'+service.id+'">'; // Hidden by default
                        // Create buttons for child services
                        $.each(service.child_services, function(index, childService) {
                            btnBody += '<div class="d-flex  align-items-center">';
                            btnBody += '<i class="fa-regular fa-square-minus" style="color: #006aff;"></i>';
                            btnBody += '<button class="service" data-value="'+childService.id+'" style="border: none; background: none;    font-size: 0.9rem;">'+childService.service_name+'</button>';
                            btnBody += '</div>';
                        });
                        btnBody += '</div>';
                        btnBody += '</div>';                        
                        
                        $(".categories-heading").append(btnBody);
                    });
                    hideLoader();
                    $(".main_service_toggle").click(function() {
                        var targetId = $(this).data("target");
                        var childServices = $("#" + targetId);

                        childServices.toggleClass("d-none");
                        $(this).find(".toggle-icon").toggleClass("fa-square-plus fa-square-minus");
                    });


                    // search based on parent services 
                    $('.cat-heading-leads .mainservice').click(function (event) {
                        showLoader();
                        var elementToRemoveClass = document.querySelector('.clicked');
                        if(elementToRemoveClass){
                            elementToRemoveClass.classList.remove('clicked');
                        }
                        event.target.classList.add('clicked');
                        var dataValue = $(this).data('value');
                        $("#data-message").html("");

                        $.ajax({
                            url: site_url+"/api2/public/index.php/filter_leads_ajax_mainservice",
                            method: "POST",
                            data: { dataValue: dataValue },
                            success: function (data) {

                                let decode_data = JSON.parse(data, true);
                                // console.log(decode_data['msg']);

                                var element = document.getElementById("leads-data");
                                var htmlContent = "";
                                element.innerHTML = "";
                                if (decode_data['status'] == 200) {

                                    // let reverse_array = decode_data['msg'].reverse();
                                    for (var i = 0; i < decode_data['msg'].length; i++) {
                                        var item = decode_data['msg'][i];


                                        let mobile = item.mobile;
                                            let email = item.email;
                                            let hiddenMobile = mobile.substr(0, 2) + '********';

                                            let parts = email.split('@');
                                            let hiddenEmail = parts[0].charAt(0) + '***' + parts[0].charAt(parts[0].length - 1) + '@' + parts[1];

                                        htmlContent += "<div class='row justify-content-center mb-3'>\
                                                        <div class='col-md-12 col-sm-12' style='background: white; padding: 1em;    border-radius: 10px;    box-shadow: 0px 0px 6px -3px black;'>\
                                                            <div class='list-right-box'>\
                                                                <div class='row'>\
                                                                    <div class='col-lg-10 col-md-10 col-sm-12'>\
                                                                        <b class='text-capitalize sooprs-pt'>" + item['project_title'] + "</b>\
                                                                    </div>\
                                                                    <div class='col-lg-2 col-md-2 col-sm-12'>\
                                                                        <p class='text-capitalize sooprs-bids'>" + item['num_leads'] + (item['num_leads'] <= 1 ? ' Bid' : ' Bids') + " </p>\
                                                                    </div>\
                                                                </div>\
                                                                <div class='skill-set'>\
                                                                    <p> " + item['service_name'] + "</p>\
                                                                </div>\
                                                                <div class='row'>\
                                                                    <div class='col-lg-12 col-md-12 col-sm-12'>\
                                                                        <p class='sooprs-desc'>" + item['description'] + "</p>\
                                                                    </div>\
                                                                    \
                                                                </div>\
                                                                \
                                                                <div class='row'>\
                                                                    <div class='col-lg-12 col-md-12 col-sm-12 d-flex justify-content-between'>\
                                                                        <b class='sooprs-budget'>Budget: $" + item['min_budget'] + "-"+ item['max_budget_amount'] +" USD</b>\
                                                                        <div>\
                                                                            <form  method='post' action='' style='float:right'>\
                                                                                <input type='hidden' name='lead_id' value='"+item['id']+"'>\
                                                                                <button type='submit' class='mt-2 view-prof-btn' name='view_lead_btn' onClick = showLoader();><i class='fa-solid fa-arrow-right'></i></button>\
                                                                            </form>\
                                                                        </div>\
                                                                    </div>\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                    </div>";
                                    }

                                    element.innerHTML += htmlContent;
                                    hideLoader();
                                } else {

                                    element.innerHTML = "<div class='d-flex justify-content-center align-items-center'><img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1703768248/not-found_sao2fh.webp' style='width:300px;' ></div>";

                                    $("#load-more-leads").hide();
                                    hideLoader();

                                }


                            }
                        });
                    });

                    $('.cat-heading-leads .service').click(function (event) {

                        var elementToRemoveClass = document.querySelector('.clicked');
                        if(elementToRemoveClass){

                            elementToRemoveClass.classList.remove('clicked');
                        }
                        event.target.classList.add('clicked');
                        var dataValue = $(this).data('value');
                        $("#data-message").html("");

                        $.ajax({
                            url: site_url+"/api2/public/index.php/filter_leads_ajax",
                            method: "POST",
                            data: { dataValue: dataValue },
                            success: function (data) {

                                let decode_data = JSON.parse(data, true);
                                // console.log(decode_data['msg']);

                                var element = document.getElementById("leads-data");
                                var htmlContent = "";
                                element.innerHTML = "";
                                if (decode_data['status'] == 200) {

                                    // let reverse_array = decode_data['msg'].reverse();
                                    for (var i = 0; i < decode_data['msg'].length; i++) {
                                        var item = decode_data['msg'][i];


                                        let mobile = item.mobile;
                                            let email = item.email;
                                            let hiddenMobile = mobile.substr(0, 2) + '********';

                                            let parts = email.split('@');
                                            let hiddenEmail = parts[0].charAt(0) + '***' + parts[0].charAt(parts[0].length - 1) + '@' + parts[1];

                                        htmlContent += "<div class='row justify-content-center mb-3'>\
                                                        <div class='col-md-12 col-sm-12' style='background: white; padding: 1em;    border-radius: 10px;    box-shadow: 0px 0px 6px -3px black;'>\
                                                            <div class='list-right-box'>\
                                                                <div class='row'>\
                                                                    <div class='col-lg-10 col-md-10 col-sm-12'>\
                                                                        <b class='text-capitalize sooprs-pt'>" + item['project_title'] + "</b>\
                                                                    </div>\
                                                                    <div class='col-lg-2 col-md-2 col-sm-12'>\
                                                                        <p class='text-capitalize sooprs-bids'>" + item['num_leads'] + (item['num_leads'] <= 1 ? ' Bid' : ' Bids') + " </p>\
                                                                    </div>\
                                                                </div>\
                                                                <div class='skill-set'>\
                                                                    <p> " + item['service_name'] + "</p>\
                                                                </div>\
                                                                <div class='row'>\
                                                                    <div class='col-lg-12 col-md-12 col-sm-12'>\
                                                                        <p class='sooprs-desc'>" + item['description'] + "</p>\
                                                                    </div>\
                                                                    \
                                                                </div>\
                                                                \
                                                                <div class='row'>\
                                                                    <div class='col-lg-12 col-md-12 col-sm-12 d-flex justify-content-between'>\
                                                                        <b class='sooprs-budget'>Budget: $" + item['min_budget'] + "-"+ item['max_budget_amount'] +" USD</b>\
                                                                        <div>\
                                                                            <form  method='post' action='' style='float:right'>\
                                                                                <input type='hidden' name='lead_id' value='"+item['id']+"'>\
                                                                                <button type='submit' class='mt-2 view-prof-btn' name='view_lead_btn' onClick = showLoader();><i class='fa-solid fa-arrow-right'></i></button>\
                                                                            </form>\
                                                                        </div>\
                                                                    </div>\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                    </div>";
                                    }

                                    element.innerHTML += htmlContent;

                                } else {

                                    element.innerHTML = "<div class='d-flex justify-content-center align-items-center'><img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1703768248/not-found_sao2fh.webp' style='width:300px;' ></div>";

                                    $("#load-more-leads").hide();
                                }


                            }
                        });
                    });
                    
                } else {
                    
                }
            
            }
        });

    });

   
</script>
<script>
    if(document.getElementById("service-all")){

        document.getElementById("service-all").addEventListener("click", function() {
                location.reload(); // Reload the page
            });
    }
    if( document.getElementById("service-all-mob")){

        document.getElementById("service-all-mob").addEventListener("click", function() {
           location.reload(); // Reload the page
       });
    }
</script>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
//   document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
//   document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>

<script>
    // Check if it's a mobile view
    if (window.innerWidth <= 768) {
        // Remove the first div in mobile view
        var element = document.getElementById("accordionExample");
        if (element) {
            element.parentNode.removeChild(element);
        }
    } else {
        // Remove the second div in desktop view
        var element = document.getElementsByClassName("category-heading-mobile");
        if (element) {
            element.parentNode.removeChild(element);
        }
    }
</script>

<?php include "footer.php" ?>