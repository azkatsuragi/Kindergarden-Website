<?php 
include ('dbconnect.php');
include 'smartsession.php';
include 'headeradmin.php';
if(!session_id())
{
    session_start();
}


//get activity ID from URL
if(isset($_GET['id']))
{
	$nid = $_GET['id'];
}

$sql = "SELECT * FROM tb_activity WHERE n_ID = '$nid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);




?>




<div class = "container">
    <br>
        <form method ="POST" action="adminmodifyactivityprocess.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Modify Activity</legend>
                <br>

                <label for="exampleSelect1" class="form-label mt-4">Activity ID : <?php echo $nid;?></label>

<div class="form-group">
        <label for="floatingInput" >Choose Audience</label>
        <?php
          $sqli = "SELECT * FROM tb_audience";
          $resulti = mysqli_query($con,$sqli);

          echo '<select class="form-select" id="exampleSelect1" name="audience">';

          while($rowi=mysqli_fetch_array($resulti))
          {
            echo'<option value="'.$rowi["audience_id"]. '" >'.$rowi["audience_desc"].'</option>';
          }
          echo '</select>';

        ?></div>

               <div class="form-group">
            <label for="exampleTextarea" class="form-label mt-4">Name of Activity</label>
            <input type="text" name="acname"class="form-control" id="exampleInputPassword1" value="<?php echo $row['n_name'];?>" required>
          </div>
                

               

                <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Description of Activity</label>
      <input type="text" name="acdesc"class="form-control" id="exampleInputPassword1" value="<?php echo $row['n_desc'];?>" required>
     
    </div>

          <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Activity Date</label>
      <input type="date" name="acdate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['n_date'];?>" required>

     
    </div>

        <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Activity Time</label>
      <input type="time" name="actime" class="form-control" id="exampleInputPassword1" value="<?php echo $row['n_time'];?>"value="<?php echo $row['n_name'];?>" required>
    </div>

<div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Location of Activity</label>
      <input type="text" name="aclocation" class="form-control" id="exampleTextarea" rows="3" value="<?php echo $row['ac_location'];?>" required>
     
    </div>

    <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Environment of Activity</label>
      <input type="text" name="acenvironment" class="form-control" id="exampleTextarea" rows="3" value="<?php echo $row['ac_environment'];?>" required>
     
    </div>


    <div class="form-group">
        <br>
     
  Select image to upload:
  <input type="file" name="image"  >
</div>
  
<input type="hidden" name="nid" value="<?php echo $row['n_id'] ?>">

     
    
    <br><br>

                <button type="submit" class="btn btn-danger" name="upload">Update</button>
                
                <!--<button type="submit" class="btn btn-success">Submit</button>-->
                <button type="reset" class="btn btn-primary">Clear Form</button>

        
</fieldset>
        </form>
    <br><br>
    </div>

<?php include 'footermain.php' ?>