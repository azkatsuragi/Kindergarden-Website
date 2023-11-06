<?php 


include 'headermain.php';
include ('dbconnect.php');


//Retrieve announcement
$sql = "SELECT * FROM tb_announcement WHERE ann_status!='2'AND audience = '1'";
  
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
        <div class="row g-3">
        <?php
        while($row=mysqli_fetch_array($result))
        {?>
            <div class="col-lg-4 col-md-4">
                <div class="fh5co-blog animate-box fadeInUp animated-fast">
                    <div class="blog-img-holder" style="background-image: url(uploads/<?php echo $row['ann_pic'] ?>); width: 100%; height: 200px; background-size: cover;"></div>
                    <div class="blog-text">
                        <h3><?php echo $row['ann_name']?></h3>
                        <span class="posted_on"><?php echo $row['ann_date'] ?>, <?php echo $row['ann_time'] ?></span>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>
<!-- Announcement End -->





<?php include 'footermain.php' ?>