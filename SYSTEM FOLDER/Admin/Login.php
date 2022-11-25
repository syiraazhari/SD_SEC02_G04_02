<?php

include 'components\connect.php';

session_start();
if(isset($_SESSION['admin_id'])){
   $admin_id = $_SESSION['admin_id'];
}else{
   $admin_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
	
   $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE email = ? AND password = ?");
   $select_admin-> execute([$email, $pass]);
   $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);
   
   
   if($select_admin->rowCount() > 0){
      $_SESSION['admin_id'] = $fetch_admin_id['id'];
      header('location:Dashboard.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
.message{
   position: sticky;
   top:0;
   max-width: 1700px;
   background-color: #f5f5f5;
   padding:1rem;
   display: flex;
   align-items: center;
   gap:1rem;
   justify-content: space-between;
}

.message span{
   font-size: 20px;
   margin: 0 auto;
   color:#34495e;
}

.message i{
   font-size: 20px;
   color:#e74c3c;
   cursor: pointer;
}

.message i:hover{
   color:#34495e;
}
</style>

<body style="background-color: #f5a48b">


<?php
				if(isset($message)){
				   foreach($message as $message){
					  echo '
					  <div class="message">
						 <span>'.$message.'</span>
						 <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
					  </div>
					  ';
				   }
				}
?>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
				
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
						<img src="images/Tablet login-rafiki.png"  height="540" alt="" class="col-lg-6 d-none d-lg-block">
                           
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" name="email" maxlength="30" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." oninput="this.value = this.value.replace(/\s/g, '')">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="pass" name="pass" maxlength="20" placeholder="Password" >
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type="submit" value="Login" name="submit" class="btn btn-user btn-block" style="background-color: #e2725b ; color: #ffffff;">
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="https://www.facebook.com/login/" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">									
                                        <a class="small" href="forgotPass.php" style="color: #e2725b"  >Forgot Password?</a>

                                    </div>

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