<?php
include 'smartsession.php';

if(!session_id())
{
     session_start();
}

include("dbconnect.php");


//Retrieve data from approval page

//parent
$gic = $_POST['gic'];
$gpwd = $_POST['gpwd'];
$gocc = $_POST['gocc'];
$gadd = $_POST['gadd'];
$gmail = $_POST['gmail'];

//kid
$mykid = $_POST['mykid'];
$kdob = $_POST['kdob'];
$kallergy = $_POST['kallergy'];
$kcolor = $_POST['kcolor'];
$kfood = $_POST['kfood'];
$ktoys = $_POST['ktoys'];
$kdiapers = $_POST['kdiapers'];

//programme
$session = $_POST['fsession'];
$program = $_POST['fprogram'];
$meals = $_POST['fmeals'];

//status
$fstatus = $_POST['fstatus'];

//fee
if($session == '1' AND $program == '1')
{
     if($meals == '0') //no meals
          $fee = '5';
     else
          $fee = '1';
}
else if($session == '2' AND $program == '1')
{
     if($meals == '0')
          $fee = '6';
     else
          $fee = '2';
}
else if($session == '1' AND $program == '2')
{
     if($meals == '0')
          $fee = '7';
     else
          $fee = '3';
}
else if($session == '2' AND $program == '2')
{
     if($meals == '0')
          $fee = '8';
     else
          $fee = '4';
}

//insert into user
$user = "INSERT INTO tb_user(u_id, u_pwd, u_type) VALUES ('$gic', '$gpwd', '3')";
mysqli_query ($con,$user);

//UPDATE guardian info
$guardian = "UPDATE tb_guardian 
          SET g_occ = '$gocc', g_add = '$gadd', g_child = '2'
          WHERE g_ic = '$gic'";
mysqli_query ($con,$guardian);

//UPDATE kid info 
$kid = "UPDATE tb_kidprogram 
        SET g_ic = '$gic', k_dob = '$kdob', k_allergy = '$kallergy', k_color = '$kcolor', k_food = '$kfood', k_toys = '$ktoys', k_diapers = '$kdiapers', k_session = '$session', k_programme = '$program', k_meals = '$meals', k_feeinfo = '$fee', k_status = '$fstatus', k_feestatus = '1'
        WHERE k_mykid= '$mykid'";

mysqli_query ($con,$kid);
mysqli_close($con);

//Successful notifications
if($program == '1')
     header('location: classlittleexplorer.php');
else
     header('location: classfunkindyland.php');
?>