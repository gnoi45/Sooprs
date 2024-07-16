<?php


$title = 'Customer Login ';
$description = "Description";
$keywords = "key,words";
?>

<?php include "./header2.php" ?>

<style>
    .form-box {
        padding: 30px;
        background: white;
        border: 1px solid #cbcbcb;
        /* box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; */
    }

    .error {
        background-color: pink;
        color: red;
        width: 300px;
        margin: 0 auto;
    }

    .devicer {
        width: 8em;
        display: block;
        height: 1px;
        background-color: #aeaeae;
        margin: 5px auto 0;
    }

    #target {
        /* background: #0099cc; */
        width: auto;
        height: 300px;
        height: 125px;
        padding: 5px;
        display: none;
    }

    .Hide {
        display: none;
    }
</style>


<section class=" top-sectop " style="    background-color: #e0e0e0;padding: 130px 0 100px 0;">
    <div class="container">
    <?php 
        
        require ('connection.php');

        if (isset($_GET['email']) && isset($_GET['reset_token'])) {

            date_default_timezone_set('Asia/kolkata');
            $date = date("Y-m-d");
            
            $email = $_GET['email'];    
            $reset_token = $_GET['reset_token'];

            $sql="SELECT * FROM users WHERE email = '$email' AND resettoken = '$reset_token' AND resettokenexp = '$date'";
            $result = $conn->query($sql);

            if ($result) {
                
                if ($result->num_rows == 1) {
                    echo '
                        <div class="container d-flex justify-content-center mt-5 pt-5">
                            <div class="card mt-5" style="width:500px">
                                <div class="card-header">
                                    <h1 class="text-center">Creat New Password</h1>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="mt-2">
                                            <label for="Password">Password : </label>
                                            <input type="password" name="Password" class="form-control" placeholder="Creat New Password">
                                            <input type="hidden" name="email" class="form-control" value='.$email.'>
                                        </div>
                                        <div class="mt-4 text-end">
                                            <input type="submit" name="update" value="update" class="btn btn-primary">
                                            <a href="index.php" class="btn btn-danger">Back</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>';
                }else{
                    echo "
                        <script>
                            alert('invelid or Expired link');
                            window.location.href='index.php'
                        </script>";
                }
            }   
        
        }else{
            echo "
                <script>
                    alert('server down!!');
                    window.location.href='index.php'
                </script>";
        }
        
        if (isset($_POST['update'])) {
            $pass = $_POST['Password'];
            echo $pass;
            $email = $_POST['email'];
            echo $email;

            $update = "UPDATE users SET password='$pass',resettoken='NULL',resettokenexp=NULL WHERE email = '$email'";

            if ($conn->query($update)===TRUE) {
                echo "
                    <script>
                        alert('New Password Created Successfully');
                        window.location.href='index.php'                
                        </script>"; 
            }else{
                echo "Error: ".$sql."<br>".$conn->error;
                echo "
                    <script>
                    alert('Password not updated');
                    window.location.href='index.php'                     
                    </script>";
            }
        } 
    ?>
    </div>
    </div>
</section>


<?php include "./footer.php" ?>