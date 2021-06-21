<?php
session_start();
$did = $_GET['did'];
$title = $_GET['title'];
?>
<html>
<head>
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
 	<title>Finding Locations</title>
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
  <h1><?php echo "{$title}" ?></h1>
  <p>Leaving a Rating on This Idea!</p>
</div>
<center>
 <form action="rate.php" method="post">
 <input type="hidden" id="did" name="did" value=<?php echo "{$did}"?> ><br>
 <label for="rating" >How Would You Rate This Date?</label><br>
 <select name="rating" id="rating" size="5" multiple="multiple" required>
        <option value="1">*</option>
        <option value="2">**</option>
        <option value="3">***</option>
        <option value="4">****</option>
        <option value="5">*****</option>
  </select><br>
<label for="date"> Date Visited</label><br>
<input type="date" id="date" name="date" required><br>

<label for="description">Please explain why</label><br>
 <textarea for="description" name="description" rows="4" cols="50"></textarea><br>
 <br>

  <p><input type="submit" /></p>
</form>
</center>
</body>
</html>