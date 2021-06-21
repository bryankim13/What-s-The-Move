<?php
$DATABASE_HOST = 'usersrv01.cs.virginia.edu';
$DATABASE_USER = 'bjk3yf';
$DATABASE_PASS = 'BoysWithLuv2022!';
$DATABASE_NAME = 'bjk3yf_';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$pass=hash('sha512',$_POST[psw]);
$sql="INSERT INTO accounts (username, password, email)
 VALUES
 ('$_POST[usr]', '$pass', '$_POST[email]')";


      if (!mysqli_query($con,$sql))
        {
die('Error: ' . mysqli_error($con));
}
mysqli_close($con);
header('Location: index.html');

exit;
   ?>
