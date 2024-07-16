<?php
session_start();
include_once 'function.php';
include_once 'env.php';
include('config/dbconn.php');

$userCredentials = new DB_con();

if (isset($_SESSION['id'])) {
    $username = $userCredentials->getUser($_SESSION['id'], 'join_professionals');
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


 .basic{
    width: 139px;
    background: #13C8A6;
    color: white;
    padding: 5px;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    font-size: 16px;
    text-align: center;
    position: relative;
    left: -23px;
}
 .basic::before{
    content: "";
    position: absolute;
    border-width: 4px;
    border-style: solid;
    border-color: transparent #10AA8C #10AA8C transparent;
    left: 0px;
    top: -8px;
}


.basic2{
    width: 139px;
    background: #c8b013;
    color: white;
    padding: 5px;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    font-size: 16px;
    text-align: center;
    position: relative;
    left: -24px;
}
 .basic2::before{
    content: "";
    position: absolute;
    border-width: 4px;
    border-style: solid;
    border-color: transparent #c8b013 #c8b013 transparent;
    left: 0px;
    top: -8px;
}
   
</style>

<section class="about-section-top">
    <div class="container">
        <div class="bread-text">
            <p class="d-none d-md-block">Subscription Packages</p>
            <p class="d-lg-none d-md-none" style="    font-size: 2rem!important;">Subscription Packages</p>
        </div>
    </div>
</section>


<!-- pricing package section  -->
<section class="container mt-5">

    

    <!-- Pricing 2 - Bootstrap Brain Component -->
    <section class="bsb-pricing-2 bg-light py-5 py-xl-8">
        <div class="container">
            <div class="row justify-content-md-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
            <!-- <div class="text-center mb-5">
                <h2>Our <span class="text-primary">Packages</span></h4>
            </div> -->
                <h2 class="display-5 mb-4 mb-md-5 text-center">We offer great pricing plans for <span class="text-primary">professionals</span>.</h2>
                <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
            </div>
            </div>
        </div>

        <div class="container">
            <div class="row gy-5 gy-lg-0 gx-xl-5 justify-content-center">
            <div class="col-12 col-lg-4">
                <div class="card border-0 border-bottom border-primary shadow-sm">
                    <div class="card-body p-3 p-xxl-3 text-center" style="position:realtive">
                        <div class="basic" style="">
                            <p>33% Benefit</p>
                        </div>
                        <h2 class="h4 mb-2 fw-bold">PRO</h2>
                        <h4 class="display-6 fw-bold text-primary mb-0">$150</h4>
                        <p class="text-secondary mb-4">USD / Month</p>
                        <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>1100</strong> Credits</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>PRO</strong> Badge</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>Bid priority</strong></span>
                        </li>
                        
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>24X7 </strong>Support</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                <path style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg>
                                <span> <strong></strong>Priority access</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
                            <path style="    fill: red;" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                            <span><strong>Sponsored</strong> banner on category page</span>
                        </li>
                        <!-- <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
                            <path style="    fill: red;" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                            <span>Free <strong>Support</strong></span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
                            <path style="    fill: red;" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                            <span><strong>Weekly</strong> Reports</span>
                        </li> -->
                        </ul>
                        <a href="#!" class="btn bsb-btn-xl btn-primary w-100">Buy Plan <i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i></a>
                        
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card border-0 border-bottom border-primary shadow-lg pt-md-4 pb-md-4 bsb-pricing-popular">
                <div class="card-body p-3 p-xxl-3 text-center">
                        <div class="basic2" style="">
                            <p>43% Benefit</p>
                        </div>
                    <h2 class="h4 mb-2 fw-bold">ELITE</h2>
                    <h4 class="display-6 fw-bold text-primary mb-0">$350</h4>
                    <p class="text-secondary mb-4">USD / Month</p>
                    <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span><strong>2100</strong> Credits</span>
                    </li>
                    <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span><strong>ELITE</strong> Badge</span>
                    </li>
                    <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span>Bid <strong>highest priority</strong></span>
                    </li>
                    
                    <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span> <strong>24X7 </strong>Support</span>
                    </li>
                    <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span> <strong></strong>Priority access</span>
                    </li>
                    <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span><strong>Sponsored banner</strong>  on category page</span>
                    </li>
                    <!-- <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span>Free <strong>Support</strong></span>
                    </li>
                    <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
                        <path style="    fill: red;" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                        <span><strong>Weekly</strong> Reports</span>
                    </li> -->
                    </ul>
                    <a href="#!" class="btn bsb-btn-xl btn-primary w-100">Buy Plan <i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i></a>
                </div>
                </div>
            </div>
            <!-- <div class="col-12 col-lg-4">
                <div class="card border-0 border-bottom border-primary shadow-sm">
                <div class="card-body p-4 p-xxl-5">
                    <h2 class="h4 mb-2">Elite</h2>
                    <h4 class="display-3 fw-bold text-primary mb-0">$350</h4>
                    <p class="text-secondary mb-4">USD / Month</p>
                    <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path  style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span><strong>50</strong> Bootstrap Install</span>
                    </li>
                    <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path  style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span><strong>400,000</strong> Visits</span>
                    </li>
                    <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path  style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span><strong>100 GB</strong> Disk Space</span>
                    </li>
                    <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path  style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span>Free <strong>SSL and CDN</strong></span>
                    </li>
                    <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path  style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span>Free <strong>Support</strong></span>
                    </li>
                    <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path  style="    fill: black;" d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span><strong>Weekly</strong> Reports</span>
                    </li>
                    </ul>
                    <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Choose Plan</a>
                </div>
                </div>
            </div> -->
            </div>
        </div>
    </section>
    
</section>



<div class="loader-container" id="loader">
    <div class="loader">
    <img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1705386434/sooprs-svg_bseaya.svg'  >

    </div>
</div>



<?php include "footer.php" ?>