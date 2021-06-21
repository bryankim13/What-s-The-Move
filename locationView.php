<?php
session_start();
include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 // $result = mysqli_query($con,"SELECT * FROM location");
 $primer = mysqli_query($con,"SELECT setting, activity, price FROM userPref WHERE uid = $_SESSION[id];");
 $i=0;
while($row = mysqli_fetch_array($primer)) {
  $sett = $row["setting"];
  $act = $row["activity"];
  $price = $row["price"];
}
 // $sett = mysqli_query($con, "SELECT setting FROM userPref WHERE uid = $_SESSION[id];");
 // $act = mysqli_query($con, "SELECT activity FROM userPref WHERE uid = $_SESSION[id];");
 // $price = mysqli_query($con, "SELECT price FROM userPref WHERE uid = $_SESSION[id];");
 $result = mysqli_query($con, "CALL getPrefLoc('$sett', '$act', '$price');")
//   "SELECT lid, lname, setting, activity, address,description,price
// FROM (SELECT lid, lname, setting, activity, address,description,price,
// (settingCt + activCt+ priceCt) as totalCt
// FROM (SELECT lid, lname, setting, activity, address,description,price,
//   sum(case when setting = '$sett' then 1 else 0 end) settingCt,
//     sum(case when activity = '$act' then 1 else 0 end) activCt,
//     sum(case when price = $price then 1 else 0 end) priceCt
// from location
// group by lid) as t1)as t2
// ORDER BY totalCt DESC");
 // echo $result;
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Locations </title>
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
    <h1>Check Out These Locations!</h1>
</div>
<div class="container">
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table>
  
  <tr>
    <td>Location Name</td>
    <td>Setting</td>
    <td>Activity</td>
    <td>Price</td>
    <td>Location Address</td>
    <td>Already Visited?</td>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
  if($row["price" == 1])
    $price_desc = "$1-$30";
  if($row["price" == 2])
    $price_desc = "$40-$80";
  if($row["price" == 3])
    $price_desc = "$80 or above";  
?>
<tr>
     <td><?php echo '<a href="reviewView.php?lid=' . $row["lid"] . '&lname=' . $row["lname"] . '&description=' . $row["description"] . '">' . $row["lname"] . '</a>';?></td>
     <td><?php echo $row["setting"]; ?></td>
     <td><?php echo $row["activity"]; ?></td>
     <td><?php echo $price_desc; ?></td>
     <td><?php echo $row["address"]; ?></td>
     <td><?php echo '<a href="visitedForm.php?lid=' . $row["lid"] .'">Click Here</a>';?></td>
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
<br>
 </body>
 <div class="back" style="text-align:center">
			<a href="home.html"><button type="button" class="btn btn-secondary">Return to Home</button></a>
		</div>
</html>