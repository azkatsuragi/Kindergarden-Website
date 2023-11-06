<?php 

include 'smartsession.php';

if (!session_id())
{
	session_start();
}

include ('dbconnect.php');

//get attendance from URL 
if(isset($_GET['id']))
{
   $id = $_GET['id'];
}

//SQL DELETE
$sql ="UPDATE tb_actualattendance SET actual_status = '2' WHERE k_mykid='$id' LIMIT 1";
$result = mysqli_query($con,$sql);
mysqli_close($con);

header('location: adminviewactualattend.php'); ?>