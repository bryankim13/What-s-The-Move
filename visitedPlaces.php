<?php

session_start();

include_once("./library.php");

$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

if (mysqli_connect_errno())

 {

 echo "Failed to connect to MySQL: " . mysqli_connect_error();

 }
 $result = mysqli_query($con,"SELECT lname, dateVisited FROM location NATURAL JOIN visited WHERE uid = $_SESSION[id]
 ");
// $result = mysqli_query($con, "Select ")
?>



<!DOCTYPE html>

<html>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
 <head>

 <title>Visited</title>

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
    <h1>Visited Places</h1>
    <p>Here are a list of places you've visited!</p>
</div>
  <div class="container">
<?php

if (mysqli_num_rows($result) > 0) {

?>

  <table>

  

  <tr>

    <td><strong>Location Visited</strong></td>
    <td><strong>Date Visited</strong></td>

  </tr>

<?php

$i=0;

while($row = mysqli_fetch_array($result)) {

?>

<tr>

    <td><?php echo $row["lname"]; ?></td>
    <td><?php echo $row["dateVisited"]; ?></td>

</tr>

<?php

$i++;

}

?>

</table>

 <?php

}

else{

    echo "No Visited Locations";

}

?>
</div>
 </body>
 <br>
 <div class="back" style="text-align:center">
			<a href="home.html"><button type="button" class="btn btn-secondary">Return to Home</button></a>
      <a href="locationView.php"><button type="button" class="btn btn-secondary">Go To Locations</button></a>
		</div>
</html>