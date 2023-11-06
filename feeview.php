<?php 
include ('dbconnect.php');
include 'smartsession.php';
include 'headerguardian.php';
if(!session_id())
{
    session_start();
}

$fid    = mysqli_real_escape_string($con,$_GET['id']);
$query = mysqli_query($con,"SELECT * FROM tb_fee WHERE f_invoice='$fid'");
$data  = mysqli_fetch_array($query);
?>

<html>
<body>
<div class = "container">

<br><h3>View Fee</h3>

<center>
<embed src="file/<?php echo $data['f_resit']; ?>" type="application/pdf" width="100%" height="500">
</center>


</div>

</body>
</html>


<?php include 'footeradmin.php' ?>