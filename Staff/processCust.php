<?php

include "cust.php";
include "verify.php";


print_r($_POST);	
	
	 if(isSet($_POST['resetBtn']))
	{
		ResetPass();
		header('Location:PassChange.php');
	}
	
?>