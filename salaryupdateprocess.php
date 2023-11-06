<?php

include ('dbconnect.php');
include 'smartsession.php';
if(!session_id())
{
    session_start();
}

$reference = $_POST['reference'];
$sid = $_POST['sid'];
$fbasic = $_POST['fbasic'];
$fot = $_POST['fot'];
$feplaygroup = $_POST['feplaygroup'];
$fecutiumum = $_POST['fecutiumum'];
$felebihmasa = $_POST['felebihmasa'];
$kwsp_employee = $_POST['kwsp_employee'];
$kwsp_employer = $_POST['kwsp_employer'];
$fcutitanpagaji = $_POST['fcutitanpagaji'];

//get current date
$fissuedate = date("Y.m.d");

//calculate total income
$ftotalincome = $fbasic + $fot + $feplaygroup + $fecutiumum + $felebihmasa;

//calculate total deduction
$ftotaldeduct = $kwsp_employee + $fcutitanpagaji;

//calculate net pay
$fnetpay = $ftotalincome - $ftotaldeduct;

$sql="UPDATE tb_salary
	SET sa_staff='$sid', sa_issuedate='$fissuedate',sa_basic='$fbasic', sa_ot='$fot', sa_eplaygroup='$feplaygroup', sa_ecutiumum='$fecutiumum', sa_elebihmasa='$felebihmasa', sa_kwspstaff='$kwsp_employee', sa_kwspmajikan='$kwsp_employer',sa_cutitanpagaji='$fcutitanpagaji', sa_totalincome='$ftotalincome', sa_totaldeduct='$ftotaldeduct', sa_netpay='$fnetpay'
	WHERE sa_reference = '$reference'";
mysqli_query($con,$sql);
mysqli_close($con);
 ?>

<script>
     alert("Salary has been updated successfully");
     window.location.href="salarylist.php";
</script>