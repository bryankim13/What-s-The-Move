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
<!--end of Navigation bar-->

<body>
 <h1>Leave a review</h1>
 <form action="review.php" method="post">

 <input type="hidden" id="lid" name="lid" value=<?php echo "{$lid}"?> >

<label for="date"> Date</label>
<input type="date" id="date" name="date"><br>

<label for="description">Review</label>
 <textarea for="description" name="description" rows="4" cols="50"></textarea><br>

  <p><input type="submit" /></p>
</form>
</body>
</html>