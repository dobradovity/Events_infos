<?php
 // this will avoid mysql_connect() deprecation error.
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );


 define('DBHOST', 'localhost');
 define('DBUSER', 'root');
 define('DBPASS', 'root');
 define('DBNAME', 'cr14_dragan_obradovity_bigevents_new');

 $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

 if ( !$conn ) {
  die("Connection failed : " . mysqli_error());
 }


 ?>
