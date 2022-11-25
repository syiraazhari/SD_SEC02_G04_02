<?php

include 'components/connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff  - Reset Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: #daf0f7">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5" >
                    <div class="card-body p-0"style="margin-bottom:50px; margin-top:50px;">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
						
                           
                            <div class="col-lg-8" style="margin:auto;">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Reset Password?</h1>
                                        <p class="mb-4"></p>
                                    </div>
                                    <form class="user" action="" method="POST" >
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="newPassword" name="newPassword"
                                                placeholder="Enter your new password">
												
                                        </div>
										<div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="Password" name="confirmPassword" 
                                                placeholder="Confirm Password">
												
                                        </div>
                                        <input type="submit" name="changePassBtn" value="Submit" class="btn btn-user btn-block" style="background-color: #96b9d0 ; color: #ffffff;">
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
										  $query = mysqli_query($con,"SELECT * FROM staff WHERE email ='".$email."'");
									echo"<input type='hidden' name='email' value='$email'>";
									
									$pid = 	$email;
									$newPassword = sha1($_POST['newPassword']);
									$newPassword = filter_var($newPassword, FILTER_SANITIZE_STRING);
									$confirmPassword=sha1($_POST['confirmPassword']);
									$confirmPassword = filter_var($confirmPassword, FILTER_SANITIZE_STRING);
									
									$sql= 'UPDATE staff SET `password` = "'.$newPassword.'", confirmPassword = "'.$confirmPassword.'" WHERE email = "'.$pid.'"';
									$result = $conn->prepare('UPDATE `staff` SET password = ?, confirmPassword= ? WHERE email = ?');
									$result->execute([ $newPassword, $confirmPassword, $pid ]);
									header('Location: staffLogin.php');
								}
							
							?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
