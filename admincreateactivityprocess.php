<?php

include ('dbconnect.php');
include 'smartsession.php';
//include 'headeradmin.php';
if(!session_id())
{
    session_start();
}


$audience = $_POST['audience'];
$nid = $_POST['nid'];
$acname = $_POST['acname'];
$acdesc = $_POST['acdesc'];
$acdate = $_POST['acdate'];
$actime = $_POST['actime'];
$aclocation = $_POST['aclocation'];
$acenvironment = $_POST['acenvironment'];

if(isset($_POST["upload"])){
    //Get the name of images
    $getname = $_FILES['image']['name'];

    //image path
    $image_Path = "uploads/".basename($getname);
    $sqlim = "INSERT INTO tb_activity (audiance, n_name, n_desc, n_date, n_time, ac_location, ac_environment, n_pic, n_status)
              VALUES ('$audience','$acname','$acdesc','$acdate', '$actime', '$aclocation', '$acenvironment','$getname', '1')";

    $sql_run = mysqli_query ($con,$sqlim);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $image_Path)){
        echo "Your Image uploaded successfully";
    }else{
        echo "No Insert Image";
    }          
}

   





if($sql_run){
  $_SESSION['nid'] = "Successfully insert an Activity!";
  header('location: adminactivitymanage.php');
}
else{
  echo "Something went wrong";
}
mysqli_close($con);



?>

<div class="container">
  <h3>Successfully create activity.</h3>
</div>



<?php include 'footermain.php';?>

