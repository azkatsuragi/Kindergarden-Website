<?php

include ('dbconnect.php');
include 'smartsession.php';
if(!session_id())
{
    session_start();
}

//retrieve data from approval page
if(isset($_GET['id']))
     $invoice = $_GET['id'];

//Update booking status
$sql="DELETE FROM tb_fee WHERE f_invoice = '$invoice'";

mysqli_query($con,$sql);
mysqli_close($con);

//Successful notifications
header ('location: feeadminview.php');

?>