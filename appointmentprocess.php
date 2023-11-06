<?php

include ('dbconnect.php');

$gname = $_POST['gname'];
$gic = $_POST['gic'];
$gphone = $_POST['gphone'];
$cname = $_POST['cname'];
$cmykid = $_POST['cmykid'];
$appdate = $_POST['appdate'];

$guardian="INSERT INTO tb_guardian(g_ic, g_name, g_phone, g_child)
VALUES ('$gic', '$gname', '$gphone', '1')";
mysqli_query($con, $guardian);

$kid="INSERT INTO tb_kidprogram(g_ic, k_name, k_mykid, k_appointmentdate, k_status)
VALUES ('$gic', '$cname', '$cmykid', '$appdate', '1')";
mysqli_query($con,$kid);
mysqli_close($con);

include 'headermain.php';
?>

<div class="alert alert-success">
	<strong>Success!</strong> Your appointment has been booked. <a href="index.php" class="alert-link">Main Page</a>.
</div>

<?php include 'footermain.php' ?>