<?php 

include 'dbconnect.php';
include 'smartsession.php';
include 'headerstaff.php';

if (!session_id())
{
    session_start();
}

date_default_timezone_set('Singapore');

?>

    <div class = "container">
    <br>  
        <fieldset>
             <form action="mcprocess.php" method="post" enctype="multipart/form-data">
                <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Staff MC Attachment</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="staff.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Staff MC Attachment</li>
            </ol>
          </div>

                <?php
                echo date("d/m/Y") ;
                ?>
                 <?php
                echo date("h:i:sa");
                ?>
      
       <div class="form-group">
       </div><br>
                    <label for="floatingInput"> Absence Reason</label>
                    <input type="text" name="note" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your absence reason..." required>
                    

                <br>
                            
      <div class="form-group">Select MC Attachment:
  <input type="file" name="image">
  <br><br>
  <label for="floatingInput"> Note: Only PDF, JPG, JPEG, PNG file are accepted** </label>
</div><br>

    <input type="submit" name="upload" class= "btn btn-warning" value="Submit">
    <input type="reset" name="reset" class= "btn btn-primary" value="Reset">
     

                </div>
           
            
        </fieldset>
        </form>
    <br><br><br>

    </div>

<?php include 'footermain.php'; ?>
