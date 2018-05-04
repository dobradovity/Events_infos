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
 
    $id = $_POST['id'];
 
    $sql = "UPDATE events SET events_name = '$ename', events_date_and_time = '$edate', events_description = '$edesc', events_image = '$eimg', events_capacity = '$ecapacity', events_contact_e_mail = '$email', events_contact_phone_number = '$ephone', events_address = '$eaddress', events_url = '$eurl', events_type = '$etype' WHERE id = {$id}";
    if($connect->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../update.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
        echo "Erorr while updating record : ". $connect->error;
    }
 
    $connect->close();
 
}
 
?>