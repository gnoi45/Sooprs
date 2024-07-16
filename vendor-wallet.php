<?php

session_start();
include_once 'function.php';

if (!isset($_SESSION['id']) || !$_SESSION['id'] || $_SESSION['loggedin'] != true) {
    $url = 'login-professional';
    header('Location: ' . $url);
    exit();
}

$title = 'About Us ';
$description = "Description";
$keywords = "key,words";


include "./header2.php";

?>


<style>
    .wallet-amount {

        font-size: 40px;

        font-weight: 600;

    }
</style>



<section class="top-section text-center" style="background-color: #e0e0e0;padding: 130px 0 100px 0;">

    <div class="container">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 ">

                <p class="wallet-amount">&#x20B9; 2999</p>

                <button class="btn btn-outline-primary">

                    Add Balance

                </button>

            </div>

        </div>

    </div>



</section>



<section>

    <div class="container">

        <table id="myTable" class="display">

            <thead>

                <tr>



                    <th>Transaction Id</th>

                    <th>Date</th>

                    <th>Transaction Type</th>

                    <th>Amount</th>

                </tr>

            </thead>

            <tbody>

                <tr>



                    <td>HDHJEFH3Y7589JR89T</td>

                    <td>20-04-23</td>

                    <td>Credit</td>

                    <td>500</td>

                </tr>

                <tr>

                    <td>SAN8495JHGJ894UT</td>

                    <td>20-04-23</td>

                    <td>Debit</td>

                    <td>100</td>

                </tr>

            </tbody>

        </table>

    </div>

</section>







<script>

    $(document).ready(function () {

        $('#myTable').DataTable({



        });

    });

</script>





<?php include "./footer.php" ?>