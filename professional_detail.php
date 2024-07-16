<?php include 'sentMail.php';?>



<?php 

    $title = 'Sooprs Professionals page';

    $description = "Description";

    $keywords = "key,words";

?>

<?php include "./header2.php" ?>



<style>

.blog-detail {

  max-width: 800px;

  margin: 0 auto;

}



img {

  max-width: 100%;

  height: auto;

}



h1 {

  font-size: 36px;

  margin-top: 20px;

  margin-bottom: 10px;

}



.description {

  font-size: 18px;

  margin-top: 0;

  margin-bottom: 20px;

}



h2 {

  font-size: 24px;

  margin-top: 40px;

  margin-bottom: 20px;

}



.review-header {

  display: flex;

  justify-content: space-between;

}



.review-header h3 {

  margin-top: 0;

  margin-bottom: 10px;

}



.review-header p {

  margin-top: 0;

  margin-bottom: 10px;

  font-size: 14px;

  color: #999;

}



.review-content {

  margin-top: 0;

  margin-bottom: 20px;

  font-size: 18px;

}



</style>



<div class="blog-detail">

  <img src="https://sooprs.com/assets/img/images/profile-pic.png" alt="Blog Title">

  <h1>Blog Title</h1>

  <p class="description">Description of the blog post goes here.</p>

  <h2>Reviews</h2>

  <ul class="reviews">

    <li>

      <div class="review-header">

        <h3>Reviewer Name</h3>

        <p>Review Date</p>

      </div>

      <p class="review-content">Review content goes here.</p>

    </li>

    <li>

      <div class="review-header">

        <h3>Reviewer Name</h3>

        <p>Review Date</p>

      </div>

      <p class="review-content">Review content goes here.</p>

    </li>

  </ul>

</div>





<?php include "./footer.php" ?>