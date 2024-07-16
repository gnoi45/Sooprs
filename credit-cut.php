<?php
session_start();


if (!$_SESSION['id'] || $_SESSION['loggedin'] != true) {
    $url = 'login-professional';
    header('Location: ' . $url);
    exit();
}


include_once 'function.php';
include('config/dbconn.php');


$site_url = "//{$_SERVER['HTTP_HOST']}/";

$escaped_url = htmlspecialchars($site_url, ENT_QUOTES, 'UTF-8');
// echo '<a href="' . $escaped_url . '">' . $escaped_url . '</a>';

$credit_cut = new DB_con();

$credits = $credit_cut->cutCredits($_SESSION['id']);

print_r($credits);
die();

?>