<?php 

error_reporting(0);
include 'dbconnect.php';
include 'smartsession.php';
include 'headerstaff.php';

if (!session_id())
{
  session_start();
}

if(isset($_GET['id']))
{
   $id = $_GET['id'];
}

if(isset($_GET['dateTaken']))
{
   $dateTaken = $_GET['dateTaken'];
} 


$user_id =$_SESSION['uid'];
$classId =$_GET['id'];

if($classId=='Morning')
$classn='1';
else
$classn='2';

$query = "SELECT * 
    FROM tb_class
    LEFT JOIN tb_program ON tb_program.prog_id = tb_class.programId
    LEFT JOIN tb_session ON tb_session.session_id = tb_class.sessionId
    LEFT JOIN tb_staff ON tb_staff.s_id = tb_class.isAssigned
    WHERE tb_class.isAssigned='$user_id' AND tb_class.sessionId='$classn'";

    $rs = $con->query($query);
    $num = $rs->num_rows;
    $rrw = $rs->fetch_assoc();
    //var_dump( $rrw );
    $programId = $rrw['program'];

if(isset($_POST['update'])){
    
    $admissionNo=$_POST['k_mykid'];
    $check=$_POST['check'];
    $N = count($admissionNo);
    $status = "";

    $admissionNo=$_POST['k_mykid'];

    $check=$_POST['check'];
    $N = count($admissionNo);
    $status = "";

$sql = "SELECT * FROM tb_actualattendance  WHERE programId = '$programId' and sessionId = '$classn'AND attendance_date='$dateTaken'";

          $result=mysqli_query($con,$sql);
    
          while ($row =mysqli_fetch_array($result))
          {
            $sql = "UPDATE tb_actualattendance SET attendance_status ='2'WHERE attendance_date='$dateTaken'AND programId = '$programId' and sessionId = '$classn'";
              
             $qquery=mysqli_query($con,$sql);

          }

  $qurty=mysqli_query($con,"SELECT * FROM tb_actualattendance  WHERE programId = '$programId' and sessionId = '$classn' and attendance_date='$dateTaken'");

  $count = mysqli_num_rows($qurty);

  if($count > 0){

        for($i = 0; $i < $N; $i++)
        {
                $admissionNo[$i]; //admission Number

                if(isset($check[$i])) //the checked checkboxes
                {
                      $qquery=mysqli_query($con,"UPDATE tb_actualattendance SET attendance_status='1' WHERE k_mykid = '$check[$i]'AND attendance_date='$dateTaken'");                              
                }
               
          }
      }

     
      $msg="<div class='alert alert-success'  role='alert'>Attendance Updated Successfully!</div>";      

  
}


?>

        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Attendance (Date : <?php echo $dateTaken ;?>)</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="staff.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">All Student in Class</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
          
        <form method="post" >
            <div class="row">
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Student in (<?php echo $rrw['prog_type'].' - '.$rrw['session_desc'];?>) Class</h6>
                  <h6 class="m-0 font-weight-bold text-danger">Note: <i>Click on the checkboxes besides each student to take attendance!</i></h6>
                </div>
                <div class="table-responsive p-3">
                 <?php echo $msg ?>
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
                      WHERE tb_session.session_id='$classn' AND tb_program.prog_id='$programId' AND tb_kidprogram.k_status='2'";

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
                      else
                      {
                           echo   
                           "<div class='alert alert-danger' role='alert'>
                            No Record Found!
                            </div>";
                      }
                      
                      ?>
                    </tbody>
                  </table>
                  <br>
                  <button type="submit" name="update" class="btn btn-primary">Update</button>
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

