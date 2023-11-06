
<?php 

include 'dbconnect.php';
include 'smartsession.php';
include 'headerstaff.php';


if (!session_id())
{
    session_start();
}

$user_id =$_SESSION['uid'];
$note =$_POST['note'];
$date = date("Y-m-d");

//if file upload is submitted
if(isset($_POST["upload"])){
    //Get the name of images
    $getname = $_FILES['image']['name'];

    //image path
    $image_Path = "uploads/".basename($getname);

 if(move_uploaded_file($_FILES['image']['tmp_name'], $image_Path)){

        $sql = "INSERT into tb_staffattendance (staffattend_id,attend_date, mc_attachment,attendance_status,staff_status,note) VALUES ('$user_id','$date','$getname','2','1','$note')";
        $sql_run=mysqli_query ($con,$sql);
        
        echo "<script>alert('Your MC uploaded successfully.')</script>";
            echo "<script type = \"text/javascript\">
            window.location = (\"staffviewmc.php\")
            </script>";

    }else{
        echo "<script>alert('No Insert Attachment. Please reupload the MC.');
         window.history.go(-1);
            </script>";

    }          

            mysqli_close($con);

}


?>

