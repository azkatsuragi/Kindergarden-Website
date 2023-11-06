<?php

include ('dbconnect.php');

if(isset($_GET['id']))
{
    $reference = $_GET['id'];
}

$sql="DELETE FROM tb_salary WHERE sa_reference = '$reference'";
mysqli_query($con,$sql);
mysqli_close($con);

header('location: salarylist.php');
 ?>