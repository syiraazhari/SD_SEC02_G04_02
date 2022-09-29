
<?php
 function addmenu()
{
$name = $_POST['name'];
$quantity = $_POST['quantity'];
$availability = $_POST['availability'];

//print_r($_POST);
 $con = mysqli_connect('localhost','G04_02','G04_02','biggalleyscafe');
 if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit;
	
	}
	echo "connected";
	
	$sql = "insert into menu (name, quantity, availability)
	values('$name','$quantity', '$availability')";
	echo $sql;
	
	$qry = mysqli_query($con,$sql);

	if(!$qry)
		return false;
	else
		return true;
}

function getListOfMenu()
{
$con = mysqli_connect('localhost','G04_02','G04_02','biggalleyscafe');
 if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit;
	}
	$sql = 'select * from menu';
	$qry = mysqli_query($con,$sql);
	return $qry;
}	

function deleteMenu(){
$con = mysqli_connect('localhost','G04_02','G04_02','biggalleyscafe');	
 if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit;
	}
	$sql = 'delete from menu where name = "'.$_POST['nameToDelete'].'"';
	echo $sql;
	$qry = mysqli_query($con,$sql);
	return $qry;
	
}

function updateMenu(){
$con = mysqli_connect('localhost','G04_02','G04_02','biggalleyscafe');	
 if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit;
	}
	$oldName = $_POST['menu'];
	$newname = $_POST['newName'];
	$quantity = $_POST['quantity'];
	$availability = $_POST['availability'];
 
	
	$sql = 'update menu set name ="'.$newname.'", quantity ="'.$quantity.'", availability ="'.$availability.'" where name ="'.$oldName.'"';
	echo $sql;

	$qry = mysqli_query($con,$sql);

	return $qry;
}

?>
										