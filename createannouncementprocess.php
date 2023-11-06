<?php 

include ('dbconnect.php');
include 'smartsession.php';
//include 'headeradmin.php';
if(!session_id())
{
    session_start();
}


$audience = $_POST ['audience'];
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
    $sqlim = "INSERT INTO tb_announcement (audience, ann_name, ann_desc, ann_date, ann_time,ann_pic, ann_status)
              VALUES ('$audience','$announcename','$announcedesc','$announcedate', '$announcetime','$getname', '1')";

    $sql_run = mysqli_query ($con,$sqlim);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $image_Path)){
        echo "Your Image uploaded successfully";
    }else{
        echo "No Insert Image";
    }          
}

   





if($sql_run){
  $_SESSION['announceid'] = "Successfully insert an Announcement!";
  header('location: announcementmanage.php');
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