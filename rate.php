
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
 $did = $_POST["did"];
 $uid = $_SESSION['id'];
$sql="
INSERT INTO rates (uid, did, rating)
VALUES ('$uid', '$did', '$_POST[rating]');";
 if (!mysqli_query($con,$sql))
 {
 	$sql3="
 	UPDATE rates
 	SET rating = '$_POST[rating]'
 	WHERE uid = '$uid' AND did = '$did';";
	if (!mysqli_query($con,$sql3)){
 		die('Error: ' . mysqli_error($con));
 		}
 	}
 $sql2="
 UPDATE dateIdea
 SET rating = (SELECT AVG(rating)
 				FROM rates
 				WHERE did = '$did')
 WHERE did = '$did';";
// -- SET rating = (SELECT AVG(t.rating)
// -- 			  FROM 
// -- 			  	(SELECT DISTINCT uid, rating
// -- 			  	FROM dateIdeaRatings
// -- 			  	WHERE did = '$did') as t)
// --WHERE did = '$did'";
 if (!mysqli_query($con,$sql2))
 {
 die('Error: ' . mysqli_error($con));
 }

 echo "1 record added"; // Output to user
 mysqli_close($con);
 header('Location: dateView.php');
?>
