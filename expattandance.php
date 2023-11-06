<?php

include 'smartsession.php';

if (!session_id())
{
   session_start();
}


include ('dbconnect.php');
include 'headerguardian.php';

$gid = $_SESSION['uid'];

?>

<div class = "container">
    <br>
        <form method ="POST" action="expattandanceprocess.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Fill in Attendance</legend>
                <br>

                <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Select Kids</label>

       <?php 
      $sql="SELECT * FROM tb_kidprogram WHERE g_ic = '$gid'";

      $result = mysqli_query($con,$sql);

      echo '<select class="form-select" name="k_mykid" id="exampleSelect1">';

      while($row=mysqli_fetch_array($result))
      {
        echo '<option value= "'.$row["k_mykid"].'">'.$row["k_name"].','.$row["k_mykid"].'</option>';
      }
      echo '</select>';

      ?>
</div>


            <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Select Week</label>

       <?php 
      $sql="SELECT * FROM tb_week";

      $result = mysqli_query($con,$sql);

      echo '<select class="form-select" name="week" id="exampleSelect1">';

      while($row=mysqli_fetch_array($result))
      {
        echo '<option value= "'.$row["no_week"].'">'.$row["which_week"].'</option>';
      }
      echo '</select>';

      ?>
</div>

        <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Attendance ID</label>
      <input type="text" name="expid" class="form-control" id="exampleTextarea" rows="1" placeholder="Please enter your kid's ID and the week. Eg: 1 week 1" required></input>
     
    </div>
<br>
      <div class="form-group">
      
      <legend>Attendance Weekly</legend>

      </div>

      
        <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Weekly attendance</label>
      <input type="text" name="wholeweek" class="form-control" id="exampleTextarea" rows="1" placeholder="Please enter does your kid present or not. Eg: present/absent" required></input>
     
    </div>

    
      
        <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Note</label>
      <input type="text" name="note" class="form-control" id="exampleTextarea" rows="1" placeholder="If absent, fill in (Eg: Monday:absent, Tuesday: absent)"></input>
     
    </div>
    




 </div>
<!--  <div class="form-group">
        <br>
     
  Select RTK picture to upload:
  <input type="file" name="image" >

  


     
    </div> -->
    <br><br>
                <button type="submit" class="btn btn-danger" name="upload">Submit</button>
                
                
                <button type="reset" class="btn btn-primary">Clear Form</button>

        </fieldset>
        </form>
    <br><br>
    </div>


<?php include 'footermain.php' ?>






