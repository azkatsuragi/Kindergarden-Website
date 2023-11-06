<?php 

include ('dbconnect.php');
include 'smartsession.php';
include 'headeradmin.php';
if(!session_id())
{
    session_start();
}

//get booking ID from URL
if(isset($_GET['id']))
{
	$announceid = $_GET['id'];
}

//SQL delete
$sql = "UPDATE tb_announcement
		SET ann_status='2'
		WHERE ann_ID = '$announceid' LIMIT 1";		
$result = mysqli_query($con, $sql);


mysqli_close($con);

header('location: announcementmanage.php');
  
?>


<?php include 'footermain.php';?>
