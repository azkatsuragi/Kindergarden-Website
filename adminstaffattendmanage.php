<!DOCTYPE html>
<?php

error_reporting(0);
include ('dbconnect.php');
include 'smartsession.php';
include 'headeradmin.php';
if(!session_id())
{
    session_start();
}

  $user_qry = $con->query("SELECT * from tb_staff INNER JOIN tb_user ON tb_user.u_id=tb_staff.s_id WHERE tb_user.u_type='2'");
  $user = $user_qry->fetch_array();
  $user_name = $user['s_name'];

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

    <div class="container" style="margin-top:30px">
  <div class="card">
   <div class="card-header">
      <div class="row">
        <div class="col-md-9"><h2>Staff Attendance List</h2></div>
        <div class="col-md-3" align="right">
         
        </div>
      </div>
    </div>
    
   <div class="card-body">
    <div class="table-responsive">
        <span id="message_operation"></span>
        <input type="text" id="myInput" placeholder="Search staff" >

     <table class="table table-striped table-bordered" id="attendance_table">
      <thead>
       <tr>
              <th>NO</th>
              <th>Staff ID</th>
              <th>Name</th>
              <th>Date </th>
              <th>No. Working Hours</th>
              <th>RTK picture</th>
              <th>Action</th>
              
            </tr>
          </thead>
          <tbody>
          <?php
            $attendance_qry = "SELECT * FROM tb_staffattendance 
            LEFT JOIN tb_staff ON tb_staffattendance.staffattend_id = tb_staff.s_id WHERE attendance_status = '1' AND staff_status != '2'";
                        $result = mysqli_query($con,$attendance_qry);                          
            while($row = mysqli_fetch_array($result)){
              
          ?>  
           <?php
              $sn=$sn + 1;
            ?>
            <tr>

               <td><?php echo $sn ?></td>
              <td><?php echo $row['staffattend_id']?></td>
              <td><?php echo $row['s_name']?></td>
            <td><?php echo $row['attend_date']?></td>
              <td><?php echo $row['attendance_duration']?></td>

               <td><?php 
                echo "<img src='uploads/".$row['RTK_picture']."'>"; ?></td>

               <td>
                <?php echo "<a onClick=\" javascript: confirm('Are you sure to delete the attendance record of this staff?');\" href='staffattendancedelete.php?id=".$row['staffattend_id']."&p_id=".$row['attend_date']."' class = 'btn btn-danger' >Delete</a>";?></td>
            </tr>
          <?php
            }
          ?>  
          </tbody>
     </table>

<script>
myInput.addEventListener("keyup",function(){
  var keyword = this.value;
  keyword = keyword.toUpperCase();
  var table_3 = document.getElementById("attendance_table");
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

<?php include 'footeradmin.php'; ?>