<?php
include 'smartsession.php';

if(!session_id())
{
	 session_start();
}


include("dbconnect.php");

$miid = $_POST['miid'];
$midate = $_POST['midate'];
$mibahasa = $_POST['mibahasa'];
$milogik = $_POST['milogik'];
$mifizik = $_POST['mifizik'];
$mimusic = $_POST['mimusic'];
$mivisual = $_POST['mivisual'];
$mikine = $_POST['mikine'];
$miinter = $_POST['miinter'];
$miintra = $_POST['miintra'];
$minatu = $_POST['minatu'];
$miexist = $_POST['miexist'];


$sql = "UPDATE tb_multiple 
		SET mu_bahasa='$mibahasa',mu_logik='$milogik',mu_fizikal='$mifizik',mu_music='$mimusic',mu_visual='$mivisual', mu_kine= '$mikine', mu_inter='$miinter', mu_intra='$miintra', mu_naturalis='$minatu',mu_exis='$miexist'
		WHERE mu_id='$miid'";

mysqli_query($con, $sql);
mysqli_close($con);
header('location: miexplorermanage.php');





?>

<?php include 'footermain.php';?>