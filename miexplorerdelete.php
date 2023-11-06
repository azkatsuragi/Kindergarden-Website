<?php 
include 'smartsession.php';
if(!session_id())
{
     session_start();
}


include ('dbconnect.php');
if(isset($_GET['id']))
{
    $miid = $_GET['id'];
}


//SQL DELETE 
$sql = "DELETE FROM tb_multiple  WHERE  mu_id= '$miid' ";

$result = mysqli_query ($con,$sql);

mysqli_close($con);



header ('location: miexplorermanage.php');

?>