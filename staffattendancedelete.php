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
$sql ="UPDATE tb_staffattendance SET staff_status='2'WHERE staffattend_id = '$id' and attendance_status='1' AND attend_date='$pid'";

$result = mysqli_query($con,$sql);
mysqli_close($con);

header('location: adminstaffattendmanage.php');