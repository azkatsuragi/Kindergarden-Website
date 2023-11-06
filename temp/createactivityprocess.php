<?php


include("dbconnect.php");


$nid = $_POST['nid'];
$acname = $_POST['acname'];
$acdesc = $_POST['acdesc'];
$acdate = $_POST['acdate'];
$actime = $_POST['actime'];
$aclocation = $_POST['aclocation'];
$acenvironment = $_POST['acenvironment'];

$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check != false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


//Insert new activity into DB
$sql = "INSERT INTO tb_activity (n_ID, n_name, n_desc, n_date, n_time, ac_location, ac_environment, n_pic)
          VALUES('$nid','$acname','$acdesc','$acdate', '$actime', '$aclocation', '$acenvironment', '$target_file')";      

mysqli_query ($con,$sql);
mysqli_close($con);

header('location: activitymanage.php')

?>

<div class="container">
  <h3>Successfully create activity.</h3>
 
  
</div>


<?php include 'footermain.php';?>