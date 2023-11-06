<?php 

error_reporting(0);

include 'dbconnect.php';
include 'smartsession.php';
include 'headerstaff.php';

if (!session_id())
{
  session_start();
}

$user_id =$_SESSION['uid'];

    $query = "SELECT * 
    FROM tb_staff
    LEFT JOIN tb_program ON tb_staff.program = tb_program.prog_id
    WHERE tb_staff.s_id = '$user_id'";

    $rs = $con->query($query);
    $num = $rs->num_rows;
    $rrw = $rs->fetch_assoc();
    $programId = $rrw['program'];

?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Class Attendance</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="staff.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">View Class Attendance</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">View Class Attendance </h6> 
                    <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group row mb-3">
                        <div class="col-xl-5">
                        <label class="form-control-label">Select Date<span class="text-danger ml-2">*</span></label>
                            <input type="date" class="form-control" name="dateTaken" id="exampleInputFirstName" placeholder="class">
                        </div><br><br><br><br>
                        <div class="col-xl-5">
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
                    <button type="submit" name="view" class="btn btn-primary">View Attendance</button>
                  </form>
                </div>
              </div>

              <!-- Input Group -->
                 <div class="row">
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Class Attendance</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Student No.</th>
                        <th>Student Name</th>
                        <th>Programme</th>
                        <th>Session</th>
                        <th>Date</th>
                        <th>Attendance Status</th>
                         <th>Action</th>
                      </tr>
                      </tr>
                    </thead>
                   
                    <tbody>

                  <?php

                    if(isset($_POST['view'])){

                      $dateTaken =  $_POST['dateTaken'];
                      $sessionId =  $_POST['sessionId'];


                      $query = "SELECT tb_actualattendance.attendance_status,tb_actualattendance.attendance_date,tb_program.prog_type,
                      tb_session.session_desc,
                      tb_kidprogram.k_name,tb_kidprogram.k_mykid
                      FROM tb_actualattendance
                      INNER JOIN tb_program ON tb_program.prog_id = tb_actualattendance.programId
                      INNER JOIN tb_session ON tb_session.session_id = tb_actualattendance.sessionId
                      INNER JOIN tb_kidprogram ON tb_kidprogram.k_mykid = tb_actualattendance.k_mykid
                      where tb_actualattendance.attendance_date = '$dateTaken' and tb_actualattendance.programId = '$programId' and tb_actualattendance.sessionId = '$sessionId' AND actual_status='1'";
                      $rs = $con->query($query);
                      $num = $rs->num_rows;
                      $sn=0;
                      $status="";
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
                              if($rows['attendance_status'] == '1'){$status = "Present"; $colour="#00FF00";}else{$status = "Absent";$colour="#FF0000";}
                             $sn = $sn + 1;
                            echo"
                              <tr>
                                <td>".$sn."</td>        
                                <td>".$rows['k_mykid']."</td>
                                <td>".$rows['k_name']."</td>
                                <td>".$rows['prog_type']."</td>
                                <td>".$rows['session_desc']."</td>
                                <td>".$rows['attendance_date']."</td>
                                <td style='background-color:".$colour."'>".$status."</td><td>
                                  <a href='takeactualattendmodify.php?id=".$rows['session_desc']."&dateTaken=".$rows['attendance_date']."' class = 'btn btn-danger' >Edit</a></td></tr>";
                                  
                                  
                          }
                      }
                      else
                      {
                           echo   
                           "<div class='alert alert-danger' role='alert'>
                            No Record Found!
                            </div>";
                      }
                    }

                  
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div>
          </div>
          <!--Row-->

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
       <?php include "footermain.php";?>
      <!-- Footer -->
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