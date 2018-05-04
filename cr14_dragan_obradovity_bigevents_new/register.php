
<?php
 ob_start();
 session_start(); // start a new session or continues the previous
 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php"); // redirects to home.php
 }
 include_once 'db_connect.php';
 $error = false;
 if ( isset($_POST['btn-signup']) ) {

  // sanitize user input to prevent sql injection
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }

  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check whether the email exist or not
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 3) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }

  // password encrypt using SHA256();
  $password = hash('sha256', $pass);

  // if there's no error, continue to signup
  if( !$error ) {

   $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
   $res = mysqli_query($conn, $query);

   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later...";
   }

  }


 }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up / Registration</title>
  
    <style>
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

      .btn:hover {
          background-color: #3e8e41
      }

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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

      <h2>Sign Up</h2>
      <hr/>

      <?php
        if ( isset($errMSG) ) {

      ?>
      <div class="alert">

        <?php echo $errMSG; ?>
      </div>

      <?php
        }
      ?>




      <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />

      <span class="text-danger"><?php echo $nameError; ?></span>

      <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />

      <span class="text-danger"><?php echo $emailError; ?></span>

      <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />

      <span class="text-danger"><?php echo $passError; ?></span>
      <hr/>

      <button type="submit" class="btn" name="btn-signup">Sign Up</button>
      <hr/>

      <a href="login1.php">Sign in Here...</a>


    </form>
  </body>
</html>
<?php ob_end_flush(); ?>
