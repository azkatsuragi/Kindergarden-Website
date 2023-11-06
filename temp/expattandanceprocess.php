<?php 

include 'smartsession.php';
if(!session_id())
{
  session_start();
}

 
include('dbconnect.php'); 

$gid = $_SESSION['uid'];
$k_mykid = $_POST['k_mykid'];
$week = $_POST['week'];
$wholeweek = $_POST['wholeweek'];
$note = $_POST['note'];
$expid = $_POST['expid'];



if(isset($_POST["upload"])){
    // $data = $_POST['data'];
    // $allData=implode(", ", $data);
    // echo $allData;

    //Get the name of images
    // $getname = $_FILES['image']['name'];

    // //image path
    // $image_Path = "uploads/".basename($getname);

    $sqlim = "INSERT into tb_expattendance (week, wholeweek, note, k_mykid, g_id, exp_att, exp_id) VALUES ('$week','$wholeweek', '$note', '$k_mykid', '$gid', '1',
      '$expid')";
                  

    $sql_run = mysqli_query ($con,$sqlim);
    // if(move_uploaded_file($_FILES['image']['tmp_name'], $image_Path)){
    //     echo "Your Image uploaded successfully";
    // }else{
    //     echo "No Insert Image";
    // }      
}

if($sql_run){
  $_SESSION['expid'] = "Successfully Fill In Attendance!";
  header('location: manageexpected.php');
}
else{
  echo "Something went wrong";
}
mysqli_close($con);



?>

<div class="container">
  <h3>Successfully create announcement.</h3>
</div>



<?php include 'footermain.php';?>