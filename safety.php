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
<link rel="stylesheet" href="<?php echo $SITE_URL ?>/assets/css/safety.css" />
    <div class="main-container">
        <video src="<?php echo $SITE_URL ?>/assets/images/animation.mp4" loop autoplay muted class="img-fluid w-100">
        </video>
        <div class="centered">
            <h6>Safety, Trust & Connections</h6>
            <p>Countless Opportunities. Countless Connections. Your Security an
              Well-being are Always at the Forefront.</p>
        </div>
    </div>  

    <div class="safety-shield mt-5 mb-5 pt-2 pb-3">
      <p>Our <strong>3 shields</strong> for your security and safety</p>

     
        <div class="container d-flex">
          <div class="row mt-2">
            <div class="col-md-4">
              <div class="d-flex">
                <img style="width: 92px;" src="<?php echo $SITE_URL ?>/assets/images/shields.png" alt="" srcset="">
                <div class="data_encryption">
                  <h5>Data encryption</h5>
                  <p>We secure data in transit with HTTPS
                    and enforce HSTS to prevent attacks,
                    eavesdropping, and session hijacking.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="d-flex">
                <img src="<?php echo $SITE_URL ?>/assets/images/shields2.png" alt="" srcset="">
                <div class="data_encryption">
                  <h5>Single Sign-on</h5>
                  <p>We secure data in transit with HTTPS
                    and enforce HSTS to prevent attacks,
                    eavesdropping, and session hijacking.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="d-flex">
                <img src="<?php echo $SITE_URL ?>/assets/images/shield3.png" alt="" srcset="">
                <div class="data_encryption">
                  <h5>Secured PaymentGuarantee</h5>
                  <p>We secure data in transit with HTTPS
                    and enforce HSTS to prevent attacks,
                    eavesdropping, and session hijacking.</p>
                </div>
              </imgsrc="images>
            </div>
          
          </div>
        </div>
      </div>
  </div>

  <div>
    <div class="mt-5 mb">
      <img class="w-100" src="<?php echo $SITE_URL ?>/assets/images/Group 288.png" alt="" srcset="">
    </div>
  </div>

  <div class="without_Hitch mt-5 mb-4">
      <h5>Purchase and Sell <strong>Without a Hitch!</strong></h5>
      <div class="Safeguarding mt-2 mb-3">
        <p class="m-0">Safeguarding millions of transactions, Sooprs employs cutting-edge anti-fraud and data security technologies to ensure</p>
        <p>the utmost protection for your transactions and sensitive information.</p>
      </div>
  </div>


   
      <div class="lock_images mb-5 container-fluid">
        <div class="row mt-1">
          <div class="col-md-4 mt-2">
            <div class="Identify_verification">
              <img src="<?php echo $SITE_URL ?>/assets/images/lockId.png" alt="" srcset="">
              <h5>Identity Verification</h5>
              <p>"Sooprs prioritizes your privacy. Rest assured, your data is always secure, and we commit to never disclose your personal information to third parties."</p>
            </div>
          </div>
          <div class="col-md-4 mt-2">
            <div class="safe_payment">
              <img src="<?php echo $SITE_URL ?>/assets/images/lock_personalD.png" alt="" srcset="">
              <h5>Safe Payments</h5>
              <p>"Sooprs prioritizes your privacy. Rest assured, your data is always secure, and we commit to never disclose your personal information to third parties."</p>
            </div>
          </div>
          <div class="col-md-4 mt-2">
            <div class="Encrypted_communication">
              <img src="<?php echo $SITE_URL ?>/assets/images/lock_message.png" alt="" srcset="">
              <h5>Encrypted Communication</h5>
              <p>"Sooprs prioritizes your privacy. Rest assured, your data is always secure, and we commit to never disclose your personal information to third parties."</p>
            </div>        
        </div>
      </div>
      </div>


      <?php include "./footer.php" ?>
