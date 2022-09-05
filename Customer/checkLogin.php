
<?php
	session_start();
    $con=mysqli_connect('localhost','G04_02','G04_02','biggalleyscafe');	
	if(!$con){
		echo  mysqli_connect_error(); 
		exit;
	}
print_r($_POST);	

	$email=$_POST['email'];
	if ($stmt = $con->prepare('SELECT id, password FROM customer WHERE email = ?')) {
		$stmt->bind_param('s', $_POST['email']);
		$stmt->execute();
	$stmt->store_result();

if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if ($_POST['password'] == $password) {
		// Verification success! User has logged-in!
		// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['email'];
		$_SESSION['id'] = $id;
		//echo 'Welcome ' . $_SESSION['name'] . '!';
		header('Location:homepage.php?key='.$email.'');
	} else {
		// Incorrect password
		echo 'Incorrect password!';
	}
} else {
	// Incorrect username
	echo 'Incorrect email!';
}

}
?>



