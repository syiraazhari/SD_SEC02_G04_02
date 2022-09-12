<?php
$errors = array();
session_start();
$email= $_SESSION['loggedin'];

 function addCustomer()
{
$name = $_POST['name'];	
$email = $_POST['email'];
$phoneNum = $_POST['phoneNum'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];



print_r($_POST);
 $con = mysqli_connect('localhost','G04_02','G04_02','biggalleyscafe');	
 if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit;	
	}
	echo "connected";
	
	if($password != $confirmPassword) {
		$error = true;
		$confirmPassword ='<script>alert("Password does not match")</script>';
	}
	
	if ($stmt = $con->prepare('SELECT id, password FROM customer WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		
		echo 'email exists, please choose another!';
	} else {
		
	$verifyId = bin2hex(random_bytes(16));	
	$sql = "insert into customer (name, email,phoneNum, password , confirmPassword, verifyId, verifyStatus )
	values('$name','$email', '$phoneNum','$password ','$confirmPassword','$verifyId','0')";	
	
	echo $sql;	
	$qry = mysqli_query($con,$sql);
	                   
	if(!$qry)
		return false;
	else
		return true;

	}
	$stmt->close();
	}
	else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
	}
$con->close();
	
}

function ResetPass(){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $confirmPassword=$_POST['confirmPassword'];
	print_r($_POST);
 $con = mysqli_connect('localhost','G04_02','G04_02','biggalleyscafe');	
 if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit;	
	}
	echo "connected";
	
	//$sql= 'UPDATE customer SET password = "'.$password.'" WHERE email = "'.$email.'"';
	$sql= 'UPDATE admin SET `password` = "'.$password.'", confirmPassword = "'.$confirmPassword.'" WHERE email = "'.$email.'"';
	echo $sql;	
	$qry = mysqli_query($con,$sql);
	                 

	if(!$qry)
		return false;
	else
		return true;
}


function changePass(){
	
print_r($_POST);
 
 $con = mysqli_connect('localhost','G04_02','G04_02','biggalleyscafe');	
 if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit;	
	}
	echo "connected";
  $email = $_POST['email'];
  $password=$_POST['password'];
  $newPassword = $_POST['newPassword'];
  $confirmPassword=$_POST['confirmPassword'];
	$sql= 'UPDATE admin SET `password` = "'.$newPassword.'", confirmPassword="'.$confirmPassword.'" WHERE email = "'.$email.'"';
	echo $sql;	
	$qry = mysqli_query($con,$sql);
	                 

	if(!$qry)
		return false;
	else
		return true;

}
?>