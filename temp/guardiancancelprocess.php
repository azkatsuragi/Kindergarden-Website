
<?php 
include 'smartsession.php';
if(!session_id())
{
     session_start();
}


include ('dbconnect.php');
$mykid = $_POST['mykid'];
$fstatus = $_POST['fstatus'];

//UPDATE booking status 
$sql = "UPDATE tb_kidprogram 
        SET  k_status='4'
        WHERE k_mykid= '$mykid'";

//var_dump($sql);

mysqli_query ($con,$sql);
mysqli_close($con);



header ('location: kidprogramcustomermanage.php');

?>