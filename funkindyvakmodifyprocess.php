<?php
include 'smartsession.php';

if(!session_id())
{
     session_start();
}

include("dbconnect.php");

$vakid = $_POST['vakid'];
$vcomment = $_POST['vcomment'];
$acomment = $_POST['acomment'];
$kcomment = $_POST['kcomment'];
$summary = $_POST['summary'];
$vakdate = $_POST['vakdate'];
$k_mykid = $_POST['k_mykid'];
$session = $_POST['session'];
$funvakid = $_POST['funvid'];




       $sql = "UPDATE tb_explorer 
        SET exp_id='$fkid',exp_mykid='$k_mykid',exp_comment='$summary',exp_date='$vakdate',v_comment='$vcomment', a_comment='$acomment',k_comment='$kcomment',exp_class='$session',exp_prog='2'
        WHERE exp_id = '$funvid'";

        mysqli_query($con, $sql);
       
        mysqli_close($con);
         header('location: funkindyvakmanage.php');





?>

<?php include 'footermain.php';?>