<?php
 
require_once 'actions/db_connect.php';
 
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT * FROM events WHERE id = {$id}";
    $result = $connect->query($sql);
 
    $data = $result->fetch_assoc();
 
    $connect->close();
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Edit Event</title>
 
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 50%;
        }
 
        table tr th {
            padding-top: 20px;
        }
    </style>
 
</head>
<body>
 
<fieldset>
    <legend>Update Event</legend>
 
    <form action="actions/a_update.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Event's name</th>
                <td><input type="text" name="events_name" value="<?php echo $data['events_name']; ?>" /></td>
            </tr>     
            <tr>
                <th>Event’s date and time</th>
                <td><input type="text" name="events_date_and_time" value="<?php echo $data['events_date_and_time']; ?>" /></td>
            </tr>
            <tr>
                <th>Event’s description</th>
                <td><input type="text" name="events_description" value="<?php echo $data['events_description']; ?>" /></td>
            </tr>
            <tr>
                <th>Event’s image</th>
                <td><input type="text" name="events_image" value="<?php echo $data['events_image']; ?>" /></td>
            </tr>
            <tr>
                <th>Event’s capacity</th>
                <td><input type="text" name="events_capacity" value="<?php echo $data['events_capacity']; ?>" /></td>
            </tr>
            <tr>
                <th>Event’s contact e-mail</th>
                <td><input type="text" name="events_contact_e_mail" value="<?php echo $data['events_contact_e_mail']; ?>" /></td>
            </tr>
            <tr>
                <th>Event’s contact phone number</th>
                <td><input type="text" name="events_contact_phone_number" value="<?php echo $data['events_contact_phone_number']; ?>" /></td>
            </tr>
            <tr>
                <th>Event’s address</th>
                <td><input type="text" name="events_address" value="<?php echo $data['events_address']; ?>" /></td>
            </tr>
            <tr>
                <th>Event’s URL</th>
                <td><input type="text" name="events_url" value="<?php echo $data['events_url']; ?>" /></td>
            </tr>
            <tr>
                <th>Event’s Type</th>
                <td><input type="text" name="events_type" value="<?php echo $data['events_type']; ?>" /></td>
            </tr>

            <tr>
                <input type="hidden" name="id" value="<?php echo $data['id'];?>" />
                <td><button type="submit">Save Changes</button></td>
                <td><a href="index.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
 
</body>
</html>
 
<?php
}
?>