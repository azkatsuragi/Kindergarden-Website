<?php 

error_reporting(0);
include 'dbconnect.php';
include 'smartsession.php';
include 'headeradmin.php';

if (!session_id())
{
  session_start();
}


?>

<style>
#myInput {
  background: transparent url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' class='bi bi-search' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'%3E%3C/path%3E%3C/svg%3E") no-repeat 13px center;
  background-position: 10px 10px;
  width: 100%;
  font-size: 16px;
  padding: 9px 4px 9px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
</style>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Class Attendance</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
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
                        <div class="col-xl-5">
                        <label class="form-control-label">Select Date<span class="text-danger ml-2">*</span></label>
                            <input type="date" class="form-control" name="dateTaken" id="exampleInputFirstName" placeholder="class">                          
                         </div><br><br><br><br>
                        <div class="col-xl-5">
                        <label f/divor="exampleSelect1" class="form-control-label"> Select Programme </label>
                        <?php 
                    $sql="SELECT * FROM tb_program ";
                    $result = mysqli_query($con,$sql);

                    echo '<select class="form-select" name="programme" id="exampleSelect1">';

                    while($row=mysqli_fetch_array($result))
                    {
                      echo '<option value= "'.$row["prog_id"].'">'.$row["prog_type"].'</option>';
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
                  <h6 class="m-0 font-weight-bold text-primary">Student Attendance</h6>
                </div>
                <div class="table-responsive p-3">

                  <input type="text" id="myInput" placeholder="Search student" >

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
                    </thead>
                   
                    <tbody>

                  <?php

                    if(isset($_POST['view'])){

                      $dateTaken =  $_POST['dateTaken'];
                      $program =  $_POST['programme'];

                      $query = "SELECT tb_actualattendance.attendance_status,tb_actualattendance.attendance_date,tb_program.prog_type,
                      tb_session.session_desc,tb_program.prog_type,
                      tb_kidprogram.k_name,tb_kidprogram.k_mykid
                      FROM tb_actualattendance
                      INNER JOIN tb_program ON tb_program.prog_id = tb_actualattendance.programId
                      INNER JOIN tb_session ON tb_session.session_id = tb_actualattendance.sessionId
                      INNER JOIN tb_kidprogram ON tb_kidprogram.k_mykid = tb_actualattendance.k_mykid
                      where tb_actualattendance.attendance_date = '$dateTaken' and tb_actualattendance.programId = '$program ' and actual_status ='1'";
                      
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
                                <td>".$rows['prog_type']."</td>
                                <td>".$rows['session_desc']."</td>
                                
                                <td>".$rows['attendance_date']."</td>
                                <td style='background-color:".$colour."'>".$status."</td><td>

                                <a onClick=\" javascript: confirm('Are you sure to delete this?');\" href='actualattenddelete.php?id=".$rows['attendance_date']."&p_id=".$rows['k_mykid']."' class = 'btn btn-danger' >Delete</a></td></tr>";

                            
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
                    <script>
                      myInput.addEventListener("keyup",function(){
                    var keyword = this.value;
                    keyword = keyword.toUpperCase();
                    var table_3 = document.getElementById("dataTableHover");
                    var all_tr = table_3.getElementsByTagName("tr");
                    for(var i=0; i<all_tr.length; i++){
                            var all_columns = all_tr[i].getElementsByTagName("td");
                            for(j=0;j<all_columns.length; j++){
                                if(all_columns[j]){
                                    var column_value = all_columns[j].textContent || all_columns[j].innerText;
                                    column_value = column_value.toUpperCase();
                                    if(column_value.indexOf(keyword) > -1){
                                        all_tr[i].style.display = ""; // show
                                        break;
                                    }else{
                                        all_tr[i].style.display = "none"; // hide
                                    }
                                }
                            }
                        }
                }) 
                 </script>
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

</body>

</html>