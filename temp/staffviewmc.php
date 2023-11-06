<?php 
error_reporting(0);
include 'smartsession.php';
include 'staff.php';

if (!session_id())
{
  session_start();
}

include ('dbconnect.php');

$user_id =$_SESSION['user_id'];
//Retrieve individual bookings

$sql="SELECT * FROM tb_staffattendance 
            LEFT JOIN tb_user ON tb_staffattendance.staffattend_id = tb_user.user_id  
      WHERE staffattend_id = '$user_id' AND attendance_status=2 ORDER BY attendance_timestamp DESC";
$result = mysqli_query($con,$sql);

?>

<?php

if(isset($_SESSION['nid'])){
?>
<div class="alert alert-success">
  <strong>Success! </strong><?php
  echo $_SESSION['nid'];

?>
</div>

<?php
  unset($_SESSION['nid']);
}

?>

<div class="container" style="margin-top:30px">
  <div class="card">
   <div class="card-header">
      <div class="row">
        <div class="col-md-9"><h2>Your MC Upload List</h2></div>
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
      <th scope="col">No.</th>
      <th scope="col">Staff ID</th>
      <th scope="col">Staff Name</th>
      <th scope="col">Upload Date</th>
      <th scope="col">MC Attachment</th>
     
    </tr>
  </thead>

  <tbody>
    
   
    <?php
    while ($row =mysqli_fetch_array($result))
    {
         $sn=$sn + 1;

         echo '<tr>';
         echo "<td>".$sn."</td>";

         echo "<td>".$row['user_id']."</td>";
         echo "<td>".$row['user_name']."</td>";
         ?>
         <td><?php echo date("F d, Y", strtotime($row['attendance_timestamp']))?></td>
         <?php
         echo "<td><img src='uploads/".$row['mc_attachment']."' width='500px'> </td>";

            //echo "<a href = 'modifyexpected.php?id=".$row['attendance_ID']."' class = 'btn btn-warning'>Update</a> &nbsp";
           
         echo '</td>';
         echo '</tr>';
       }
       // 
    ?>
  </tbody>
</table>


</div>


