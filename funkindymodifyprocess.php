<?php
include 'smartsession.php';

if(!session_id())
{
     session_start();
}

include("dbconnect.php");

$subid = $_POST['subid'];
$subdate = $_POST['subdate'];
$k_mykid = $_POST['k_mykid'];
$session = $_POST['session'];

$bmfmanner = $_POST['bmfmanner'];
$bmfwrite = $_POST['bmfwrite'];
$bmfread = $_POST['bmfread'];

$bifmanner = $_POST['bifmanner'];
$bifwrite = $_POST['bifwrite'];
$bifread = $_POST['bifread'];

$bafmanner = $_POST['bafmanner'];
$bafwrite = $_POST['bafwrite'];
$bafread = $_POST['bafread'];

$mfmanner = $_POST['mfmanner'];
$mfwrite = $_POST['mfwrite'];
$mfread = $_POST['mfread'];
$mfcount = $_POST['mfcount'];

$sfmanner = $_POST['sfmanner'];
$sfwrite = $_POST['sfwrite'];
$sfread = $_POST['sfread'];

$artfmanner = $_POST['artfmanner'];
$artfwrite = $_POST['artfwrite'];
$artfread = $_POST['artfread'];

$pfmanner = $_POST['pfmanner'];
$pfwrite = $_POST['pfwrite'];
$pfread = $_POST['pfread'];

$gymfmanner = $_POST['gymfmanner'];
$gymfwrite = $_POST['gymfwrite'];
$gymfread = $_POST['gymfread'];





       $sql = "UPDATE tb_subject 
               SET fun_id='$subid',fun_mykid='$k_mykid',fun_class='$session',fun_prog='2',fun_date='$subdate', manner_bm= '$bmfmanner', manner_bi='$bifmanner', manner_ba='$bafmanner', manner_math='$mfmanner',manner_sains='$sfmanner', manner_art= '$artfmanner', manner_agama='$pfmanner', manner_sport='$gymfmanner', writing_bm='$bmfwrite',writing_bi='$bifwrite',writing_ba='$bafwrite',writing_math='$mfwrite',writing_sains='$sfwrite',writing_art='$artfwrite',writing_agama='$pfwrite',writing_sport='$gymfwrite',reading_bm='$bmfread',reading_bi='$bifread',reading_ba='$bafread',reading_math='$mfread',reading_sains='$sfread',reading_art='$artfread',reading_agama='$pfread',reading_sport='$gymfread',counting_math=$mfcount')
                WHERE fun_id='$subid'
        ";

        mysqli_query($con, $sql);
       
        mysqli_close($con);
         header('location: funkindymanage.php');





?>

<?php include 'footermain.php';?>