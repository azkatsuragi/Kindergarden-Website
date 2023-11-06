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
$appointment = $_POST['appdate'];

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

//UPDATE kid info 
$kid = "INSERT INTO tb_kidprogram(k_mykid, g_ic, k_name, k_dob, k_allergy, k_color, k_food, k_toys, k_diapers, k_programme, k_session, k_meals, k_feestatus, k_status, k_appointmentdate, k_feeinfo)
        VALUES ('$mykid', '$gic', '$kname', '$kdob', '$kallergy', '$kcolor', '$kfood', '$ktoys', '$kdiapers', '$program', '$session', '$meals', '1', '1', '$appointment', '$fee')";

mysqli_query ($con,$kid);
mysqli_close($con);

//Successful notifications
include 'headermain.php';
?>

<div class="alert alert-success">
     <strong>Success!</strong> Your appointment has been booked. <a href="guardian.php" class="alert-link">Main Page</a>.
</div>

<?php include 'footermain.php' ?>