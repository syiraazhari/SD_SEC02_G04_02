<?php

include "staff.php";

print_r($_POST);	
	
	 if(isSet($_POST['resetBtn']))
	{
		ResetPass();
		header('Location:PassChange.php');
	}
	else if(isSet($_POST['changePassBtn']))
	{
		changePass();
	}
	
?>