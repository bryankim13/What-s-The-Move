<?php
session_start();
include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 $lid = $_GET['lid'];
 $result = mysqli_query($con,"SELECT * FROM has NATURAL JOIN review WHERE lid = '$lid'");
 $lname = $_GET['lname'];
 $description = $_GET['description'];
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Reviews </title>
 <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
 <style>
     table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;

    }

    tr:nth-child(even) {
        background-color: white;
    }
 </style>
   <!--Navigation bar-->
<div id="nav-placeholder">

</div>

<script>
$(function(){
  $("#nav-placeholder").load("base.html");
});
</script>
<!--end of Navigation bar-->

 </head>
<body>
  <div class="jumbotron text-center">
  <h1> <?php echo "Reviews for {$lname}" ?> </h1>
  <p> <?php echo "{$description}"?></p>
</div>
<div class="container">
  <center>
  <h1>Reviews</h1>
  <br></br>
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table>
  
  <tr>
    <td><strong>Review</strong></td>
    <td><strong>Date Reviewed</strong></td>
  </tr>
<?php

while($row = mysqli_fetch_array($result)) {
?>
<tr>
     <td><?php echo $row["description"];?></td>
     <td><?php echo $row["datePosted"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
  <center>
 <?php
}
else{
    echo "No reviews found";
}
?>
<br>
<br>
<p><?php echo '<button type="button" class="btn btn-light"><a href="reviewForm.php?lid=' . $lid . '"><strong>Leave a review!</strong></a></button>'?></p>
</center>
</div>
 </body>
 <div class="back" style="text-align:center">
			<a href="home.html"><button type="button" class="btn btn-secondary">Return to Home</button></a>
      <a href="locationView.php"><button type="button" class="btn btn-secondary">Return To Locations</button></a>
		</div>
</html>