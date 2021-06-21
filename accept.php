<?php
 session_start();
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 $liid = $_GET['liid'];
 $lname = $_GET['lname'];
 $setting = $_GET['setting'];
 $activity = $_GET['activity'];
 $address = $_GET['address'];
 $price = $_GET['price'];
 $desc = $_GET['description'];
 // Form the SQL query (an INSERT query)
 $sql="INSERT INTO location (lname, setting, activity, address, price, description)
 VALUES 
 ('$lname', '$setting', '$activity', '$address', '$price', '$desc');";
$sql2="DELETE FROM locationIdea WHERE liid = $liid";

 if (!mysqli_query($con,$sql))
 {
 die('Error: ' . mysqli_error($con));
 }
 if (!mysqli_query($con,$sql2)) 
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "1 record added"; // Output to user
 mysqli_close($con);
 header('Location: approval.php');
?>