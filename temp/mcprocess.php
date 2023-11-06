<?php 
include ('dbconnect.php');
include 'smartsession.php';

if (!session_id())
{
    session_start();
}

$user_id =$_SESSION['user_id'];
$attendance_ID = $_POST['attendance_ID'];

//if file upload is submitted
if(isset($_POST["upload"])){
    //Get the name of images
    $getname = $_FILES['image']['name'];

    //image path
    $image_Path = "uploads/".basename($getname);

 $sql = "INSERT into tb_staffattendance (staffattend_id,attendance_timestamp, mc_attachment,attendance_status,staff_status) VALUES ('$user_id',NOW(),'$getname','2','1')";

$sql_run=mysqli_query ($con,$sql);

 if(move_uploaded_file($_FILES['image']['tmp_name'], $image_Path)){
        echo "Your Image uploaded successfully";
    }else{
        echo "No Insert Image";
    }          
}

if($sql_run){
  $_SESSION['attendance_ID'] = "Successfully Fill In Attendance!";
  header('location: staffviewmc.php');
}
else{
  echo "Something went wrong";
}

//Successful notifications
?>
