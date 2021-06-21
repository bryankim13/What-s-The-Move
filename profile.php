<?php
 session_start();
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 // Form the SQL query (an INSERT query)
 $sql="INSERT INTO user (firstName, lastName, uid)
 VALUES
 ('$_POST[firstName]','$_POST[lastName]', $_SESSION[id])";

 if (!mysqli_query($con,$sql))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo $_SESSION['id']; // Output to user

 mysqli_close($con);
 header('Location: prefForm.html');


?>

