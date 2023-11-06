<?php
include 'smartsession.php';

if(!session_id())
{
     session_start();
}

include("dbconnect.php");


$uid = $_SESSION['uid'];
$fkidname = $_POST['fkidname'];
$fkidid = $_POST['fkidid'];
$fdob = $_POST['fdob'];
$fallergy = $_POST['fallergy'];
$ffood = $_POST['ffood'];
$fcolor = $_POST['fcolor'];
$ftoys = $_POST['ftoys'];
$fdiapers = $_POST['fdiapers'];
$fsession = $_POST['fsession'];
$fprogram = $_POST['fprogram'];
$mykid = $_POST['fkid'];


$sql = "UPDATE tb_kidprogram 
        SET k_mykid='$fkidid', k_name='$fkidname', k_dob='$fdob', k_allergy='$fallergy', k_color='$fcolor', k_food='$ffood', k_toys='$ftoys', k_diapers='$fdiapers', k_programme='$fprogram', k_session='$fsession'
          WHERE k_mykid= '$mykid'";

 if (mysqli_query($con, $sql)) 
 {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($con);
}     

$result = mysqli_query($con, $sql);

mysqli_close($con);


//Successful notifications
header ('location: kidprogramcustomermanage.php');
?>