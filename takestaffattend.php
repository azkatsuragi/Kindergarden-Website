<?php 
include 'smartsession.php';
include 'dbconnect.php';
include 'headerstaff.php';

date_default_timezone_set('Singapore');

if (!session_id())
{
    session_start();
}

$user_id =$_SESSION['uid'];
?> 
   
<div class = "container">
    <br>  
        <fieldset>
                <form method ="POST" action="takestaffattendprocess.php" enctype="multipart/form-data">
      <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Take Staff Attendance (Today's Date : <?php echo $todaysDate = date("d-m-Y");?>)</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="staff.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Take Staff Attendance</li>
            </ol>
          </div>

      <?php
        date_default_timezone_set('Singapore');
        $date = date('d/m/Y h:i:s a', time());
        echo "$date";
      ?>
      
      <div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4"> Select Event </label>
       <select name="attend_event">
        <option value ="Clock In">Clock In</option>
        <option value ="Clock Out">Clock Out</option>
        </select>

      <div class="form-group">
      Select RTK file attachment to upload:
  
      <input type="file" name="image"><br><br>
        <label for="floatingInput"> Note: Only PDF, JPG, JPEG, PNG file are accepted** </label>

 
      </div>
        <br>
      
         <div class=form-group>
        <button class="btn btn-warning" name="upload">Enter</button>
        <button type="reset" class="btn btn-primary">Reset</button>
          </div>
    <br><br>
         
  </fieldset>
 </form>
    <br><br>
    </div>

<?php include 'footermain.php'; ?>


