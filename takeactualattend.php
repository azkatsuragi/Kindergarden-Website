<?php 

error_reporting(0);

include ('dbconnect.php');
include 'smartsession.php';
include 'headerstaff.php';
if(!session_id())
{
    session_start();
}

$user_id =$_SESSION['uid'];
$sessionId =$_POST['sessionId'];

    $query = "SELECT * 
    FROM tb_staff
    LEFT JOIN tb_program ON tb_staff.program= tb_program.prog_id
    WHERE tb_staff.s_id = '$user_id'";

    $rs = $con->query($query);
    $num = $rs->num_rows;
    $rrw = $rs->fetch_assoc();

    $programId = $rrw['program'];
    $dateTaken = date("Y-m-d");
                  
        $qurty=mysqli_query($con,"SELECT * FROM tb_actualattendance WHERE programId = '$programId' AND sessionId  = '$sessionId' AND attendance_date='$dateTaken'");
        $count = mysqli_num_rows($qurty);
        //var_dump($programId);

        if($count == 0){ //if Record does not exist, insert the new record

          //insert the students record into the tb_actualattendance with 2 first
          $sql = "SELECT * FROM tb_kidprogram  WHERE k_programme = '$programId' AND k_session = '$sessionId'AND k_status='2'";

          $qus=mysqli_query($con,$sql);
          
          while ($ros = $qus->fetch_assoc())
          {
            $sql = "INSERT INTO tb_actualattendance(k_mykid,programId,sessionId,attendance_status,attendance_date,actual_status,s_id) 
              VALUES('$ros[k_mykid]','$programId','$sessionId','2','$dateTaken','1','$user_id')";
              
             $qquery=mysqli_query($con,$sql);

          }
        }
        else

        echo "<script>
             alert('Attendance has been taken today!'); 
     </script>";


if(isset($_POST['save'])){
    
    $admissionNo=$_POST['k_mykid'];
    $check=$_POST['check'];
    $N = count($admissionNo);
    $status = "";


//check if the attendance has not been taken i.e if no record has a attend_status of 2
  $qurty=mysqli_query($con,"SELECT * FROM tb_actualattendance  WHERE programId = '$programId' and sessionId = '$sessionId' and attendance_date= '$dateTaken' and attendance_status != '3'");

  $count = mysqli_num_rows($qurty);

  if($count > 0){

      echo "<script>alert('Today's attendance have been recorded!')</script>";

  }

    else //update the status to 1 for the checkboxes checked
    {

        for($i = 0; $i < $N; $i++)
        {
                $admissionNo[$i]; //admission Number

                if(isset($check[$i])) //the checked checkboxes
                {
                      $qquery=mysqli_query($con,"UPDATE tb_actualattendance SET attendance_status='1' WHERE k_mykid = '$check[$i]' AND attendance_date='$dateTaken'");
                      if ($qquery) {

                          $statusMsg = "<div class='alert alert-success' role='alert'>Attendance Taken Successfully!</div>";
                      }
                      else
                      {
                          $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
                      }
                                      
                }
          }

                      
   }


}


?>

<body id="page-top">
  <div id="wrapper">
           <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Take Student Attendance (Today's Date : <?php echo $todaysDate = date("d-m-Y");?>)</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="staff.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">All Student in Class</li>
            </ol>
          </div>

           <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Select Programme Session  </h6> 
                    
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group row mb-3">
                                                <div class=>
                        <label class="form-control-label">Select Session<span class="text-danger ml-2">*</span></label>
                           
                        <?php 
      $sql="SELECT * FROM tb_session ";
      $result = mysqli_query($con,$sql);

      echo '<select class="form-select" name="sessionId" id="exampleSelect1">';

      while($row=mysqli_fetch_array($result))
      {
        echo '<option value= "'.$row["session_id"].'">'.$row["session_desc"].'</option>';
      }
      echo '</select>';

      ?>       
                    
                         </div></div>
                    <button type="submit" name="enter" class="btn btn-primary">Enter </button>
                  </form>
                </div>
              </div>

              <!-- Input Group -->
        <form method="post" >
            <div class="row">
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <?php 
                  if ($sessionId=='1')
                    $classn='Morning';
                  else
                    $classn='Morning+Afternoon';
                    ?>
                    <?php 
                 
                    ?>

                  <h6 class="m-0 font-weight-bold text-primary">All Student in (<?php echo $rrw['prog_type'].' - '.$classn; ?>) Class</h6>
                  <h6 class="m-0 font-weight-bold text-danger">Note: <i>Click on the checkboxes besides each student to take attendance!</i></h6>
                </div>
                <div class="table-responsive p-3">
                <?php echo $statusMsg; ?>

                  <table class="table align-items-center table-flush table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Student No</th>
                        <th>Student Name</th>
                        <th>Programme</th>
                        <th>Session</th>
                        <th>Tick</th>
                      </tr>
                    </thead>        
                    <tbody>

                  <?php
                      $query = "SELECT tb_kidprogram.k_mykid,tb_kidprogram.k_name, tb_program.prog_type,tb_session.session_desc
                      FROM tb_kidprogram
                      INNER JOIN tb_program ON tb_program.prog_id = tb_kidprogram.k_programme
                      INNER JOIN tb_session ON tb_session.session_id = tb_kidprogram.k_session
                      WHERE tb_session.session_id='$sessionId' AND tb_program.prog_id='$programId' AND tb_kidprogram.k_status='2'";

                      $rs = $con->query($query);
                      $num = $rs->num_rows;
                      $sn=0;
                      $status="";
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
                             $sn = $sn + 1;
                            echo"
                              <tr>
                                <td>".$sn."</td>
                                <td>".$rows['k_mykid']."</td>
                                <td>".$rows['k_name']."</td>
                                <td>".$rows['prog_type']."</td>
                                <td>".$rows['session_desc']."</td>
                                <td><input name='check[]' type='checkbox' value=".$rows['k_mykid']."></td>
                              </tr>";
                              echo "<input name='k_mykid[]' value=".$rows['k_mykid']." type='hidden' class='form-control'>";
                          }
                      }
                     
                      
                      ?>
                    </tbody>
                  </table>
                  <br>
                  <button type="submit" name="save" class="btn btn-primary">Take Attendance</button>
                  </form>
                </div>
              </div>
            </div>
            </div>
          </div>

        </div>

      </div>

       <?php include "footermain.php";?>

    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 
  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>