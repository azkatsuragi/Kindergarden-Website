<?php
include ('dbconnect.php');
include 'smartsession.php';
if(!session_id())
{
    session_start();
}

$sid = $_POST['sid'];
$fbasic = $_POST['fbasic'];
$hour = $_POST['hour'];
$rate = $_POST['rate'];
$feplaygroup = $_POST['feplaygroup'];
$fecutiumum = $_POST['fecutiumum'];
$felebihmasa = $_POST['felebihmasa'];
$kwsp_employee = $_POST['kwsp_employee'];
$kwsp_employer = $_POST['kwsp_employer'];
$fcutitanpagaji = $_POST['fcutitanpagaji'];

//get current date
$fissuedate = date("Y.m.d");

//calculate total income
$ot = $hour * $rate;
$ftotalincome = $fbasic + $ot + $feplaygroup + $fecutiumum + $felebihmasa;

//calculate total deduction
$ftotaldeduct = $kwsp_employee + $fcutitanpagaji;

//calculate net pay
$fnetpay = $ftotalincome - $ftotaldeduct;

$sql="INSERT INTO tb_salary(sa_staff, sa_issuedate, sa_basic, sa_ot, sa_eplaygroup, sa_ecutiumum, sa_elebihmasa, 
	sa_kwspstaff, sa_kwspmajikan, sa_cutitanpagaji, sa_totalincome, sa_totaldeduct, sa_netpay)
	VALUES ('$sid', '$fissuedate', '$fbasic', '$ot', '$feplaygroup', '$fecutiumum', '$felebihmasa', '$kwsp_employee',
	 '$kwsp_employer', '$fcutitanpagaji', '$ftotalincome', '$ftotaldeduct', '$fnetpay')";
mysqli_query($con,$sql);
mysqli_close($con);

header('location: salarylist.php');
 ?>