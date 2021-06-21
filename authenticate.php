<?php

session_start();
// Change this to your connection info.
$DATABASE_HOST = 'usersrv01.cs.virginia.edu';
$DATABASE_USER = 'bjk3yf';
$DATABASE_PASS = 'BoysWithLuv2022!';
$DATABASE_NAME = 'bjk3yf_';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}
$correct = True;
$home = True;
$role = "";
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT uid, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
	$stmt->bind_result($uid, $password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (hash('sha512', $_POST['password']) == $password) {
	//if (password_verify($_POST['password'], $password)) {
		// Verification success! User has logged-in!
		// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $uid;
		echo 'Welcome ' . $_SESSION['name'] . '!';
	} else {
		// Incorrect password
		echo 'Incorrect username and/or password!';
		$correct = False;
		//header("Location: index.html");
	}
} else {
	// Incorrect username
	echo 'Incorrect username and/or password!';
	$correct =False;
	//header("Location: index.html");
}
if ($correct == True) {
	if ($stmt == $con->prepare('SELECT uid FROM accounts NATURAL JOIN user WHERE uid = ?')) {
		$stmt->bind_param('i',$_SESSION['id']);
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
		$home = False;
		} else {
		$home = True;
		}	
		}
}

// if ($stmt == $con->prepare('SELECT roleType FROM accounts NATURAL JOIN user WHERE uid = ?')) {
// 	$stmt->bind_param('i',$_SESSION['id']);
// 	$stmt->execute();
// 	$stmt->store_result();
// 	$stmt->bind_result($role2);
// 	while ($stmt->fetch()) {
// 		$role = $role2;
// 	}
// }

	$stmt->close();
}

$temp = $_SESSION['id'];
$role = "";
$result = mysqli_query($con,"SELECT roleType FROM accounts NATURAL JOIN user WHERE uid = $temp");
echo mysqli_num_rows($result);
while($row = mysqli_fetch_row($result)) {
	printf("%s\n", $row[0], $row[1]);
	$role = $row[0];
	
}
if($correct == False){
	header("Location: index.html");
}
else if ($role == 'bjk3yf_c') {
	header("Location: approval.php");
}
else if($home == True && $role == 'bjk3yf_b'){
	header("Location: home.html");
}
else if ($correct == True && $home == True) {
	header("Location: profile.html");
}
?>

