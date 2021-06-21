<?php
 session_start();
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

// Define variables from previous forms
 $lid = $_POST["lid"];
 $uid = $_SESSION['id'];
$sql="
INSERT INTO review (description, datePosted, uid)
VALUES ('$_POST[description]', '$_POST[date]', $uid);";
 if (!mysqli_query($con,$sql))
 {
 	$sql2="
 	UPDATE review
 	SET description = '$_POST[description]', datePosted = '$_POST[date]'
 	WHERE uid = '$uid' AND rid = (SELECT rid FROM has
 									WHERE lid = '$lid');";

 	if (!mysqli_query($con,$sql2)) {
 	die('Error: ' . mysqli_error($con));
 }
 }
$sql2="
INSERT INTO has (rid, lid)
VALUES (LAST_INSERT_ID(), $lid);";
if (!mysqli_query($con,$sql2))
 {
 	die('Error: ' . mysqli_error($con));
 }
 echo "1 record added"; // Output to user
 mysqli_close($con);
 header('Location: locationView.php');
?>
