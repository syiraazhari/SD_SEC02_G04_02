<?php 
print_r($_POST);	
function verify(){
	$con = mysqli_connect('localhost','G04_02','G04_02','biggalleyscafe');	
 if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit;	
	}
	echo "connected";
	
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['verifyId']) && !empty($_GET['verifyId'])){
    // Verify data
    $email = mysql_escape_string($_GET['email']); // Set email variable
    $verifyId = mysql_escape_string($_GET['verifyId']); // Set hash variable
                  
    $search = mysql_query("SELECT email, verifyId, verifyId FROM customer WHERE email='".$email."' AND verifyId='".$verifyId."' AND verifyId='0'") or die(mysql_error()); 
    $match  = mysql_num_rows($search);
                  
    if($match > 0){
        // We have a match, activate the account
        mysql_query("UPDATE customer SET verifyId='1' WHERE email='".$email."' AND verifyId='".$verifyId."' AND verifyId='0'") or die(mysql_error());
        echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
    }
                  
}else{
    // Invalid approach
    echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
}

	
}

?>