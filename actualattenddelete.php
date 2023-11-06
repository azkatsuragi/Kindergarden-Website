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

if(isset($_GET['p_id']))
{
   $pid = $_GET['p_id'];
} 

//SQL DELETE
$sql ="UPDATE tb_actualattendance SET actual_status = '2' WHERE attendance_date = '$id' AND k_mykid='$pid'  LIMIT 1";

$result = mysqli_query($con,$sql);
mysqli_close($con);

header('location: adminviewactualattend.php');