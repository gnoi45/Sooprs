<?php
session_start();
include_once 'function.php';
include_once 'env.php';

$dbConObj = new DB_con();
if(isset($_SESSION['id']) ){   
    $username = $dbConObj->getUser($_SESSION['id'],'join_professionals');  
}


// banners 
$banners = $dbConObj->getBanners('banners');  



$title = "World's Best Online Freelance Marketplace | Sooprs.com";
$description = "Sooprs is a platform that connects buyer and service provider. We provide web development, digital marketing, mobile app development and many other services.";
$keywords = "web development, mobile app development, digital marketing, android app development, hybrid app development, ios app development, seo, graphic designing.    ";
?>
<?php include "./header2.php" ?>
<link rel="stylesheet" href="<?php echo $SITE_URL ?>/assets/css/FrequentyAsk.css" />
<div style="background: rgba(19, 85, 255, 0.05); border: none" class="card text-center">
  <div class="main-title mt-5">
    <p>Hello, How can we help you?</p>
    <input type="text" placeholder="Ask Question..." />
  </div>

  <div class="Category">
    <p>Or choose a Category to quickly find the help you need</p>
  </div>
  <div class="d-flex justify-content-center align-items-center">
    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" style="    background: none;" id="pills-home-tab" data-bs-toggle="pill"
          data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
          <div class="card" style="width: 12rem">
            <div class="card-body">
              <img src="<?php echo $SITE_URL ?>/assets/images/flagblank.png" class="mt-1" />
              <p class="card-text mt-2">Getting Started</p>
            </div>
          </div>
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" style="    background: none;" data-bs-toggle="pill"
          data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
          <div class="card" style="width: 12rem">
            <div class="card-body">
              <img src="<?php echo $SITE_URL ?>/assets/images/tag.png" class="mt-1" />
              <p class="card-text mt-2">Payment & Refund</p>
            </div>
          </div>
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" style="    background: none;" id="pills-contact-tab" data-bs-toggle="pill"
          data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
          <div class="card" style="width: 12rem">

            <div class="card-body">
              <img src="<?php echo $SITE_URL ?>/assets/images/gig.png" class="mt-1" />
              <p class="card-text mt-2">Gig Guide</p>
            </div>
          </div>
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" style="    background: none;" id="pills-disabled-tab" data-bs-toggle="pill"
          data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled"
          aria-selected="false">
          <div class="card" style="width: 12rem">
            <div class="card-body">
              <img src="<?php echo $SITE_URL ?>/assets/images/man.png" class="mt-1" />
              <p class="card-text mt-2">Hire Professional</p>
            </div>
          </div>
        </button>
      </li>
    </ul>
  </div>
  <!-- <div class="container d-flex justify-content-around mb-5">
        <div class="row">
          <div class="col mt-3">
            <div class="card" style="width: 12rem">
              <div class="card-body">
                <img src="<?php echo $SITE_URL ?>/assets/images/flagblank.png" class="mt-1" />
                <p class="card-text mt-2">Getting Started</p>
              </div>
            </div>
          </div>
          <div class="col mt-3">
            <div class="card" style="width: 12rem">
              <div class="card-body">
                <img src="<?php echo $SITE_URL ?>/assets/images/tag.png" class="mt-1" />
                <p class="card-text mt-2">Payment & Refund</p>
              </div>
            </div>
          </div>
          <div class="col mt-3">
            <div class="card" style="width: 12rem">
              <div class="card-body">
                <img src="<?php echo $SITE_URL ?>/assets/images/gig.png" class="mt-1" />
                <p class="card-text mt-2">Gig Guide</p>
              </div>
            </div>
          </div>
          <div class="col mt-3">
            <div class="card" style="width: 12rem">
              <div class="card-body">
                <img src="<?php echo $SITE_URL ?>/assets/images/man.png" class="mt-1" />
                <p class="card-text mt-2">Hire Professional</p>
              </div>
            </div>
          </div>
        </div>
      </div> -->
</div>

<div class="container mt-3 mb-5">
  <p class="mt-4">Frequently Asked Questions</p>
  <div class="row mt-4">
    <div class="col-md-5 mt-3">
      <div class="tab-content" id="pills-tabContent">
        <!-- Getting started  -->
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"  tabindex="0">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                  aria-expanded="true" aria-controls="collapseOne">
                  <b>What is Sooprs?</b>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Sooprs make it easy for freelancers to find work and for businesses to find qualified freelancers.
                  Variety: Sooprs offer a wide variety of projects to choose from, so freelancers can find projects that
                  match their skills and interests.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <b>How do I get started on a Sooprs as freelancer?</b>
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  To get started on a Sooprs.com, you will typically need to create a profile and provide information
                  about your skills and experience. You may also need to submit a portfolio of your work. Once you have
                  created a profile, you can start bidding on projects.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <b>How to earn money with Sooprs?</b>
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Sooprs gives 100% of your earned money to you without any commission. Your money is yours when task is
                  apporved by your Client. Just learn skills and start earning.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <b>How can I Post a Project in Sooprs?</b>
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Just Signup as Client and Go to Post a Project given on header of sooprs.com or either click this link
                  <a href="https://sooprs.com/post-a-project" class="text-primary">https://sooprs.com/post-a-project</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- payment  -->
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive"
                  aria-expanded="true" aria-controls="collapseFive">
                  <b>How to bid on a project?</b>
                </button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                Just go to Browse Project section given on the header or either click this link <a class="text-primary" href="https://sooprs.com/browse-job">https://sooprs.com/browse-job</a>. Click on the arrow (->) on any project. Here you can place your bid on project detail page. Enjoy earning!
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                  <b>Is there any fees to post a new project?</b>
                </button>
              </h2>
              <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                No! You can post your projects free of charge here! Enjoy the hassle-free and time-saving project posting.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingSeven">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                  <b>Is there any fees to place bid on the project?</b>
                </button>
              </h2>
              <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                Yes! We are offering free credits to place your bid. After a threshold limit, you can recharge your credit wallet.
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- gig  -->
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingEight">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight"
                  aria-expanded="true" aria-controls="collapseEight">
                  <b>What is Sooprs?</b>
                </button>
              </h2>
              <div id="collapseEight" class="accordion-collapse collapse show" aria-labelledby="headingEight"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Sooprs make it easy for freelancers to find work and for businesses to find qualified freelancers.
                  Variety: Sooprs offer a wide variety of projects to choose from, so freelancers can find projects that
                  match their skills and interests.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingNine">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                  <b>How do I get started on a Sooprs as freelancer?</b>
                </button>
              </h2>
              <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  To get started on a Sooprs.com, you will typically need to create a profile and provide information
                  about your skills and experience. You may also need to submit a portfolio of your work. Once you have
                  created a profile, you can start bidding on projects.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTen">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                  <b>How to earn money with Sooprs?</b>
                </button>
              </h2>
              <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Sooprs gives 100% of your earned money to you without any commission. Your money is yours when task is
                  apporved by your Client. Just learn skills and start earning.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingEleven">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                  <b>How can I Post a Project in Sooprs?</b>
                </button>
              </h2>
              <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Just Signup as Client and Go to Post a Project given on header of sooprs.com or either click this link
                  <a href="https://sooprs.com/post-a-project" class="text-primary">https://sooprs.com/post-a-project</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- professionals  -->
        <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwelve">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve"
                  aria-expanded="true" aria-controls="collapseTwelve">
                  <b>What is Sooprs?</b>
                </button>
              </h2>
              <div id="collapseTwelve" class="accordion-collapse collapse show" aria-labelledby="headingTwelve"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Sooprs make it easy for freelancers to find work and for businesses to find qualified freelancers.
                  Variety: Sooprs offer a wide variety of projects to choose from, so freelancers can find projects that
                  match their skills and interests.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThirteen">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                  <b>How do I get started on a Sooprs as freelancer?</b>
                </button>
              </h2>
              <div id="collapseThirteen" class="accordion-collapse collapse" aria-labelledby="headingThirteen"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  To get started on a Sooprs.com, you will typically need to create a profile and provide information
                  about your skills and experience. You may also need to submit a portfolio of your work. Once you have
                  created a profile, you can start bidding on projects.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFourteen">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                  <b>How to earn money with Sooprs?</b>
                </button>
              </h2>
              <div id="collapseFourteen" class="accordion-collapse collapse" aria-labelledby="headingFourteen"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Sooprs gives 100% of your earned money to you without any commission. Your money is yours when task is
                  apporved by your Client. Just learn skills and start earning.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFifteen">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
                  <b>How can I Post a Project in Sooprs?</b>
                </button>
              </h2>
              <div id="collapseFifteen" class="accordion-collapse collapse" aria-labelledby="headingFifteen"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Just Signup as Client and Go to Post a Project given on header of sooprs.com or either click this link
                  <a href="https://sooprs.com/post-a-project" class="text-primary">https://sooprs.com/post-a-project</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button
                  class="accordion-button"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseOne"
                  aria-expanded="true"
                  aria-controls="collapseOne"
                >
                <b>What is Sooprs?</b>
                </button>
              </h2>
              <div
                id="collapseOne"
                class="accordion-collapse collapse show"
                aria-labelledby="headingOne"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                Sooprs make it easy for freelancers to find work and for businesses to find qualified freelancers. Variety: Sooprs offer a wide variety of projects to choose from, so freelancers can find projects that match their skills and interests.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo"
                  aria-expanded="false"
                  aria-controls="collapseTwo"
                >
                  How to claim refund ?
                </button>
              </h2>
              <div
                id="collapseTwo"
                class="accordion-collapse collapse"
                aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <strong>This is the second item's accordion body.</strong> It
                  is hidden by default, until the collapse plugin adds the
                  appropriate classes that we use to style each element. These
                  classes control the overall appearance, as well as the showing
                  and hiding via CSS transitions. You can modify any of this
                  with custom CSS or overriding our default variables. It's also
                  worth noting that just about any HTML can go within the
                  <code>.accordion-body</code>, though the transition does limit
                  overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseThree"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  How to make customized gig?
                </button>
              </h2>
              <div
                id="collapseThree"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <strong>This is the third item's accordion body.</strong> It
                  is hidden by default, until the collapse plugin adds the
                  appropriate classes that we use to style each element. These
                  classes control the overall appearance, as well as the showing
                  and hiding via CSS transitions. You can modify any of this
                  with custom CSS or overriding our default variables. It's also
                  worth noting that just about any HTML can go within the
                  <code>.accordion-body</code>, though the transition does limit
                  overflow.
                </div>
              </div>
            </div>
          </div> -->
    </div>

    <div class="col-md-7 text-center mt-3">
      <div style="background: rgba(0, 14, 51, 1); color: white" class="card w-100">
        <div class="card-body mt-4">
          <h5 class="card-title">You still have a question?</h5>
          <p class="question">
            If you can’t find answer to your question, Fill your query &
            submit it, or you can always contact us. We answer to you
            shortly.
          </p>

          <div class="d-flex justify-content-center gap-4 mt-5 mb-5">
            <div class="card" style="width: 16rem">
              <div class="card-body">
                <img src="<?php echo $SITE_URL ?>/assets/images/calling.png" class="mt-2" alt="" srcset="" />
                <p class="card-text number">+91 9541254789</p>
                <p class="faster">we are always happy to help</p>
              </div>
            </div>

            <div class="card" style="width: 16rem">
              <div class="card-body">
                <img src="<?php echo $SITE_URL ?>/assets/images/mail.png" class="mt-2" alt="" srcset="" />
                <p class="card-text number">support@sooprs.in</p>
                <p class="faster">fastest way to get your answers</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="text-center">
  <h5>Ask what you want to know?</h5>
  <p class="m-0">
    If you can’t find answer to your question, Fill your query & submit it,
    or you
  </p>
  <p>can always contact us. We answer to you shortly.</p>
</div>

<div class="m-5">
  <form class="text-center">
    <div class="d-flex justify-content-center gap-4 filedName">
      <input type="text" placeholder="Full name" />
      <input type="text" placeholder="EmailEmail" />
    </div>
    <div class="d-flex justify-content-center gap-4 mt-3 filedName">
      <input type="text" placeholder="Phone Number" />
      <input type="text" placeholder="Title of Query" />
    </div>
    <div class="mt-3 feedback">
      <textarea class=""></textarea>
    </div>
    <button class="message">Send Message</button>
  </form>
</div>

<!-- <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script> -->
<?php include "./footer.php" ?>