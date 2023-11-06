<?php
include ('dbconnect.php');
include 'smartsession.php';
if(!session_id())
{
    session_start();
}


//retrieve data from approval page
$reference = $_POST['reference'];
$mykid = $_POST['mykid'];
$fstatus = $_POST['fstatus'];
$credit = $_POST['credit'];
//Update booking status
$sql = "UPDATE tb_fee SET f_status = '$fstatus' WHERE f_invoice = '$reference'";
$sqlv = "UPDATE tb_kidprogram SET k_feestatus = '$fstatus' WHERE k_mykid ='$mykid'";

if (mysqli_query($con, $sql) AND mysqli_query($con, $sqlv)) {
    mysqli_close($con);
    //Successful notifications
    echo'<script>
     alert("Fee has been updated successfully");
     window.location.href="feeadminview.php";
</script>';
} else {
    echo "Error updating record: " . mysqli_error($con);
    mysqli_close($con);
}

?>
