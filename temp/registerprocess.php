<?php
include("dbconnect.php");

$fid = $_POST['fid'];
$fpwd = $_POST['fpwd'];
$fname = $_POST['fname'];
$fphone = $_POST['fphone'];
$femail = $_POST['femail'];


$sql = "INSERT INTO tb_user (u_id, u_pwd, u_name, u_phone, u_email, u_type)
        VALUES ('$fid','$fpwd','$fname','$fphone','$femail', '3')";

mysqli_query ($con,$sql);
mysqli_close($con);

include 'headermain.php';
?>
<br><br><br><br>
<div class = "container">
	<h3>Registration succesful. Please Log In</h3>
	 <form action="login.php" >
         <button type="submit" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Log In</button>
</div>
<br><br><br><br>
<?php include 'footermain.php';?>