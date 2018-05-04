<?php
 
require_once 'db_connect.php';
 
if($_POST) {
    $ename = $_POST['events_name'];
    $edate = $_POST['events_date_and_time'];
    $edesc = $_POST['events_description'];
    $eimg = $_POST['events_image'];
    $ecapacity = $_POST['events_capacity'];
    $email = $_POST['events_contact_e_mail'];
    $ephone = $_POST['events_contact_phone_number'];
    $eaddress = $_POST['events_address'];
    $eurl = $_POST['events_url'];
    $etype = $_POST['events_type'];
    
  
 
    $sql = "INSERT INTO events (events_name, 
                                events_date_and_time, 
                                events_description, 
                                events_image, 
                                events_capacity, 
                                events_contact_e_mail, 
                                events_contact_phone_number, 
                                events_address, 
                                events_url, 
                                events_type) VALUES ('$ename', 
                                                     '$edate', 
                                                     '$edesc',
                                                     '$eimg', 
                                                     '$ecapacity', 
                                                     '$email', 
                                                     '$ephone', 
                                                     '$eaddress', 
                                                     '$eurl', 
                                                     '$etype')";
    if($connect->query($sql) === TRUE) {
        echo "<p>New Record Successfully Created</p>";
        echo "<a href='../create.php'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }
 
    $connect->close();
}
 
?>