<?php
include ('dbconnect.php');
include 'smartsession.php';
include 'headerstaff.php';
if(!session_id())
{
    session_start();
}

$sql = "SELECT * FROM tb_announcement WHERE ann_status!='2' AND audience = '3'";
  
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

<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-2">
      <!-- class section -->
      <div class="col-lg-6">
        <div class="row g-2">
          <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="facility-item">
	            <div class="facility-icon bg-warning">
					<span class="bg-warning"></span>
					<i class="fa fa-home fa-3x text-warning"></i>
					<span class="bg-warning"></span>
				</div>
				<div class="facility-text bg-warning">
					<h3 class="text-warning mb-3">Little Explorer</h3>
					<p class="mb-0">Eirmod sed ipsum dolor sit rebum magna erat lorem kasd vero ipsum sit</p>
				</div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
            <div class="facility-item">
	            <div class="facility-icon bg-info">
					<span class="bg-info"></span>
					<i class="fa fa-chalkboard-teacher fa-3x text-info"></i>
					<span class="bg-info"></span>
				</div>
				<div class="facility-text bg-info">
					<h3 class="text-info mb-3">Fun Kindy Land</h3>
					<p class="mb-0">Eirmod sed ipsum dolor sit rebum magna erat lorem kasd vero ipsum sit</p>
				</div>
            </div>
          </div>
        </div>
      </div>

      <!-- announcement section -->
      <div class="col-lg-6">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
          <h1 class="mb-3">Announcement</h1>
            <p>Here are the important announcement.</p>
        </div>
        <?php
          while($row=mysqli_fetch_array($result))
          {?>
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

        <?php
          }
        ?>
      </div>
    </div>
  </div>
</div>
<?php include 'footeradmin.php' ?>