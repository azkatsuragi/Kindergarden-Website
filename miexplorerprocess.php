<?php
include 'smartsession.php';

if(!session_id())
{
     session_start();
}


include("dbconnect.php");

$mikid = $_POST['mikid'];
$midate = $_POST['midate'];
$misession = $_POST['misession'];
$k_mykid = $_POST['k_mykid'];
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




       $sql = "INSERT INTO tb_multiple ( mu_id, mu_kid, mu_bahasa, mu_logik, mu_fizikal,mu_music, mu_visual, mu_kine, mu_inter, mu_intra, mu_naturalis,mu_exis, mu_prog,mu_class,mi_date)
        VALUES ('$mikid','$k_mykid', '$mibahasa','$milogik','$mifizik', '$mimusic','$mivisual','$mikine','$miinter', '$miintra','$minatu','$miexist','1','$misession', '$midate')
        ";

        mysqli_query($con, $sql);
       
        mysqli_close($con);
         header('location: miexplorermanage.php');





?>

<?php include 'footermain.php';?>