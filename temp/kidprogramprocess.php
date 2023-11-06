<?php
include("smartsession.php");

if(!session_id())
{
     session_start();
}

include ('dbconnect.php');

$uid = $_SESSION['uid'];
$gname = $_POST['gname'];
$gphone = $_POST['gphone'];
$gocc = $_POST['gocc'];
$fallergy = $_POST['fallergy'];
$fkidname = $_POST['fkidname'];
$fkidid = $_POST['fkidid'];
$fdob = $_POST['fdob'];
$fallergy = $_POST['fallergy'];
$ffood = $_POST['ffood'];
$fcolor = $_POST['fcolor'];
$ftoys = $_POST['ftoys'];
$fdiapers = $_POST['fdiapers'];
$fsession = $_POST['fsession'];
$fprogram = $_POST['fprogram'];
$fmeals = $_POST['fmeals'];
$frdate = $_POST['frdate'];

if($fprogram == '1' AND $fsession == '1')
{
	if($fmeals == '1')
		$fee = '1';
	else
		$fee = '5';
}
else if($fprogram == '1' AND $fsession == '2')
{
	if($fmeals == '1')
		$fee = '2';
	else
		$fee = '6';
}
else if($fprogram == '2' AND $fsession == '1')
{
	if($fmeals == '1')
		$fee = '3';
	else
		$fee = '7';
}
else if($fprogram == '2' AND $fsession == '2')
{
	if($fmeals == '1')
		$fee = '4';
	else
		$fee = '8';
}

$sql = "INSERT INTO tb_kidprogram (g_id, k_mykid, k_name, k_dob, k_allergy, k_color, k_food, k_toys, k_diapers, k_programme, k_session, k_feeinfo, k_appointmentdate, k_status, k_feestatus)
     VALUES ('$uid','$fkidid','$fkidname','$fdob','$fallergy','$fcolor','$ffood','$ftoys','$fdiapers','$fprogram','$fsession', '$fee','$frdate', '1', '1')";

mysqli_query($con,$sql);
mysqli_close($con);

header('location: kidprogramcustomermanage.php');


?>

<br><br><br><br>
<div class = "container">
	<h3>Program Registration succesful. Kindly wait for interview information</h3>
	 <a href = "guardian.php">Main Page</a>
</div>
<br><br><br><br>
<?php include 'footermain.php';?>