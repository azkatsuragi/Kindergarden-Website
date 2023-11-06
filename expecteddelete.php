<?php 

include 'smartsession.php';
if(!session_id())
{
	session_start();
}

include('dbconnect.php');


//get booking ID from URL
if(isset($_GET['id']))
{
	$expid = $_GET['id'];
}
//SQL delete
$sql = "DELETE FROM tb_expattendance 
		WHERE exp_id = '$expid'";
$result = mysqli_query($con, $sql);

mysqli_close($con);

header('location: manageexpected.php');
  
?>


<?php include 'footermain.php';?>
