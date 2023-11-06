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





       $sql = "INSERT INTO tb_subject ( fun_id,fun_mykid,fun_class,fun_prog,fun_date, manner_bm, manner_bi, manner_ba, manner_math,manner_sains, manner_art, manner_agama, manner_sport, writing_bm,writing_bi,writing_ba,writing_math,writing_sains,writing_art,writing_agama,writing_sport,reading_bm,reading_bi,reading_ba,reading_math,reading_sains,reading_art,reading_agama,reading_sport,counting_math)

        VALUES ('$subid','$k_mykid','$session','2','$subdate', '$bmfmanner','$bifmanner','$bafmanner','$mfmanner','$sfmanner', 
          '$artfmanner','$pfmanner','$gymfmanner','$bmfwrite','$bifwrite','$bafwrite','$mfwrite','$sfwrite','$artfwrite','$pfwrite','$gymfwrite','$bmfread','$bifread','$bafread','$mfread','$sfread','$artfread','$pfread','$gymfread','$mfcount')
        ";

        mysqli_query($con, $sql);
       
        mysqli_close($con);
         header('location: funkindymanage.php');





?>

<?php include 'footermain.php';?>