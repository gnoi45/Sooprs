<?php
session_start();
include_once "function.php";
$_SESSION['loggedin'] = false;

if (isset($_SESSION['id'])) {
    $url = 'index';
    header('Location: ' . $url);
    exit();
}


$userCredentials = new DB_con();
$error2 = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);
    //Check if input Field are empty
    if (!$email) {
        $error2 .= "Email is required <br>";
    }
    if (!$password) {
        $error2 .= "Password is required <br>";
    }
    if ($error2) {
        $error2 = "<b>There were error(s) in your form!</b><br>" . $error2;
    } else {
        $table = "customer";
        $signinRes = $userCredentials->signin($email, $password, $table);
        if ($signinRes == 1) {
            // $login = true;              
            // session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $userCredentials->idUser();
            // $_SESSION['name'] = $userCredentials->nameUser();         
            $url = 'index';
            header('Location: ' . $url); // Use header() function to redirect and prevent XSS attacks
            exit(); // Always exit after a redirect
        } elseif ($signinRes == 10) {
            $input_email = $email;
            $input_pass = $password;
            echo "<script>alert('Invalid details. Please try again');</script>";
        }
    }
}


$title = 'Customer Login ';
$description = "Description";
$keywords = "key,words";
?>

<?php include "./header2.php" ?>


<!-- Log In Form Section -->

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
</section>


<?php include "./footer.php" ?>

