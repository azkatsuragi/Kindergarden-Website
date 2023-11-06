<?php
include ('dbconnect.php');
include 'smartsession.php';
//include 'headerstaff.php';
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
    $sqlim = "UPDATE tb_activity 
              SET audiance = '$audience', n_name='$acname', n_desc='$acdesc', n_date='$acdate', n_time='$actime', n_pic='$getname', n_status='1', ac_location='$aclocation', ac_environment='$acenvironment'
              WHERE n_id = '$nid'";

    $sql_run = mysqli_query ($con,$sqlim);
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
    $sqlim = "UPDATE tb_activity 
              SET n_name='$acname', n_desc='$acdesc', n_date='$acdate', n_time='$actime', n_pic='$getname', n_status='1', ac_location='aclocation', ac_environment='acenvironment'
              WHERE n_ID = '$nid'";

    $sql_run = mysqli_query ($con,$sqlim);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $image_Path)){
        mysqli_close($con);
         header('location: staffactivitymanage.php');
        echo "Your Image uploaded successfully";
    }else{
        echo "No Insert Image";
    }          
}

   ?>



<?php include 'footermain.php';?>