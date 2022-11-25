<?php
include 'components/connect.php';
$verifyId =bin2hex(random_bytes(16));	
session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit']))
{

$email = $_POST['email'];
 $result = $conn->prepare("SELECT * FROM staff WHERE email='" . $email . "'");
 $result->execute();

  if($result)
  {
		require ('PHPMailer-master/PHPMailer.php');
        require ('PHPMailer-master/Exception.php');
        require ('PHPMailer-master/SMTP.php');

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;            
            $mail->Username   = 'biggalleys1@gmail.com';
            $mail->Password   = 'bypjxfdqqmyvdvzo';                    
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   
            $mail->Port       = 465;                           
            $mail->setFrom('biggalleys@gmail.com', 'unknown');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Change password';
            $mail->Body    = "Click the link bellow to change the 
            <a href='resetPassStaff.php?key=".$email."'>password</a>";
			header('Location:successEmailReset.php');
            $mail->send();
                return true;
        } catch (Exception $e) {
                return false;
        }	
  }
    
}
?>
