<?php
$verifyId =bin2hex(random_bytes(16));	
session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit']))
{
	header('Location:success.php');
		print_r($_POST);	

$con = mysqli_connect('localhost','G04_02','G04_02','biggalleyscafe');	
 if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit;	
	}
	echo "connected";
$email = $_POST['email'];
 $result = mysqli_query($con,"SELECT * FROM CUSTOMER WHERE email='" . $email . "'");
 
    $row= mysqli_fetch_array($result);
  if($row)
  {
		require ('PHPMailer-master/src/PHPMailer.php');
        require ('PHPMailer-master/src/Exception.php');
        require ('PHPMailer-master/src/SMTP.php');

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;            
            $mail->Username   = 'biggalleys@gmail.com';
            $mail->Password   = 'monrzshvwavfocls';                    
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   
            $mail->Port       = 465;                           

            $mail->setFrom('biggalleys@gmail.com', 'unknown');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Change password';
            $mail->Body    = "Click the link bellow to change the 
            <a href='http://localhost/project/Staff/resetPass.php?key=".$email."'>password</a>";

            $mail->send();
                return true;
        } catch (Exception $e) {
                return false;
        }
  }
}
?>