<?php 
include ('dbconnect.php');
include 'smartsession.php';
include 'headerstaff.php';
if(!session_id())
{
    session_start();
}


//Retrieve activity
$sql = "SELECT * FROM tb_activity WHERE n_status!='2' AND audiance = '3'";
  
$result = mysqli_query($con, $sql);


?>

<?php

if(isset($_SESSION['nid'])){
?>
<div class="alert alert-success">
  <strong>Success! </strong><?php
  echo $_SESSION['nid'];

?>
</div>

<?php
  unset($_SESSION['nid']);
}

?>



<!-- Activity Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Activity</h1>
            <p>Coming Activity</p>
        </div>
        <?php
        while($row=mysqli_fetch_array($result))
        {?>

         <div align="center">
            <br><br>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="classes-item">
                    <div class="bg-light rounded-rectangle w-75 mx-auto p-3">
                        <?php echo "<img class='img-fluid rounded-rectangle' src='uploads/".$row['n_pic']."'>" ?>
                        
                    </div>
                    
                    <div class="bg-light rounded p-4 pt-5 mt-n5">
                        <h1 class="d-block text-center h3 mt-3 mb-4"><?php echo $row['n_name']?></h1>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center">
                                
                                <div class="ms-3">
                                    <p class="text-primary mb-1"><?php echo $row['n_desc']?></p>
                                   
                                </div>
                            </div>
                            
                        </div>
                        <div class="row g-1">
                            <div class="col-4">
                                <div class="border-top border-3 border-primary pt-2">
                                    <h6 class="text-primary mb-1">Date</h6>
                                    <small><?php echo $row['n_date'] ?></small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border-top border-3 border-success pt-2">
                                    <h6 class="text-success mb-1">Time:</h6>
                                    <small><?php echo $row['n_time'] ?></small>
                                </div>
                            </div>
                                <div class="col-4">
                                <div class="border-top border-3 border-warning pt-2">
                                    <h6 class="text-warning mb-1">Location</h6>
                                    <small><?php echo $row['ac_location']?></small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border-top border-3 border-info pt-2">
                                    <h6 class="text-info mb-1">Environment</h6>
                                    <small><?php echo $row['ac_environment']?></small>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
           
 <?php } ?>
</div>



<?php include 'footeradmin.php' ?>