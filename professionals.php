<?php include 'sentMail.php';?>



<?php 

    $title = 'Sooprs Professionals page';

    $description = "Description";

    $keywords = "key,words";

?>

<?php include "./header2.php" ?>



<style>

ul {

  list-style-type: none;

  margin: 0;

  padding: 0;

}



li {

  display: flex;

  align-items: center;

  margin-bottom: 20px;

  border-bottom: 1px solid #ccc;

  padding-bottom: 20px;

}



li:last-child {

  border-bottom: none;

}



img {

  max-width: 200px;

  margin-right: 20px;

}



h3 {

  margin-top: 0;

  margin-bottom: 10px;

}



p {

  margin-top: 0;

  margin-bottom: 20px;

}



.button-container {

  display: flex;

}



.button {

  display: inline-block;

  background-color: #4CAF50;

  color: white;

  padding: 8px 16px;

  text-align: center;

  text-decoration: none;

  margin-right: 10px;

  border-radius: 4px;

}



.button:hover {

  background-color: #3e8e41;

}



</style>



<ul>

  <li>

    <img src="https://sooprs.com/assets/img/images/profile-pic.png" alt="Item 1">

    <div>

      <h3>Item 1</h3>

      <p>Description of Item 1.</p>

      <div class="button-container">

        <a href="#" class="button">Button 1</a>

        <a href="#" class="button">Button 2</a>

      </div>

    </div>

  </li>

  <li>

    <img src="https://sooprs.com/assets/img/images/profile-pic.png" alt="Item 2">

    <div>

      <h3>Item 2</h3>

      <p>Description of Item 2.</p>

      <div class="button-container">

        <a href="#" class="button">Button 1</a>

        <a href="#" class="button">Button 2</a>

      </div>

    </div>

  </li>

  <li>

    <img src="https://sooprs.com/assets/img/images/profile-pic.png" alt="Item 3">

    <div>

      <h3>Item 3</h3>

      <p>Description of Item 3.</p>

      <div class="button-container">

        <a href="#" class="button">Button 1</a>

        <a href="#" class="button">Button 2</a>

      </div>

    </div>

  </li>

</ul>





<?php include "./footer.php" ?>