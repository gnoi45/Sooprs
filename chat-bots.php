<?php



session_start();
include_once 'function.php';




if (isset($_SESSION['id'],$_SESSION['professional']) && $_SESSION['loggedin'] === true && $_SESSION['professional'] === true) {
    $loggedinUser = new DB_con();
    $username = $loggedinUser->fetchSingleProf($_SESSION['id']);

} else {
    $loggedinUser = new DB_con();
    $username = $loggedinUser->getUser($_SESSION['id'], "customer");
    $cut_id = $username['id'];
}


$title = ' Chat Bots | Chat Bot Online | Chat Bot AI | Chat Bot App';

$description = " Chatbots are computer programs designed to simulate human conversation, usually through text-based interfaces such as messaging apps or websites. ";

$keywords = "chat bots, chat bot online, chat bot ai, chat bot app ";

?>



<?php include "header2.php" ?>





<style>
    body {

        margin: 0;

        padding: 0;



        /* font-family: 'Sahitya', serif; */

    }



    .about-us-section {

        padding: 50px 0;

    }









    .right-text-col>div>h1 {

        color: #000000;



    }



    .right-text-col-knowmore>p {

        font-weight: 500;

    }



    .right-text-col>div>p {

        font-family: 'Poppins';

        /* font-style: normal; */

        /* font-weight: 500; */

        font-size: 15px;

        text-align: justify;

        /* line-height: 144.5%; */

        /* letter-spacing: 0.1em; */

        color: #000000;

        margin-top: 10px;

    }



    .reviews-count-text {

        text-decoration: underline;

        text-decoration-color: blue;

        margin-top: 100px;

    }



    .heading-by h2 {

        color: #0d6efd;

        font-weight: 800;

    }



    .about-section-top {

        /* height: 90vh; */

        display: flex;

        background-repeat: no-repeat;

        align-items: center;

        justify-content: center;

    }



    /* .bread-text p{

                text-align: center;

                font-size: 100px;

                color: white;

            } */



    .bread-text p {

        position: relative;

        color: #ffffff;

        font-size: 40px;

        font-weight: bold;

        text-align: center;

    }



    .about-section-top {

        position: relative;

        height: 50vh;

        background-color: black;

        width: 100%;

        display: flex;

        align-items: center;

        justify-content: center;

    }



    .about-section-top::before {

        content: "";

        background-image: url('assets/img/images/web-dev.png');

        background-repeat: no-repeat;

        background-size: cover;

        position: absolute;

        top: 0px;

        right: 0px;

        bottom: 0px;

        left: 0px;

        opacity: 0.4;

    }



    .contact-ul li {

        list-style: none;

        margin: 15px 0;

    }



    .contact-ul li img {

        padding-right: 25px;

    }



    .contact-ul li span {

        font-weight: 600;

    }



    .contact-form-div {

        padding: 30px;

        background: #F2F2F2;

    }



    .contact-form-div h2 {

        text-align: initial;

    }



    .form-group {

        margin: 25px 0;

    }



    .form-control {



        padding: 15px;



    }



    .search_div1 {

        display: flex;

        align-items: center;

        justify-content: center;

        flex-direction: column;

        background-color: rgb(255, 255, 255);

        /* border: 1px solid rgb(238, 238, 238); */

        width: 100%;

        align-self: center;

        position: absolute;

        border-radius: 5px;

        top: 48px;

        z-index: 999;

    }



    .search_div1 ul {



        height: 200px;

        overflow: auto;

    }
</style>



<!-- Top banner  -->

<section class="about-section-top">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="bread-text">

                    <p>Where do you need </br>Developers</p>

                    <div class="input-group mb-3">

                        <input class="form-control services-input" id="myText2" type="hidden" autocomplete="off"
                            value="Web development" data="1" style="    width: -webkit-fill-available;"
                            placeholder="What service are you looking for?">

                        <input type="text" class="form-control" placeholder="Enter your pincode or town"
                            aria-label="Enter your pincode or town" aria-describedby="button-addon2"
                            style="border-radius: 0;padding:10px;" id="myText1" autocomplete="off" value="">



                        <div class="search_div1" style="display:none">



                            <div id="srs_spinner1"
                                style="display: flex; flex-direction: column; width: 200px; height: 200px; align-self: center; align-items: center; justify-content: center;">

                                <div class="spinner-grow text-primary" role="status"><span
                                        class="sr-only">Loading...</span>

                                </div>Loading...

                            </div>



                            <ul class="search_pincode" id="search_pincode">







                            </ul>

                        </div>

                        <button class="btn btn-primary btn-outline-secondary text-white themeButton" type="button"
                            id="button-addon2" style="border-radius: 0; padding:10px;   width: 114px;">Search</button>

                    </div>

                </div>

            </div>

        </div>



    </div>

</section>



<section class="about-us-section">

    <div class="container">

        <div class="row">



            <div class="col-md-7 col-sm-12 right-text-col" style="align-items: center;display: grid;">

                <div>

                    <h3 class="fw-bold">What is ChatBots ?</h3 class="fw-bold">

                    <p>
                        Chatbots are computer programs designed to simulate conversation with human users, especially
                        over the internet. They are automated, responsive systems that interact with users using text ,
                        voice or other forms of digital communication. Chatbots use Natural Language
                        Processing (NLP) to understand user queries and provide relevant responses. They are commonly
                        used in customer service, e-commerce,
                        and other areas to provide quick and efficient assistance to users.
                        A Chatbot ( originally chatterbot ) is a software application that aims to mimic human
                        conversation through text or voice interactions .
                        It is a program that uses Artificial Intelligence (AI) and Natural Language Processing (NLP) to
                        undersatnd customer questions and automate
                        responses to them.

                    </p>
                    <div class="text-block-button">
                        <a class="btn btn-primary bark-btn" role="button" id="bark_submit">Find a Developer</a>
                    </div>
                </div>

                <div>

                    <h3 class="fw-bold">Technology</h3 class="fw-bold">

                    <p>Languages includes Python , Javascript , NodeJS , Typescript . Other technologies are also used
                        like NLP , ML , AI , Clouding computing ,
                        API , Chatbot Development Framework.


                    </p>

                </div>

                <div>

                    <h3 class="fw-bold">How Sooprs can help you</h3 class="fw-bold">

                    <p> With the help of Artificial Intelligence , we can provide you the increase in ability to predict
                        outcomes by leveraging data to discover patterns and trends.
                        AI can take in and process large amounts of data quickly and accurately , providing insights
                        that can be used to make decisions and predictions.

                    </p>

                </div>







            </div>

            <div class=" text-center col-md-5 col-sm-12 left-img-col">

                <div class="contact-form-div">

                    <img src="assets/img/images/web-dev-right.png" alt="" style="    width: -webkit-fill-available;">

                </div>

            </div>

        </div>

    </div>

</section>















<?php include "footer.php" ?>