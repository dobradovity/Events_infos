
<?php
 
$localhost = "localhost";
$username = "root";
$password = "root";
$dbname = "cr14_dragan_obradovity_bigevents_new";
 
// create connection
$connect = new mysqli($localhost, $username, $password, $dbname);
 
// check connection
// log user in from login page

	if (isset($_POST['login'])) {
		$username = $db->real_escape_string($_POST['username']);
		$password = $db->real_escape_string($_POST['password']);

		//echo $username;
		//echo $password;

		// ensure that form are filled  filled properly
		if (empty($username)) {
			array_push($errors,"Username is required"); // add error to errors array
			
		}
		if (empty($password)) {
			array_push($errors,"Password is required"); // add error to errors array
			
		}
		if (count($errors) == 0) {
			$password = md5($password); // encrypt password before comparing with that from database
			$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
			$result = mysqli_query($db, $query);
			if (mysqli_num_rows($result) ==1) {
				// log user in
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php'); // redirect to home page
			}else{
				array_push($errors, "wrong username/password combination");
				
			}
		}
		
	}


	// logout

	if (isset($_GET['logout'])) {

		session_destroy();





		unset($_SESSION['username']);
		header('location: login1.php');
	}
else {
    // echo "Successfully Connected";
}
 
?>



	