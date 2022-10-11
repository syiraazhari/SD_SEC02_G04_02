<<?php
$con = mysqli_connect('localhost','G04_02','G04_02','biggalleyscafe');	
 if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit;	
	}
	echo "connected";
	
if(!empty($_GET['verifyId']) && isset($_GET['verifyId']))
{
$verifyId=$_GET['verifyId'];
$sql=mysqli_query($con,"SELECT * FROM customer WHERE verifyId='$verifyId'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$verifyStatus=0;
$result =mysqli_query($con,"SELECT id FROM customer WHERE verifyId='$verifyId' and verifyStatus='$verifyStatus'");
$result4=mysqli_fetch_array($result);
if($result4>0)
 {
$verifyStatus=1;
$result1=mysqli_query($con,"UPDATE customer SET verifyStatus='$verifyStatus' WHERE verifyId='$verifyId'");
header("Location:Login.php?success=Account Activated!!");
}

}}
?>