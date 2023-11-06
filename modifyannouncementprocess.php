<?php 

include 'smartsession.php';
if(!session_id())
{
  session_start();
}

 
include('dbconnect.php'); 

$announceid = $_POST['announceid'];
$announcename = $_POST['announcename'];
$announcedesc = $_POST['announcedesc'];
$announcedate = $_POST['announcedate'];
$announcetime = $_POST['announcetime'];



if(isset($_POST["upload"])){
    //Get the name of images
    $getname = $_FILES['image']['name'];

    //image path
    $image_Path = "uploads/".basename($getname);
    $sqlim = "UPDATE tb_announcement 
              SET ann_name='$announcename', ann_desc='$announcedesc', ann_date='$announcedate', ann_time='$announcetime',ann_pic='$getname', ann_status='1'
              WHERE ann_ID = '$announceid'";

    $sql_run = mysqli_query ($con,$sqlim);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $image_Path)){
        mysqli_close($con);
         header('location: announcementmanage.php');
        echo "Your Image uploaded successfully";
    }else{
        echo "No Insert Image";
    }          
}

   ?>











// <div class="container">
//   <h3>Successfully create announcement.</h3>
// </div>



<?php include 'footermain.php';?>