<?php 
include ('dbconnect.php');
include 'smartsession.php';
include 'headerstaff.php';
if(!session_id())
{
    session_start();
}
?>

<div class = "container">
    <br>
        <form method ="POST" action="staffcreateactivityprocess.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Create Activity</legend>
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
                <label for="exampleTextarea" class="form-label mt-4">Name of Activity</label>
                <input type="text" name="acname"class="form-control" id="exampleInputPassword1" placeholder="Enter Activity Name" required>
                </div>

                <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Description of Activity</label>
      <input type="text" name="acdesc" class="form-control" id="exampleTextarea" rows="2" placeholder="Enter the description" required></input>
     
    </div>

                <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Activity Date</label>
      <input type="date" name="acdate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter IC Number" required>

     
    </div>

            <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Activity Time</label>
      <input type="time" name="actime" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password" required>
    </div>

<div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Location of Activity</label>
      <input type="text" name="aclocation" class="form-control" id="exampleTextarea" rows="3" placeholder="Enter the location of Activity held" required>
     
    </div>

    <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Environment of Activity</label>
      <input type="text" name="acenvironment" class="form-control" id="exampleTextarea" rows="3" placeholder="Indoor/Outdoor" required>
     
    </div>


  <div class="form-group">
        <br>
     
  Select image to upload:
  <input type="file" name="image" >

  


     
    </div>
    <br><br>
                <button type="submit" class="btn btn-danger" name="upload">Upload Image</button>
                
        
                <button type="reset" class="btn btn-primary">Clear Form</button>

        </fieldset>
        </form>
    <br><br>
    </div>

<?php include 'footermain.php' ?>