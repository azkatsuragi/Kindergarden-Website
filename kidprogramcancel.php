
<?php 

include ('dbconnect.php');
include 'smartsession.php';
include 'headerguardian.php';
if(!session_id())
{
    session_start();
}


if(isset($_GET['id']))
{
    $mykid = $_GET['id'];
}


//Retrieve new bookings

$sql = "SELECT * FROM tb_kidprogram
      WHERE k_mykid = '$mykid'";

$result = mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

?>

<div class ="container">
   <br><h3>Comfirm to delete</h3>
    <form class="form-horizontal" method="POST" action ="guardiancancelprocess.php">
     <table class="table table-hover">
          


      <input type="hidden" name="mykid" value="<?php echo $row['k_mykid']?>">
           <a href= 'kidprogramcustomermanage.php'class ='btn btn-warning'>No</a> &nbsp
         <button type="submit" class="btn btn-primary">Yes</button>

 <br><br><br><br><br><br>

</div>

<?php include 'footermain.php';?>