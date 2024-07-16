<?php
session_start();
session_unset();
session_destroy();
setcookie('user_logged_in', false, time() - 3600, "/");
include_once 'env.php';

header("location: $SITE_URL");
exit;
?>