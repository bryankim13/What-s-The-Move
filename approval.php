<?php
session_start();
include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 $result = mysqli_query($con,"SELECT * FROM locationIdea");
?>
<!DOCTYPE html>
<html>
 <head>
        <title>Location</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
 <title> Dates</title>
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
 
 </head>
 <!--Navigation bar-->
<div id="nav-placeholder">

</div>

<script>
$(function(){
  $("#nav-placeholder").load("base2.html");
});
</script>
<!--end of Navigation bar-->

<body>
  <div class="jumbotron text-center">
    <h1> Approval for Location Suggestions </h1>
    <p> Approve location suggestions to be seen by the public </p>
</div>
  <div class="container">
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table>
  
  <tr>
    <td><strong>Location<strong></td>
    <td><strong>Setting<strong></td>
    <td><strong>Activity<strong></td>
    <td><strong>Address<strong></td>
    <td><strong>Price<strong></td>
    <td><strong>Description<strong></td>
    <td><strong>Pending<strong></td>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["lname"]; ?></td>
    <td><?php echo $row["setting"]; ?></td>
    <td><?php echo $row["activity"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
    <td><?php echo $row["price"]; ?></td>
    <td><?php echo $row["description"]; ?></td>
    <td><?php echo '<a href="accept.php?liid=' . $row["liid"] . '&lname=' . $row["lname"] . '&setting=' . $row["setting"] . '&activity=' . $row["activity"] . '&address=' . $row["address"] . '&price=' . $row["price"] . '&description=' . $row["description"] . '"> Approve </a>';?></td>
</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
</div>
 </body>
 <br>
 <div class="back" style="text-align:center">
			<a href="logout.php"><button type="button" class="btn btn-secondary">Log Out</button></a>
		</div>
</html>