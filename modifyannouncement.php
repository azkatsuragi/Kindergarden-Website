<?php 
include ('dbconnect.php');
include 'smartsession.php';
include 'headeradmin.php';
if(!session_id())
{
    session_start();
}

//get announcement ID from URL
if(isset($_GET['id']))
{
	$announceid = $_GET['id'];
}

$sql = "SELECT * FROM tb_announcement WHERE ann_ID = '$announceid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);




?>




<div class = "container">
    <br>
        <form method ="POST" action="modifyannouncementprocess.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Modify Announcement</legend>
                <br>

                <label for="exampleSelect1" class="form-label mt-4">Announcement ID : <?php echo $announceid;?></label>



               <div class="form-group">
            <label for="exampleTextarea" class="form-label mt-4">Name of Announcement</label>
            <input type="text" name="announcename"class="form-control" id="exampleInputPassword1" value="<?php echo $row['ann_name'];?>" required>
          </div>
                

               

                <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Description of Announcement</label>
      <input type="text" name="announcedesc"class="form-control" id="exampleInputPassword1" value="<?php echo $row['ann_desc'];?>" required>
     
    </div>

          <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Date of Event</label>
      <input type="date" name="announcedate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['ann_date'];?>" required>

     
    </div>

        <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Time of Event</label>
      <input type="time" name="announcetime" class="form-control" id="exampleInputPassword1" value="<?php echo $row['ann_time'];?>" required>
    </div>



    <div class="form-group">
        <br>
     
  Select image to upload:
  <input type="file" name="image"  >
</div>
  
<input type="hidden" name="announceid" value="<?php echo $row['ann_ID'] ?>">

     
    
    <br><br>

                <button type="submit" class="btn btn-danger" name="upload">Update</button>
                
                <!--<button type="submit" class="btn btn-success">Submit</button>-->
                <button type="reset" class="btn btn-primary">Clear Form</button>

        
</fieldset>
        </form>
    <br><br>
    </div>

<?php include 'footermain.php' ?>