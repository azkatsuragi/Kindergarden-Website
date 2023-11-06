<?php 

include ('dbconnect.php');
include 'smartsession.php';
include 'headeradmin.php';
if(!session_id())
{
    session_start();
}

//Retrieve announcement
$sql = "SELECT * FROM tb_announcement WHERE ann_status!='2'";
  
$result = mysqli_query($con, $sql);

//$query = $db->query("SELECT * FROM tb_announcement ORDER BY ann_pic ASC");

//if($result->num_rows > 0){
 // while($row = $result->fetch_assoc()){
   // $imageURL = 'uploads/'.$row['ann_pic'];
// while($row=mysqli_fetch_array($result))

?>

<?php

if(isset($_SESSION['announceid'])){
?>
<div class="alert alert-success">
  <strong>Success! </strong><?php
  echo $_SESSION['announceid'];

?>
</div>

<?php
  unset($_SESSION['announceid']);
}

?>


<!-- Announcement Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Announcement</h1>
            <p>Here are the important announcement.</p>
        </div>
        <div class="announcement-container" style="display: flex; flex-direction: row;">
          <?php while($row=mysqli_fetch_array($result)) { ?>
            <div class="announcement">

         <div align="center">
            <br><br>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="classes-item">
                    <div class="bg-light rounded-rectangle w-75 mx-auto p-3">
                        <?php echo "<img class='img-fluid rounded-rectangle' src='uploads/".$row['ann_pic']."'>" ?>
                          
                    </div>

                    <div class="bg-light rounded p-4 pt-5 mt-n5">
                        <h1 class="d-block text-center h3 mt-3 mb-4"><?php echo $row['ann_name']?></h1>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center">
                                
                                <div class="ms-3">
                                    <p class="text-primary mb-1"><?php echo $row['ann_desc']?></p>
                                   
                                </div>
                            </div>
                            
                        </div>
                        <div class="row g-1">
                            <div class="col-4">
                                <div class="border-top border-3 border-primary pt-2">
                                    <h6 class="text-primary mb-1">Date</h6>
                                    <small><?php echo $row['ann_date']?></small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border-top border-3 border-success pt-2">
                                    <h6 class="text-success mb-1">Time:</h6>
                                    <small><?php echo $row['ann_time']?></small>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>
</div>
            
          
    
</div>
<!-- Announcement End -->








<?php include 'footermain.php';?>
