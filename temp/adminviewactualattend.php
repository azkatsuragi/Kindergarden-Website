<?php 
error_reporting(0);
include 'dbconnect.php';
include 'smartsession.php';
include 'head.php';
include 'staff.php';

if (!session_id())
{
  session_start();
}


?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Class Attendance</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">View Class Attendance</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">View Class Attendance</h6>
                    <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group row mb-3">
                        <div class="col-xl-6">
                        <label class="form-control-label">Select Date<span class="text-danger ml-2">*</span></label>
                            <input type="date" class="form-control" name="dateTaken" id="exampleInputFirstName" placeholder="class">                          
                        </div></div> 
                        <label f/divor="exampleSelect1" class="form-control-label"> Select Programme </label>
                        <select name="programme">
                        <option value ="1">Fun KindyLand</option>
                        <option value ="2">Little Explorer</option>
                        </select>
                    
                   <br><br>
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
                        <th>Class</th>
                        <th>Session</th>
                        <th>Date</th>
                        <th>Attendance Status</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                   
                    <tbody>

                  <?php

                    if(isset($_POST['view'])){

                      $dateTaken =  $_POST['dateTaken'];
                      $program =  $_POST['programme'];

                      $query = "SELECT tb_actualattendance.attendance_status,tb_actualattendance.attendance_date,tb_program.programName,
                      tb_class.className,tb_session.sessionName,tb_session.sessionId,tb_program.programName,
                      tb_kidprogram.k_name,tb_kidprogram.k_mykid
                      FROM tb_actualattendance
                      INNER JOIN tb_program ON tb_program.programId = tb_actualattendance.programId
                      INNER JOIN tb_class ON tb_class.classId = tb_actualattendance.classId
                      INNER JOIN tb_session ON tb_session.sessionId = tb_actualattendance.sessionTermId
                      INNER JOIN tb_kidprogram ON tb_kidprogram.k_mykid = tb_actualattendance.k_mykid
                      where tb_actualattendance.attendance_date = '$dateTaken' and tb_actualattendance.programId = '$program ' and actual_status !='2'";
                      
                      $rs = $con->query($query);
                      $num = $rs->num_rows;
                      $sn=0;
                      $status="";
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
                              if($rows['attendance_status'] == '1'){$status = "Present"; 
                                $colour="#00FF00";}
                                else
                                  {$status = "Absent";
                                   $colour="#FF0000";
                                  }
                             $sn = $sn + 1;
                            echo"
                              <tr>
                                <td>".$sn."</td>        
                                <td>".$rows['k_mykid']."</td>
                                <td>".$rows['k_name']."</td>
                                <td>".$rows['programName']."</td>
                                <td>".$rows['className']."</td>
                                <td>".$rows['sessionName']."</td>
                                <td>".$rows['attendance_date']."</td>
                                <td style='background-color:".$colour."'>".$status."</td><td>

                                <a onClick=\" javascript: confirm('Are you sure to delete this?');\" href='actualattenddelete.php?id=".$rows['k_mykid']."' class = 'btn btn-danger' >Delete</a></td></tr>";
                                                           
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
       <?php include "Includes/footer.php";?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery.min.js"></script>
  <script src="vendor/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
   <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->

</body>

</html>