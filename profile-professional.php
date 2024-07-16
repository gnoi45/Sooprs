<?php

session_start();
// include_once 'function.php';
// if (!$_SESSION['id'] || $_SESSION['loggedin'] != true) {
//     $url = 'login-professional';
//     header('Location: ' . $url);
//     exit();
// }



// $loggedinUser = new DB_con();
// $logUserData = $loggedinUser->getUser($_SESSION['id'], $_SESSION['table']);




$title = 'About Us ';

$description = "Description";

$keywords = "key,words";

?>

<style>
    .hover-filled-slide-left {
        background-color: #2773ff !important;
        color: white !important;
    }

    .success-msg-p {
        background: mediumseagreen;
        color: white;
        text-align: center;
        font-size: larger;
    }
</style>





<!-- Portfolio image grid  -->
<style>
    .wrapper-grid {
        width: 100%;

    }



    .container-grid>div {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2em;
        color: #ffeead;
    }

    .container-grid>div>img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* border: 1px solid black */
    }

    /* Grid */
    .container-grid {
        display: grid;
        grid-gap: 5px;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        grid-auto-rows: 125px;
        grid-auto-flow: dense;
        /* Fill all spaces with fitted images */
    }

    .horizontal {
        grid-column: span 2;
    }

    .vertical {
        grid-row: span 2;
    }

    .big {
        grid-column: span 2;
        grid-row: span 2;
    }

    /* Media Queries */

    @media screen and (min-width: 1024px) {
        .wrapper-grid {
            width: auto;
            margin: 0 auto;
        }
    }


    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #006fff;
        background-color: transparent;
    }

    .profile-image img {
        width: 140px;
        height: 140px;
        border-radius: 50%;
    }

    .profile-left-box strong {
        font-size: 25px;
    }


    .review-name-letter-pic img{
        width: 50px;
        height: 50px;
    }

    p{
        color: #758599;
        
    }
</style>

<?php include "./header2.php" ?>




<section class="top-sectop " style="margin-top:20px;">
    <div class="container">
        <p style="    padding: 30px 0;"> <i class="fa-solid fa-house"></i>&nbsp; / &nbsp;Professionals&nbsp; /&nbsp; Parul Sharma&nbsp;</p>
        <div class="row">
            <div class="col-md-3 col-sm-12" style="    box-shadow: grey 0px 0px 5px -1px;">
                <div class="p-3">
                    <p class="pb-2">Profile</p>
                    <hr>
                    <div class="profile-image text-center">
                        <img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681120758/sooprs/animation_y3v5nn.webp"
                            alt="">
                    </div>
                    <div class="profile-left-box text-center">
                        <strong>
                            Parul Sharma
                        </strong>
                        <p>
                            Web Developer
                        </p>
                        <p>
                            <i class="fa-solid fa-star" style="color: #fbff00;"></i><i class="fa-solid fa-star"
                                style="color: #fbff00;"></i><i class="fa-solid fa-star" style="color: #fbff00;"></i><i
                                class="fa-solid fa-star" style="color: #fbff00;"></i><i class="fa-solid fa-star"
                                style="color: #fbff00;"></i>
                        </p>
                        <div class="d-flex justify-content-evenly align-items-center" style="padding:8px">
                            <p><i class="fa-solid fa-envelope"></i>v</p>
                            <p><i class="fa-sharp fa-solid fa-link-simple"></i>c</p>
                            <p><i class="fa-solid fa-ellipsis-stroke"></i>vv</p>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <strong>Bio</strong>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut laboriosam totam, accusantium
                            illo molestias eaque nihil. Voluptatum aspernatur in distinctio!</p>
                    </div>
                    <hr>
                    <div>
                        <strong>Contacts</strong>
                        <ul>
                            <li>Email: dummy@gmail.com</li>
                            <li>Phone number: +91-5645897584 </li>
                            <li>Location: Gurgaon</li>


                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12" style="    box-shadow: grey 0px 0px 5px -1px;     padding: 5px 30px 30px 30px;">
                <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active  fs-5 fw-bold" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Portfolio</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fs-5 fw-bold" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Reviews</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fs-5 fw-bold" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Services</button>
                    </li>

                </ul>
                <hr class="mt-0">
                <div class="tab-content" id="pills-tabContent">


                    <!-- Portfolio tab  -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="wrapper-grid">
                            <!-- <h1>Image Grid</h1> -->
                            <div class="container-grid">
                                <div class="horizontal"><img src="https://picsum.photos/500/200" alt=""></div>
                                <div class="vertical"><img src="https://picsum.photos/200/350" alt=""></div>
                                <div><img src="https://picsum.photos/200/200" alt=""></div>
                                <div class="big"><img src="https://picsum.photos/600/600" alt=""></div>

                                <div><img src="https://picsum.photos/200/220" alt=""></div>

                                <div><img src="https://picsum.photos/220/250" alt=""></div>
                                <div><img src="https://picsum.photos/250/200" alt=""></div>

                            </div>
                        </div>

                        <hr>
                        <div class="text-justify">
                            <Strong>About</Strong>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore hic perspiciatis
                                cupiditate
                                voluptates necessitatibus itaque sint nisi nam, atque eveniet exercitationem ut,
                                delectus odio,
                                quo natus mollitia repellendus. Id, nesciunt? Voluptate perspiciatis quam suscipit,
                                blanditiis
                                fugit hic quae nam nobis molestiae delectus earum dignissimos asperiores, fugiat facere
                                omnis,
                                unde sint!</p>
                            <br>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore hic perspiciatis
                                cupiditate
                                voluptates necessitatibus itaque sint nisi nam, atque eveniet exercitationem ut,
                                delectus odio,
                                quo natus mollitia repellendus. Id, nesciunt? Voluptate perspiciatis quam suscipit,
                                blanditiis
                                fugit hic quae nam nobis molestiae delectus earum dignissimos asperiores, fugiat facere
                                omnis,
                                unde sint!</p>
                            <br>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore hic perspiciatis
                                cupiditate
                                voluptates necessitatibus itaque sint nisi nam, atque eveniet exercitationem ut,
                                delectus odio,
                                quo natus mollitia repellendus. Id, nesciunt? Voluptate perspiciatis quam suscipit,
                                blanditiis
                                fugit hic quae nam nobis molestiae delectus earum dignissimos asperiores, fugiat facere
                                omnis,
                                unde sint!</p>

                        </div>
                    </div>

                    <!-- Portfolio tab  -->



                    <!-- Reviews tab  -->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div>
                            <strong>Reviews</strong>
                            <p>151 reviews </p> <span>
                                <p>
                                    <i class="fa-solid fa-star" style="color: #fbff00;"></i><i class="fa-solid fa-star"
                                        style="color: #fbff00;"></i><i class="fa-solid fa-star"
                                        style="color: #fbff00;"></i><i class="fa-solid fa-star"
                                        style="color: #fbff00;"></i><i class="fa-solid fa-star"
                                        style="color: #fbff00;"></i>
                                </p>
                            </span>
                        </div>

                        <hr>
                        <div class="row" style="padding: 40px;">
                            <div class="col-md-1 col-sm-1 review-name-letter-pic">
                                <img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681120758/sooprs/animation_y3v5nn.webp"
                                    alt="">
                            </div>
                            <div class="col-md-11 col-sm-11">
                                <strong>Sunita</strong>
                                <p><i class="fa-solid fa-star" style="color: #fbff00;"></i><i class="fa-solid fa-star"
                                        style="color: #fbff00;"></i><i class="fa-solid fa-star"
                                        style="color: #fbff00;"></i><i class="fa-solid fa-star"
                                        style="color: #fbff00;"></i><i class="fa-solid fa-star"
                                        style="color: #fbff00;"></i></p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aliquam rerum dicta
                                    nihil dignissimos quibusdam distinctio assumenda, voluptates explicabo perferendis!
                                </p>

                            </div>
                        </div>
                        <hr>
                        <div class="row" style="padding: 40px;">
                            <div class="col-md-1 col-sm-1 review-name-letter-pic">
                                <img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681120758/sooprs/animation_y3v5nn.webp"
                                    alt="">
                            </div>
                            <div class="col-md-11 col-sm-11">
                                <strong>Sunita</strong>
                                <p><i class="fa-solid fa-star" style="color: #fbff00;"></i><i class="fa-solid fa-star"
                                        style="color: #fbff00;"></i><i class="fa-solid fa-star"
                                        style="color: #fbff00;"></i><i class="fa-solid fa-star"
                                        style="color: #fbff00;"></i><i class="fa-solid fa-star"
                                        style="color: #fbff00;"></i></p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aliquam rerum dicta
                                    nihil dignissimos quibusdam distinctio assumenda, voluptates explicabo perferendis!
                                </p>

                            </div>
                        </div>
                        <hr>
                    </div>
                    <!-- Reviews tab  -->




                    <!-- Services  -->
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">...</div>
                    <!-- Services  -->


                </div>


            </div>
        </div>
    </div>
</section>




<?php include "./footer.php" ?>