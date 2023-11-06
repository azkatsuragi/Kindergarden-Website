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




       $sql = "INSERT INTO tb_explorer ( exp_id,exp_mykid,exp_comment,exp_date, v_comment, a_comment, k_comment,exp_class,exp_prog)
        VALUES ('$vakid','$k_mykid', '$summary','$vakdate','$vcomment', '$acomment','$kcomment','$session','2')
        ";

        mysqli_query($con, $sql);
       
        mysqli_close($con);
         header('location: funkindyvakmanage.php');





?>

<?php include 'footermain.php';?>