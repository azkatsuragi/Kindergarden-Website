<?php 


include 'headeradmin.php';
include ('dbconnect.php');
 ?>

<div class = "container">
    <br>
        <form method ="POST" action="createactivityprocess.php">
            <fieldset>
                <legend>Create Activity</legend>
                <br>

                <div class="form-group">
      			<label for="exampleTextarea" class="form-label mt-4">Activity ID</label>
      			<input type="text" name="nid"class="form-control" id="exampleInputPassword1" placeholder="Enter Activity ID" required>
    			</div>

               <div class="form-group">
      			<label for="exampleTextarea" class="form-label mt-4">Name of Activity</label>
      			<input type="text" name="acname"class="form-control" id="exampleInputPassword1" placeholder="Enter Activity Name" required>
    			</div>
                

               

                <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Description of Activity</label>
      <textarea name="acdesc" class="form-control" id="exampleTextarea" rows="3" placeholder="Enter the description" required></textarea>
     
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


  <!--  <div class="form-group">
    	<br>
      <form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">

</form>
     
    </div>-->

                <br>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Clear Form</button>

        </fieldset>
        </form>
    <br><br>
    </div>

<?php include 'footeradmin.php' ?>