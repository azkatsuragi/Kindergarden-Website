<?php 

include ('dbconnect.php');
include 'smartsession.php';
include 'headeradmin.php';
if(!session_id())
{
    session_start();
}


$aid = $_SESSION['uid'];
?>

<div class = "container">
    <br>
        <form action="createannouncementprocess.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Create Announcement</legend>
                <br>

              <div class="form-group">
        <label for="floatingInput" >Choose Audience</label>
        <?php
          $sql = "SELECT * FROM tb_audience";
          $result = mysqli_query($con,$sql);

          echo '<select class="form-select" id="exampleSelect1" name="audience">';

          while($row=mysqli_fetch_array($result))
          {
            echo'<option value="'.$row["audience_id"]. '" >'.$row["audience_desc"].'</option>';
          }
          echo '</select>';

        ?>
      </div>

               <div class="form-group">
      			<label for="exampleTextarea" class="form-label mt-4">Name of Announcement</label>
      			<input type="text" name="announcename"class="form-control" id="exampleInputPassword1" placeholder="Enter Announcement Name" required>
    			</div>
                

               

                <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Description of Announcement</label>
      <input type="text" name="announcedesc" class="form-control" id="exampleTextarea" rows="3" placeholder="Enter the description" required></input>
     
    </div>

    			<div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Date of event</label>
      <input type="date" name="announcedate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter IC Number" required>

     
    </div>

    		<div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Time of event</label>
      <input type="time" name="announcetime" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password" required>
    </div>


  <div class="form-group">
    	<br>
     
  Select image to upload:
  <input type="file" name="image" >

  


     
    </div>
    <br><br>
                <button type="submit" class="btn btn-danger" name="upload">Upload Image</button>
                
                <!--<button type="submit" class="btn btn-success">Submit</button>-->
                <button type="reset" class="btn btn-primary">Clear Form</button>

        </fieldset>
        </form>
    <br><br>
    </div>

<?php include 'footermain.php' ?>