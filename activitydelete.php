<?php 


include('dbconnect.php');


//get booking ID from URL
if(isset($_GET['id']))
{
	$nid = $_GET['id'];
}

//SQL delete
$sql = "UPDATE tb_activity
		SET n_status='2'
		WHERE n_ID = '$nid' LIMIT 1";

$result = mysqli_query($con, $sql);


mysqli_close($con);

header('location: adminactivitymanage.php');

?>


<?php include 'footermain.php';?>
