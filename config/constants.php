<?php 
    //Start Session
    session_start();

    //Create Constants to Store non repeating values
    define('SITEURL', 'http://localhost/food-order/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food-order');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Databe Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selection Database

    
?>