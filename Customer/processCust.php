<?php

include "cust.php";
include "verify.php";


print_r($_POST);	
	 if(isSet($_POST['signUpBtn']))
	{
		addCustomer();
		verify();
		header('Location:CustomerLogin.php');
	}
	 else if(isSet($_POST['resetBtn']))
	{
		ResetPass();
		header('Location:PassChange.php');
	}
	 else if(isSet($_POST['changePassBtn']))
	{
		changePass();
		//header('Location:PassChange.php');
	}
	
	
?>