<?php
session_start();
include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 $result = mysqli_query($con,"SELECT * FROM dateIdea");
?>
<!DOCTYPE html>
<html>
 <head>
        <title>Profile</title>
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
  $("#nav-placeholder").load("base.html");
});
</script>
<!--end of Navigation bar-->

<body>
<div class="jumbotron text-center">
    <h1>Check Out These Date Ideas!</h1>
</div>
  <div class="container">
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table>
  
  <tr>
    <td><strong>Idea Name</strong></td>
    <td><strong>Idea Description</strong></td>
    <td><strong>Date Visited</strong></td>
    <td><strong>Rating</strong></td>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["ideaTitle"]; ?></td>
    <td><?php echo $row["description"]; ?></td>
    <td><?php echo $row["dateVisited"]; ?></td>
    <td><?php echo '<a href="ratingForm.php?did=' . $row["did"] . '&title=' . $row["ideaTitle"] . '">' . $row["rating"] . '</a>';?></td>
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
			<a href="home.html"><button type="button" class="btn btn-secondary">Return to Home</button></a>
		</div>
</html>