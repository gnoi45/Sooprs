<?php
//Class DbConnect
class DbConnect
{
    //Variable to store database link
    private $con;
 
    //Class constructor
    function __construct()
    {
 
    }
 
    //This method will connect to the database
    function connect()
    {
        //Including the constants.php file to get the database constants
        //include_once dirname(__FILE__) . '/Constants.php';
 
        //connecting to mysql database
        $this->con = new mysqli('localhost', 'umjca', '6M22UyKe8Jk(', 'umjca');
 
        //Checking if any error occured while connecting
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
 
        //finally returning the connection link 
        return $this->con;
    }

    function localhostconnect()
    {
        //Including the constants.php file to get the database constants
        //include_once dirname(__FILE__) . '/Constants.php';
 
        //connecting to mysql database
        // $this->con = new mysqli('localhost', 'root', '', 'sooprs');
        // $this->con = new mysqli('localhost', 'shopndto_sooprs_secure', 'x1.@EX)2BQ!7', 'shopndto_sooprsdev_test');
        $this->con = new mysqli('localhost', 'shopndto_sooprs_secure', 'x1.@EX)2BQ!7', 'shopndto_sooprsdev');


 
        //Checking if any error occured while connecting
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
 
        //finally returning the connection link 
        return $this->con;
    }
 
}

?>