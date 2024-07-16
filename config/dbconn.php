<?php 

// $host = "localhost";
// $username = "root";
// $password = "Sandy@3105";
// $database = "sooprs";

$host = "localhost";
$username = "shopndto_sooprs_secure";
$password = "x1.@EX)2BQ!7";
$database = "shopndto_sooprsdev";

// $con = mysqli_connect("$host", "$username", "$password", "$database");
$con = mysqli_connect("$host", "$username", "$password", "$database");


if(!$con){
    echo "Connection problem";
    die();
}
   
?>