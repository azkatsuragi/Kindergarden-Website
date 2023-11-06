<?php 
include 'smartsession.php';
if(!session_id())
{
     session_start();
}


include ('dbconnect.php');
if(isset($_GET['id']))
{
    $subid = $_GET['id'];
}


//SQL DELETE 
$sql = "DELETE FROM tb_subject  WHERE  fun_id= '$subid' ";

$result = mysqli_query ($con,$sql);

mysqli_close($con);



header ('location: funkindymanage.php');

?>