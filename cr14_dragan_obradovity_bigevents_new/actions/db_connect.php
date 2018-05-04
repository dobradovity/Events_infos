<?php
 
$localhost = "localhost";
$username = "root";
$password = "root";
$dbname = "cr14_dragan_obradovity_bigevents_new";
 
// create connection
$connect = new mysqli($localhost, $username, $password, $dbname);
 
// check connection
if($connect->connect_error) {
    die("connection failed: " . $connect->connect_error);
} else {
    // echo "Successfully Connected";
}
 
?>