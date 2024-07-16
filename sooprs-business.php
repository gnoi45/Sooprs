<?php
session_start();
include_once 'function.php';
include_once 'env.php';

$dbConObj = new DB_con();
if (isset($_SESSION['id'])) {
    $username = $dbConObj->getUser($_SESSION['id'], 'join_professionals');
}



$banners = $dbConObj->getBanners('banners');



$title = "World's Best Online Freelance Marketplace | Sooprs.com";
$description = "Sooprs is a platform that connects buyer and service provider. We provide web development, digital marketing, mobile app development and many other services.";
$keywords = "web development, mobile app development, digital marketing, android app development, hybrid app development, ios app development, seo, graphic designing.    ";
?>
<?php include "./header2.php" ?>
    <!-- homeimages -->
    <div>
      <img
        class="w-100 mt-3 homeimages"
        src="images/homeimage.jpg"
        alt=""
        srcset=""
      />
    </div>

    <div>
      <h2 class="text-center fw-bold mt-5">
        <i style="color: blue">Trusted </i>and
        <i style="color: blue">loved</i> by world’s best team
      </h2>
    </div>

    <!-- company logos -->
    <div>
      <div class="mt-4 container">
        <marquee direction="left" height="100px" behavior="" direction="left">
          <img
            class="company_logo"
            src="images/image 18.png"
            alt=""
            srcset=""
          />
          <img
            class="company_logo"
            src="images/image 13.png"
            alt=""
            srcset=""
          />
          <img
            class="company_logo"
            src="images/image 17.png"
            alt=""
            srcset=""
          />
          <img
            class="company_logo"
            src="images/image 16.png"
            alt=""
            srcset=""
          />
          <img
            class="company_logo"
            src="images/image 15.png"
            alt=""
            srcset=""
          />
          <img
            class="company_logo"
            src="images/image 14.png"
            alt=""
            srcset=""
          />
          <img
            class="company_logo"
            src="images/image 13.png"
            alt=""
            srcset=""
          />
          <img
            class="company_logo"
            src="images/image 18.png"
            alt=""
            srcset=""
          />
          <img
            class="company_logo"
            src="images/image 18.png"
            alt=""
            srcset=""
          />
        </marquee>
      </div>
    </div>

    <div class="mt-3 freelance_management">
      <img
        style="width: 100%; height: 350px"
        src="images/Rectangle 100.png"
        class="img-fluid mt-5"
        alt="..."
      />
      <div class="centered">
        <p
          id="elevate_freelance"
          style="color: white; font-size: 25px; font-weight: bold; margin: 0px"
        >
          Elevate your freelance management with
        </p>
        <p
          id="elevate_freelance"
          style="color: white; font-size: 25px; font-weight: bold"
        >
          complete oversight and control.
        </p>
        <button
          style="width: 170px; height: 45px"
          class="btn btn-gradient btn-glow"
        >
          Book a Demo
        </button>
      </div>
    </div>

    <!-- Ratings -->

    <div class="row mt-5 mx-5">
      <div style="width: 50%" class="col-sm">
        <p id="value" class="fifty_percent">50%</p>
        <div class="text-center">
          <p style="margin: 0px; color: rgba(6, 18, 55, 1)">
            Shorter time from
          </p>
          <p>hire to execution</p>
        </div>
      </div>
      <div style="width: 50%" class="col-sm">
        <p id="free" class="fifty_percent">100%</p>
        <div class="text-center">
          <p style="margin: 0px; color: rgba(6, 18, 55, 1)">
            Of your freelancers get
          </p>
          <p>paid on time</p>
        </div>
      </div>
      <div style="width: 50%" class="col-sm">
        <p id="twenty" class="fifty_percent">20+</p>
        <div class="text-center">
          <p style="margin: 0px; color: rgba(6, 18, 55, 1)">
            Hours a month saved on
          </p>
          <p>global freelancer payments</p>
        </div>
      </div>
      <div style="width: 50%" class="col-sm">
        <p id="risk" class="fifty_percent">0</p>
        <div class="text-center">
          <p style="margin: 0px; color: rgba(6, 18, 55, 1)">Risk of worker</p>
          <p>misclassification</p>
        </div>
      </div>
    </div>

    <div class="get_all_projects">
      <img
        style="width: 100%; height: 700px"
        src="images/sooprsbackground.jpg"
        class="img-fluid mt-5"
        alt="..."
      />
      <div class="faster_without">
        <p
          id="get_your_projects"
          style="color: white; font-size: 25px; font-weight: bold; margin: 0px"
        >
          Get your projects moving
        </p>
        <p
          id="get_your_faster"
          style="color: white; font-size: 25px; font-weight: bold"
        >
          faster without our hiring service
        </p>
        <p style="color: white; margin: 0px">
          Our sourcing experts will find you 2-6 expert freelancers
        </p>
        <p style="color: white">for your project in 72 hours or less.</p>
        <button
          style="width: 170px; height: 45px"
          class="btn btn-gradient btn-glow mt-4"
        >
          Learn more &nbsp;<i class="bi bi-arrow-right"></i>
        </button>
      </div>
    </div>

    <div class="text-center">
      <h2 id="One_app" class="fw-bold mt-5">
        One app for all your <i style="color: blue">Freelance</i> needs
      </h2>
      <p style="margin: 0px">
        Sooprs combines the ease of a marketplace with the lead, contract,
        insurance and payment tools
      </p>
      <p>solopreneurs need to easily manage their work</p>
    </div>

    <div class="container">
      <div class="row mt-5">
        <div class="col-md-6">
          <div class="mt-4">
            <div>
              <div class="d-flex gap-4">
                <img
                  style="height: 23px; width: 23px"
                  src="images/check_logo.png"
                  alt=""
                  srcset=""
                />
                <p class="fw-bold">No Hidden Fees</p>
              </div>
              <p class="Transparent_pricing">
                Transparent pricing with no hidden fees – because honesty builds
              </p>
              <p class="Transparent_pricing">
                trust. Your freelance journey starts here, with clarity at every
                step.
              </p>
            </div>
          </div>

          <div class="mt-4">
            <div>
              <div class="d-flex gap-4">
                <img
                  style="height: 23px; width: 23px"
                  src="images/check_logo.png"
                  alt=""
                  srcset=""
                />
                <p class="fw-bold">Templates for every business</p>
              </div>
              <p class="Transparent_pricing">
                Tailor your success with our diverse collection of templates for
              </p>
              <p class="Transparent_pricing">
                every business, ensuring your unique vision comes to life
              </p>
              <p class="Transparent_pricing">effortlessly.</p>
            </div>
          </div>

          <div class="mt-4">
            <div>
              <div class="d-flex gap-4">
                <img
                  style="height: 23px; width: 23px"
                  src="images/check_logo.png"
                  alt=""
                  srcset=""
                />
                <p class="fw-bold">Supports Individuals & Businesses</p>
              </div>
              <p class="Transparent_pricing">
                Empowering individuals and businesses alike, our robust support
              </p>
              <p class="Transparent_pricing">
                system is tailored to meet your needs, ensuring success at every
              </p>
              <p class="Transparent_pricing">step of your journey.</p>
            </div>
          </div>
        </div>

        <!-- <div class="col-md-6 main-container">
          <img class="free_img" src="images/Group 115.png" alt="" srcset="" />
        </div> -->
        <div class="col-md-6">
          <img class="free_img" src="images/Group 115.png" alt="" srcset="" />
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row mt-5">
        <div class="col-md-6">
          <img class="free_img" src="images/Group 123.png" alt="" srcset="" />
        </div>

        <div class="col-md-6">
          <div class="mt-4">
            <div>
              <div class="d-flex gap-4">
                <img
                  style="height: 23px; width: 23px"
                  src="images/check_logo.png"
                  alt=""
                  srcset=""
                />
                <p class="fw-bold">Instant Activation</p>
              </div>
              <p class="Transparent_pricing">
                Transparent pricing with no hidden fees – because honesty builds
              </p>
              <p class="Transparent_pricing">
                trust. Your freelance journey starts here, with clarity at every
                step.
              </p>
            </div>
          </div>

          <div class="mt-4">
            <div>
              <div class="d-flex gap-4">
                <img
                  style="height: 23px; width: 23px"
                  src="images/check_logo.png"
                  alt=""
                  srcset=""
                />
                <p class="fw-bold">Apply Online</p>
              </div>
              <p class="Transparent_pricing">
                Tailor your success with our diverse collection of templates for
              </p>
              <p class="Transparent_pricing">
                every business, ensuring your unique vision comes to life
              </p>
              <p class="Transparent_pricing">effortlessly.</p>
            </div>
          </div>

          <div class="mt-4">
            <div>
              <div class="d-flex gap-4">
                <img
                  style="height: 23px; width: 23px"
                  src="images/check_logo.png"
                  alt=""
                  srcset=""
                />
                <p class="fw-bold">Simple Pricing</p>
              </div>
              <p class="Transparent_pricing">
                Empowering individuals and businesses alike, our robust support
              </p>
              <p class="Transparent_pricing">
                system is tailored to meet your needs, ensuring success at every
              </p>
              <p class="Transparent_pricing">step of your journey.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      id="usecase_background"
      style="background: rgba(6, 18, 55, 1); height: 415px; margin-top: 30px"
    >
      <p
        style="font-size: 35px; font-weight: 700"
        class="text-center text-light"
      >
        Use Cases
      </p>

      <div class="container d-flex mx-auto mt-2">
        <div class="row mt-1 mb-4 gap-2 mx-auto">
          <div class="col">
            <div
              id="ownership_mobile"
              class="card text-center"
              style="width: 17rem; height: 15rem"
            >
              <div class="card-body">
                <div class="d-flex justify-content-center gap-2 mt-3">
                  <img
                    style="height: 23px; width: 23px"
                    src="images/owner.png"
                    alt=""
                    srcset=""
                    id="images_small"
                  />
                  <h5 class="card-title">Ownership</h5>
                </div>
                <p style="font-size: 13px" class="card-text">
                  Get full visibility and control over your freelance
                  operations, while ensuring full compliance
                </p>
                <button
                  style="
                    background: rgba(6, 18, 55, 1);
                    color: white;
                    border-radius: 5px;
                    padding: 5px;
                  "
                >
                  Learn more <i class="bi bi-arrow-right"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div
              id="ownership_mobile"
              class="card text-center"
              style="width: 17rem; height: 15rem"
            >
              <div class="card-body">
                <div class="d-flex justify-content-center gap-2 mt-3">
                  <img
                    style="height: 23px; width: 23px"
                    src="images/owner.png"
                    alt=""
                    srcset=""
                    id="images_small"
                    
                  />
                  <h5 class="card-title">Ownership</h5>
                </div>
                <p style="font-size: 13px" class="card-text">
                  Get full visibility and control over your freelance
                  operations, while ensuring full compliance
                </p>
                <button
                  style="
                    background: rgba(6, 18, 55, 1);
                    color: white;
                    border-radius: 5px;
                    padding: 5px;
                  "
                >
                  Learn more <i class="bi bi-arrow-right"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div
              id="ownership_mobile"
              class="card text-center"
              style="width: 17rem; height: 15rem"
            >
              <div class="card-body">
                <div class="d-flex justify-content-center gap-2 mt-3">
                  <img
                    style="height: 23px; width: 23px"
                    src="images/owner.png"
                    alt=""
                    srcset=""
                    id="images_small"
                  />
                  <h5 class="card-title">Ownership</h5>
                </div>
                <p style="font-size: 13px" class="card-text">
                  Get full visibility and control over your freelance
                  operations, while ensuring full compliance
                </p>
                <button
                  style="
                    background: rgba(6, 18, 55, 1);
                    color: white;
                    border-radius: 5px;
                    padding: 5px;
                  "
                >
                  Learn more <i class="bi bi-arrow-right"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div
              id="ownership_mobile"
              class="card text-center"
              style="width: 17rem; height: 15rem"
            >
              <div class="card-body">
                <div class="d-flex justify-content-center gap-2 mt-3">
                  <img
                    style="height: 23px; width: 23px"
                    src="images/owner.png"
                    alt=""
                    srcset=""
                    id="images_small"
                  />
                  <h5 class="card-title">Ownership</h5>
                </div>
                <p style="font-size: 13px" class="card-text">
                  Get full visibility and control over your freelance
                  operations, while ensuring full compliance
                </p>
                <button
                  style="
                    background: rgba(6, 18, 55, 1);
                    color: white;
                    border-radius: 5px;
                    padding: 5px;
                  "
                >
                  Learn more <i class="bi bi-arrow-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div style="font-size: 35px; font-weight: 600" class="text-center mt-4">
      <i id="thoughts" style="color: blue">Our customers </i
      ><span id="thoughts">thoughts about us</span>
    </div>

    <div class="container mt-3">
      <div class="row mt-2 mx-5">
        <div class="col-md-3 mt-3">
          <div class="card" style="width: 18rem; border: none">
            <div
              style="background: rgba(13, 110, 253, 0.1)"
              class="card-body rounded"
            >
              <p class="card-text">
                “The biggest benefit of working with Sooprs is full budget
                visibility and flexible payment frequency, helping us align with
                business goals. We also have peace of mind with legal
                compliance, as Fiverr Enterprise takes care of hiring talent for
                us.”
              </p>
              <div class="d-flex gap-3">
                <img
                  src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                  class="rounded-circle"
                  style="width: 60px"
                  alt="Avatar"
                />
                <p class="mt-4 fw-bold">Video Creator</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 mt-3">
          <div class="card" style="width: 18rem; border: none">
            <div
              style="background: rgba(13, 110, 253, 0.1)"
              class="card-body rounded"
            >
              <p class="card-text">
                “The biggest benefit of working with Sooprs is full budget
                visibility and flexible payment frequency, helping us align with
                business goals. We also have peace of mind with legal
                compliance, as Fiverr Enterprise takes care of hiring talent for
                us.”
              </p>
              <div class="d-flex gap-3">
                <img
                  src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                  class="rounded-circle"
                  style="width: 60px"
                  alt="Avatar"
                />
                <p class="mt-4 fw-bold">Video Creator</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 mt-3">
          <div class="card" style="width: 18rem; border: none">
            <div
              style="background: rgba(13, 110, 253, 0.1)"
              class="card-body rounded"
            >
              <p class="card-text">
                “The biggest benefit of working with Sooprs is full budget
                visibility and flexible payment frequency, helping us align with
                business goals. We also have peace of mind with legal
                compliance, as Fiverr Enterprise takes care of hiring talent for
                us.”
              </p>
              <div class="d-flex gap-3">
                <img
                  src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                  class="rounded-circle"
                  style="width: 60px"
                  alt="Avatar"
                />
                <p class="mt-4 fw-bold">Video Creator</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 mt-3">
          <div class="card" style="width: 18rem; border: none">
            <div
              style="background: rgba(13, 110, 253, 0.1)"
              class="card-body rounded"
            >
              <p class="card-text">
                “The biggest benefit of working with Sooprs is full budget
                visibility and flexible payment frequency, helping us align with
                business goals. We also have peace of mind with legal
                compliance, as Fiverr Enterprise takes care of hiring talent for
                us.”
              </p>
              <div class="d-flex gap-3">
                <img
                  src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                  class="rounded-circle"
                  style="width: 60px"
                  alt="Avatar"
                />
                <p class="mt-4 fw-bold">Video Creator</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ------------------------------------------------------------------------------ -->

    <!-- footer -->
    <!-- 
    <div style="background: rgba(6, 18, 55, 1)">
      <div class="container row mt-5 mx-auto">
        <div class="col mt-5 mx-5">
          <img
            style="width: 200px"
            height="85px"
            src="images/sooprslogo.png"
            alt=""
            srcset=""
          />
          <div class="mx-3 mt-3">
            <img class="" src="images/message.png" alt="" srcset="" />
            <span
              style="font-size: 22px; font-weight: 600"
              class="text-light mx-2"
              >contact@sooprs.com</span
            >
          </div>
          <div class="d-flex justify-content-center gap-4 mt-4">
            <img
              style="width: 58px; height: 58px; cursor: pointer"
              src="images/instagram.png"
              alt=""
              srcset=""
            />
            <img
              style="width: 58px; height: 58px; cursor: pointer"
              src="images/twitter.png"
              alt=""
              srcset=""
            />
            <img
              style="width: 58px; height: 58px; cursor: pointer"
              src="images/youtube.png"
              alt=""
              srcset=""
            />
            <img
              style="width: 58px; height: 58px; cursor: pointer"
              src="images/facebook.png"
              alt=""
              srcset=""
            />
          </div>
        </div>
        <div class="col mt-5">
          <p style="font-size: 20px" class="fw-bold text-light">UseFul Links</p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            About Us
          </p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Contact Us
          </p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Blogs
          </p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Privacy Policy
          </p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Terms of Service
          </p>
        </div>
        <div class="col mt-5">
          <p style="font-size: 20px" class="fw-bold text-light">UseFul Links</p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Internet of Things
          </p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Artificial Intelligence
          </p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Virtual Reality
          </p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Augmented Reality
          </p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Machine Learning
          </p>
        </div>
        <div class="col mt-5">
          <p style="font-size: 20px" class="fw-bold text-light">Latest Tech</p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Web Development
          </p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Mobile App Development
          </p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Digital Marketing
          </p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Graphic Designing
          </p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Application Designing
          </p>
        </div>
        <div class="col mt-5">
          <p style="font-size: 20px" class="fw-bold text-light">UseFul Links</p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            About Us
          </p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Contact Us
          </p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Blogs
          </p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Privacy Policy
          </p>
          <p style="font-size: 17px; font-weight: 300" class="text-light">
            Terms of Service
          </p>
        </div>
        <hr class="container mt-5" style="color: white" , width="100%" />

        <div class="d-flex justify-content-between">
          <div>
            <p class="text-light">
              Made with
              <span><img src="images/Vector.png" alt="" srcset="" /></span>
              India
            </p>
          </div>
          <img
            style="width: 80px; height: 40px"
            src="images/dmca.png"
            alt=""
            srcset=""
          />
          <div>
            <p style="font-size: 17px" class="text-light fw-500">
              Sooprs.com. © 2023. All Rights Reserved
            </p>
          </div>
        </div>
      </div>
    </div> -->

    <?php include "./footer.php" ?>