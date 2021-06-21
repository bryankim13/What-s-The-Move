<?php
$lid = $_GET['lid'];
?>
<html>
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
<body>
  <div class="jumbotron text-center">
 <h1>When did you visit this place?</h1>
</div>
<div class="container">
  <center>
 <form action="visited.php" method="post">

 <input type="hidden" id="lid" name="lid" value=<?php echo "{$lid}"?> >

<label for="date">Date Visited</label>
<input type="date" id="date" name="date" required><br>
  <p><input type="submit" /></p>
</form>
</center>
</div>
</body>
<br>
<div class="back" style="text-align:center">
  <a href="locationView.php"><button type="button" class="btn btn-secondary">Return to Location</button></a>
	<a href="home.html"><button type="button" class="btn btn-secondary">Return to Home</button></a>
</div>
</html>