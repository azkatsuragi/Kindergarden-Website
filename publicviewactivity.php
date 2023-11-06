<?php 

include 'headermain.php';
include ('dbconnect.php');


//Retrieve activity
$sql = "SELECT * FROM tb_activity WHERE n_status!='2'AND audiance = '1'";
  
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
		<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
			<h1 class="mb-3">Activity</h1>
			<p>Coming Activity</p>
		</div>
		<div class="row g-4">
		<?php while($row=mysqli_fetch_array($result)) { ?>
			<div class="col-lg-4 col-md-4">
				<div class="fh5co-blog animate-box fadeInUp animated-fast">
					<div class="blog-img-holder" style="background-image: url(uploads/<?php echo $row['n_pic'] ?>); width: 100%; height: 200px; background-size: cover;"></div>
					<div class="blog-text">
						<h3><?php echo $row['n_desc']?></h3>
						<span class="posted_on"><?php echo $row['n_date'] ?>, <?php echo $row['n_time'] ?>, <?php echo $row['ac_location']?></span>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</div>



<?php include 'footermain.php' ?>