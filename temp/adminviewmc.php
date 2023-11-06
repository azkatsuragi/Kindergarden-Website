<!DOCTYPE html>
<?php
error_reporting(0);
    include "smartsession.php";
  include 'dbconnect.php';
  $user_qry = $con->query("SELECT * FROM tb_user WHERE 'user_type' = '2'");
  $user = $user_qry->fetch_array();
  $user_name = $user['user_name'];

?>

<html lang = "eng">
  <head>
    <title>Intellect Playschool</title>
    <?php include('admin.php') ?>
  </head>
  <body>
    
    <div class="container" style="margin-top:30px">
  <div class="card">
   <div class="card-header">
      <div class="row">
        <div class="col-md-9"><h2>Staff MC List</h2></div>
        <div class="col-md-3" align="right">
         
        </div>
      </div>
    </div>
   
    <div class="card-body">
    <div class="table-responsive">
        <span id="message_operation"></span>
     <table class="table table-striped table-bordered" id="attendance_table">
      <thead>
       <tr>
              <th>No.</th>
              <th>Staff ID</th>
              <th>Staff Name</th>
              <th>Upload Date </th>
              <th>MC Attachment</th>
              <th>Action</th>
              
            </tr>
          </thead>
          <tbody>
          <?php
            $attendance_qry = "SELECT * FROM tb_staffattendance 
            LEFT JOIN tb_user ON tb_staffattendance.staffattend_id = tb_user.user_id WHERE attendance_status = '2' AND staff_status != '2' ORDER BY attendance_timestamp DESC";
            
            $result = mysqli_query($con,$attendance_qry);

            ?>   
             <?php   
            while($row = mysqli_fetch_array($result))
             {
               $sn=$sn + 1;

         echo '<tr>';
         echo "<td>".$sn."</td>";
         echo "<td>".$row['staffattend_id']."</td>";
         echo "<td>".$row['user_name']."</td>";
         ?>
         <td><?php echo date("F d, Y", strtotime($row['attendance_timestamp']))?></td>
         
         <?php
        echo "<td><img src='uploads/".$row['mc_attachment']."'width='500px'> </td>";
        
          echo '<td>';
            echo "<a onClick=\" javascript: confirm('Are you sure to delete this?');\" href='mcdelete.php?id=".$row['staffattend_id']."'class = 'btn btn-danger' >Delete</a>";
           
         echo '</td>';
         echo '</tr>';
       }
       // 
    ?>
          </tbody>
     </table>
        
    </div>
   </div>
  </div>
</div>

</body>
</html>