<?php
 ob_start();
 session_start();
 require_once 'db_connect.php';

 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
 }

 $error = false;

 if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs

  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }

  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }

  // if there's no error, continue to login
  if (!$error) {

   $password = hash('sha256', $pass); // password hashing using SHA256

   $res=mysqli_query($conn, "SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
   $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

   if( $count == 1 && $row['userPass']==$password && $email=="admin@admin.com") {
    $_SESSION['user'] = $row['userId'];
    header("Location: index.php");
   }

   else if( $count == 1 && $row['userPass']==$password ) {
    $_SESSION['user'] = $row['userId'];
    header("Location: home.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }

  }

 }
 ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Login</title>
		<link rel="stylesheet" href="style.css">
		<style>
			*{
				margin: 0px;
				padding: 0px;
				}

			body{
				font-size: 120%;
				background: #F8F8FF;
				background-image: url('img/login2.jpg');
			}

			.header{
				width: 50%;
				margin: 50px auto 0px;
				color: ;
				text-shadow: 3px 1px #3399ff;
				background: #ccc;
				text-align: center;
				border: 1px solid #B0C4DE;
				border-bottom: none;
				border-radius: 10px 10px 20px 20px;
				padding: 20px;
			}

			form, .content {
				width: 45%;
				margin: 0px auto;
				padding: 20px;
				border: 1px solid #B0C4DE;
				background: gray;
				border-radius: 0px 0px 10px 10px;
			}

			.input-group {
				margin: 10px 0px 10px 0px;

			}

			.input-group label {
				display: block;
				text-align: left;
				margin: 3px;
			}

			.input-group input{
				height: 30px;
				width: 93%;
				padding: 5px 10px;
				font-size: 16px;
				border-radius: 5px;
				border: 1px solid gray;
			}

			.btn{
				padding: 10px;
				font-size: 15px;
				color: white;
				background: #3399ff;
				border: none;
				border-radius: 5px;
			}

			.btn:hover {background-color: #3e8e41}

			.btn:active {
			  background-color: #3e8e41;
			  box-shadow: 0 5px #666;
			  transform: translateY(4px);
			  color: blue;
			}

			.error{
				width: 92%;
				margin: 0px auto;
				padding: 10px;
				border: 1px solid #a94442;
				color: #a94442;
				border-radius: 5px;
				text-align: left;	
			}

			.success {
				color: #3c763d;
				background: #dff0d8;
				border: 1px solid #3c763d;
				margin-bottom: 20px;
			}

					
		</style>
	
	</head>
	<body>
		<div class="header">
			<h2>Login</h2>
			
		</div>


		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
			<!-- display validation errors here-->
			  

		    <?php
		   		if ( isset($errMSG) ) {
					echo $errMSG; 
			?>  

		    <?php
		   		}
		   	?>
				
			<div class="input-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
				<span class="text-danger"><?php echo $emailError; ?></span>
			</div>

			<div class="input-group">
				<label>Password</label>
				<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
		        <span class="text-danger"><?php echo $passError; ?></span>
			</div>
			<div align="center" class="input-group">
				<button type="submit" name="btn-login" class="btn">Sign In</button>
			</div>
				<a href="register.php">Sign Up Here...</a>
				<p>
					Back to <a href="home.php">Homepage</a>
				</p>
		</form>
	</body>
</html>