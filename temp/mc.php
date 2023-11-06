<?php 

include 'smartsession.php';
include 'staff.php';

if (!session_id())
{
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en-US">
<head>
 <meta charset "utf-8">
</head>

    <body>
    <div class = "container">
    <br>
            <fieldset>
                <legend>Staff MC Attachment</legend>

                <?php
                echo date("d-m-Y") ;
                ?>
                 <?php
                date_default_timezone_set("Singapore");
                echo date("h:i:sa");
                ?>
      <br>
      <div class="container">
        <br>
        

      <div class="form-group">
      <form action="mcprocess.php" method="post" enctype="multipart/form-data">
  Select Image File:
</div>
  <input type="file" name="image">
</div>
<div class=col-sm-6>
    <br>
    <input type="submit" name="upload" class= "btn btn-danger" value="Submit">
</div>
     

                </div>
           
            
        </fieldset>
        </form>
    <br><br>
    </div>
</body>
</html>
