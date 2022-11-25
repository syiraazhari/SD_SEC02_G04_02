<?php
include 'components/connect.php';

session_start();
$user_id = $_SESSION['user_id'];	
	
if(!empty($_GET['verifyId']) && isset($_GET['verifyId']))
	
{
$verifyId=$_GET['verifyId'];
$result = $conn->prepare("SELECT * FROM `users` WHERE verifyId= ?");
$result->execute([$verifyId]);
$num = $result->fetch(PDO::FETCH_ASSOC);
if($num>0)
{
$verifyStatus1=0;
$sql = $conn->prepare("SELECT id FROM `users` WHERE verifyId= ? and verifyStatus=?");
$sql->execute([$verifyId, $verifyStatus1]);
$sql1 = $sql->fetch(PDO::FETCH_ASSOC);
if($sql1>0)
 {
$verifyStatus2=1;
$result1 = $conn->prepare("UPDATE `users` SET verifyStatus=? WHERE verifyId=?");
$result1->execute([ $verifyStatus2, $verifyId]);
header("Location:login.php?success=Account Activated!!");

}

}}
?>