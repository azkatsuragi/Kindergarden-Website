<?php
include 'smartsession.php';

if(!session_id())
{
     session_start();
}

include("dbconnect.php");


//Retrieve data from approval page

//kid
$mykid = $_POST['mykid'];

//status
$status = $_POST['fstatus'];

//UPDATE kid info 
$kid = "UPDATE tb_kidprogram 
        SET k_status = '$status'
        WHERE k_mykid = '$mykid'";

mysqli_query ($con,$kid);
mysqli_close($con);

//Successful notifications
if($program == '1')
     header('location: classlittleexplorer.php');
else
     header('location: classfunkindyland.php');

?>