<?php

include 'components/connect.php';
session_start();
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Forgot Password</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<section class="form-container">
<div class="user">
   <form action="" method="post">
      <h3>Reset Password</h3>
	  <input type="hidden" name="id" value=<?"$user_id"?>
      <input type="Password" name="newPassword" required placeholder="enter your new Password" class="box" maxlength="50">
	  <input type="password" name="confirmPassword" required placeholder="confirmPassword" class="box" maxlength="50">
      <input type="submit" value="Submit" name="changePassBtn" class="btn">
   </form>
   <?php
			if(isSet($_POST['changePassBtn']))
			{	
				$con = mysqli_connect('localhost','G04_02','G04_02','food_db');	
					 if (mysqli_connect_errno())
						{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
						exit;	
						}
					  $email = $_GET['key'];
					  $query = mysqli_query($con,"SELECT * FROM users WHERE email ='".$email."'");
				echo"<input type='hidden' name='email' value='$email'>";
				
				$pid = 	$email;
				$newPassword = sha1($_POST['newPassword']);
				$newPassword = filter_var($newPassword, FILTER_SANITIZE_STRING);
				$confirmPassword= sha1($_POST['confirmPassword']);
				$confirmPassword = filter_var($confirmPassword, FILTER_SANITIZE_STRING);
				
				$result = $conn->prepare('UPDATE `users` SET password = ?, confirmPassword= ? WHERE email = ?');
				$result->execute([ $newPassword, $confirmPassword, $pid ]);
				header('Location:login.php');
			}	
		?>
</div>
</section>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>