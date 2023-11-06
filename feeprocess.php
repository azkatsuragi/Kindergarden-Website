<?php

include ('dbconnect.php');
include 'smartsession.php';
if(!session_id())
{
    session_start();
}


$kidid = $_POST['kidid'];
$paydate = $_POST['paydate'];
$feeinfo = $_POST['feeinfo'];
$feetype = $_POST['feetype'];
$debit = $_POST['debit'];

$fee = "SELECT * FROM tb_feeinfo";
$plus = mysqli_query($con, $fee);
$add = mysqli_fetch_array($plus);

if ($feetype == 1)
	$total = $add['fi_anual'] + $add['fi_monthly'] + $add['fi_deposit'];
else if ($feetype == 2)
	$total = $add['fi_monthly'];
else if ($feetype == 3)
	$total = $add['fi_meals']/2;
else
	$total = $add['fi_meals'];

$credit = $total - $debit;

$date = date('Y-m-d');

//upload file
$tipe_file = $_FILES['f_resit']['type'];
if ($tipe_file == "application/pdf")

{

	$nama_file = trim($_FILES['f_resit']['name']);

	$sql="INSERT INTO tb_fee(f_date, f_month, f_total, f_credit, f_debit, f_info, f_type, f_kids, f_status)
		VALUES ('$date','$paydate', '$total', '$credit', '$debit', '$feeinfo', '$feetype', '$kidid', '1')";
	mysqli_query($con,$sql); //simpan data judul dahulu untuk mendapatkan id

	//dapatkan id terakhir
	$query = mysqli_query($con,"SELECT f_invoice FROM tb_fee ORDER BY f_invoice DESC LIMIT 1");
	$data  = mysqli_fetch_array($query);

	//mengganti nama pdf
	$nama_baru = "file_".$data['f_invoice'].".pdf"; //hasil contoh: file_1.pdf
	$file_temp = $_FILES['f_resit']['tmp_name']; //data temp yang di upload
	$folder    = "file"; //folder tujuan

	move_uploaded_file($file_temp, "$folder/$nama_baru"); //fungsi upload
	//update nama file di database
	mysqli_query($con,"UPDATE tb_fee SET f_resit='$nama_baru' WHERE f_invoice='$data[f_invoice]' ");

	$notification = "Successfully upload file.";
	header('location: feeguardian.php');

}

else
{
	$notification ="Fail to upload file!";
	header('location: fee.php');
}

?>