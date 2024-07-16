<?php
session_start();
if(isset($_GET['slug'])){
    $slug = $_GET['slug'];
    $slugClean = str_replace('-',' ',$slug);

include_once 'function.php';
include_once 'env.php';

$loggedinUser = new DB_con();
if (isset($_SESSION['id'], $_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if (isset($_SESSION['professional']) && $_SESSION['professional'] === true) {
        
        $username = $loggedinUser->fetchProf($_SESSION['id']);
    } else {
        $username = $loggedinUser->getUser($_SESSION['id'], "join_professionals");
        $cut_id = $username['id'];
    }
} else {
    // Default behavior or error message
    $defaultMessage = "Please log in as a professional or customer.";
}
// Getting all services 
$sr_services = $loggedinUser->get_all_services();

// get service content 
$service_content = $loggedinUser->get_service_content($slug);
// print_r($service_content);


$title = $service_content["meta_title"];
$description = $service_content["meta_description"];
$keywords = $service_content["meta_keywords"];
?>
<?php include "header2.php" ?>
<style>
    /* CSS */
    

    /* .about-section-top {

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

        background-image: url(<?php echo ($service_content['banner_strip'] != null) ? $service_content['banner_strip'] : "https://res.cloudinary.com/dr4iluda9/image/upload/v1704694153/professionals_dje2uu.jpg" ?>);

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

        text-transform: capitalize;

        text-align: center;

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
/*
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

    /* .profile-image img {
        width: -webkit-fill-available;
        height: auto;
        border-radius: 50%;
    } */

    /* .view-prof-btn {
        padding: 1px 17px;
        background-color: #006aff;
        color: #ffffff;
        font-size: 14px;
        border: none;
    } */


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
        /* font-size: 10px; */

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

    /* .image-round-box {
        background: white;
        
        border-radius: 50%;
        padding: 7px;
        width: 80px;
        height: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
    } */
</style>

<style>
    .skill-set span {
        padding: 5px 15px;
        background: #A8E5FF;
        border-radius: 5px;
        color: grey;
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
</style>

<style type="text/css">
    .pagination-content {
        width: 60%;
        text-align: justify;
        padding: 20px;
    }

    .pagination {
        padding: 20px;
    }

    .pagination a.active {
        background: #f77404;
        color: white;
    }

    .pagination a {
        text-decoration: none;
        padding: 10px 15px;
        box-shadow: 0px 0px 15px #0000001c;
        background: white;
        margin: 3px;
        color: #1f1e1e;
    }
    
    @media screen and (min-width: 490px){
    p.skills {
    padding: 2px 15px;
    border: 1px solid #0dcaf0bf;
    border-radius: 15em;
    font-size: 12px;
    display: inline-block;
    text-align: center;
    margin: 5px 0;
}
        
    }

 @media screen and (max-width: 480px){
    p.skills {
    padding: 2px 15px;
    border: 1px solid #0dcaf0bf;
    border-radius: 15em;
    font-size: 12px;
    display: inline-block;
    text-align: center;
    margin: 5px 0;
}
}
</style>

<section class="about-section-top">

    <div class="container">

        <div class="bread-text">

            <p class="d-none d-md-block"><?php echo $slugClean; ?> Professionals</p>

            <p class="d-lg-none d-md-none" style="    font-size: 2rem!important;">Professionals</p>



        </div>



    </div>



</section>



<section class="top-sectop" style="">
    <div class="container">
        <p class="text-capitalize fs-6" style=" padding: 30px 30px;">
            <a style="text-decoration:none; color: #758599;" href="/"> <i class="fa-solid fa-house"></i> </a>&nbsp; /
            &nbsp; <a class="fs-6" href="<?php $escaped_url ?>/all-professionals"
                style="text-decoration:none; color: #758599;">Professionals</a>&nbsp; /&nbsp;
            
            &nbsp;
        </p>
        <div class="row justify-content-center">

            <div class="col-lg-4 col-md-4 col-sm-12" style=" ">
                <div class="container" style="position: sticky;top: 80px;">
                <button class="btn btn-primary btn-sm ps-3 pe-3	text-white d-sm-block d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                            Filter
                            </button>

                    <div class="filter-div pb-4 d-none d-md-block" style="  padding: 10px; "  id="stickytypeheader">
                        <div class="d-flex justify-content-between align-items-center p-1">
                            <p>
                                <span class="fs-5 fw-semibold "> Filter </span>
                            </p>
                            <p  class='text-danger reloadButton' style="cursor:pointer;">Clear all</p>
                        </div>
                        <div class="category-heading cat-heading-professionals" style=" 12px;">
                            <div class="card mb-3">
                                <div class="col-lg-12 col-md-12 col-sm-12  card-body mb-2 search-bar">
                                    <p class="fw-semibold mb-2">By search</p>
                                    <div class="d-flex position-relative">
                                        <input class="form-control " type="text" name="live_search" id="live_search" style="height: 2.45rem;width:-webkit-fill-available;" placeholder="Search here...">
                                
                                        <i class="fa-solid fa-magnifying-glass position-absolute submit" style="color: #006aff;right: 13px; top: 12px;cursor: pointer;" name="submit" id="submit"   value="Submit"></i>
                                    </div>
                                
                                    <div id="search_result" style=" position: absolute;background: white; width: 271px;"></div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <p class=" fw-semibold" style="    ">
                                        <!-- <img src="<?php echo $SITE_URL ?>/assets/img/Group-975.png" alt="category"> -->
                                             By category
                                        </p>
                                       
                                        
                                       
                                    </div>
                                    <button class="  mt-3" id="service-all" data-value="0">All</button>

                                    <?php 
                                        foreach($sr_services as $sr){
                                    ?>
                                        <button class="service  mt-3"  data-value="<?php echo $sr['id'] ?>"><?php echo $sr['service_name'] ?></button>
                                    <?php
                                    }
                                    ?>
                                    
                                </div>
                            </div>

                        </div>


                    </div>

                    
                    

                </div>
            </div>
            
            <div class="col-lg-8 col-md-8 col-sm-12 ">
            
                <!-- <div class="nav nav-pills mb-3 justify-content-end" id="pills-tab" role="tablist">
                    

                    

                </div> -->
                <!-- <div class="">
                    <div class="row justify-content-end">
                      
                        
                        <div class="col-lg-2 col-md-3 col-sm-12 d-flex nav nav-pills justify-content-around"
                            id="pills-tab" role="tablist">
                            <button class="btn btn-primary btn-sm ps-3 pe-3	text-white d-sm-block d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                            Filter
                            </button>
                            <div class="d-flex d-none" style=" border-radius: 10px;    padding: 1px;">
                                <div class="nav-item d-none " role="presentation">
                                    <button class="nav-link active" id="pills-professionals-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-professionals" type="button" role="tab"
                                        aria-controls="pills-professionals" aria-selected="true"
                                        style="    padding: 12px 17px;">

                                        <i class="fa-solid fa-bars fs-6"></i>
                                    </button>
                                </div>
                                <div class="nav-item  d-none " role="presentation">
                                    <button class="nav-link" id="pills-professionals-grid-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-professionals-grid" type="button" role="tab"
                                        aria-controls="pills-professionals-grid" aria-selected="false"
                                        style="    padding: 12px 17px;">
                                        <i class="fa fa-th fs-6"></i>

                                    </button>
                                </div>
                            </div>
                        </div>

                       

                    </div>


                </div> -->

                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade show active ajax-data" id="pills-professionals" role="tabpanel"
                        aria-labelledby="pills-professionals-tab" tabindex="0">
                        <!-- New design lisitng   -->


                        <!-- New design lisitng   -->

                    </div>


                    <div class="tab-pane fade " id="pills-professionals-grid" role="tabpanel"
                        aria-labelledby="pills-professionals-grid-tab" tabindex="0">
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-sm-12">
                                <div class="row" id="pills-professionals-grid-col">

                                    <!-- Grid  -->

                                    <!-- Grid  -->

                                </div>


                            </div>
                        </div>

                    </div>



                </div>
                <div class="text-center pt-4 mb-4">

                    <button id="load-more" class="btn btn-sm btn-primary">Show more professionals</button>
                    <div id="data-message"></div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="mt-5" style="text-align:justify;color: darkslategrey;line-height: 1.8;">
                    <?php
                        if($service_content['service_desc'] != null){
                    ?>
                    <h3><?php echo $service_content["meta_title"] ?></h3>
                    <?php
                        }
                    ?>
                    <p >
                        <?php echo $service_content['service_desc'] ?>
                    </p>
                </div>

            </div>

        </div>


        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="filter-div pb-4  " style="  border-radius: 10px;    padding: 15px;    margin-top: 60px;"
                                id="stickytypeheader">
                                <div class="card">
                                    <div class="card-body">
                                        <p style="    padding: 10px 0 0 10px;"> <img src="<?php echo $SITE_URL ?>/assets/img/filter-icon.png"><span
                                                class="fs-5 fw-semibold"> Filter</span>
                                        </p>
                                    </div>

                                </div>
                                <div class="category-heading cat-heading-professionals" style=" 12px;">
                                <div class="col-lg-12 col-md-12 col-sm-12   mb-2 search-bar">
                                <div class="d-flex position-relative">
                                <input class="form-control " type="text" name="search" id="search-mob" style="height: 2.45rem;width:-webkit-fill-available;    border-color: #006aff;">
                                <!-- <button type="" name="submit" class="submit" id="submit"  onkeyup="fill()" value="Submit" style="height: 2.45rem; padding: 0 20px; border: none; background: #A8E5FF; border-radius: 10px; color: black; font-size: 14px;">Search</button> -->
                                <i class="fa-solid fa-magnifying-glass position-absolute submit" style="color: #006aff;right: 5px; top: 12px;" name="submit" id="submit-mob"  onkeyup="fillmob()" value="Submit"></i>
                            </div>
                                    <div id="display-mob" style=" position: absolute;background: white; width: 271px;"></div>


                                </div>
                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <p class=" fw-semibold" style="    "> <img src="<?php echo $SITE_URL ?>/assets/img/Group-975.png" alt="category">
                                            Category
                                        </p>
                                        <?php
                                        if (isset($_GET['service'])) {
                                            echo "<a href='all-professionals'><p  style='text-decoration:underline'>Clear filter</p></a>";
                                        }
                                        ?>
                                    </div>

                                    <button class="  mt-3" id="service-all-mob" data-value="0">All</button>
                                     <?php 
                                        foreach($sr_services as $sr){
                                    ?>
                                        <button class="service  mt-3"  data-value="<?php echo $sr['id'] ?>"><?php echo $sr['service_name'] ?></button>
                                    <?php
                                    }
                                    ?>

                                </div>
                                <hr>

                            </div>
                        </div>
        </div>

    </div>
    </div>
</section>

<div class="loader-container" id="loader">
        <div class="loader">
            <img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1705386434/sooprs-svg_bseaya.svg'  style='    position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 110px;'>

        </div>
    </div>

<script>

    document.getElementById("service-all").addEventListener("click", function() {
            location.reload(); // Reload the page
        });

    document.getElementById("service-all-mob").addEventListener("click", function() {
        location.reload(); // Reload the page
    });

 

</script>


<?php include "footer.php" ?>
<script>
    var slug = '<?php echo $slug; ?>';
</script>

<script>
    $('#live_search').keypress(function(event) {
            if (event.keyCode === 13) { // 13 is the Enter key code
                event.preventDefault(); // Prevent default form submission behavior
                $('#submit').click(); // Trigger click event of search button
            }
        });

        $('#search-mob').keypress(function(event) {
            if (event.keyCode === 13) { // 13 is the Enter key code
                event.preventDefault(); // Prevent default form submission behavior
                $('#submit-mob').click(); // Trigger click event of search button
            }
        });


        document.addEventListener("DOMContentLoaded", function() {
            var reloadButtons = document.getElementsByClassName("reloadButton");
            for (var i = 0; i < reloadButtons.length; i++) {
                reloadButtons[i].addEventListener("click", function() {
                    location.reload();
                });
            }
        });


</script>

<script src="<?php echo $SITE_URL ?>/assets/js/professionals_list.js"></script>
<?php } else {
    header('location:index.php');
}