<?php 

include ('dbconnect.php');
include 'smartsession.php';
include 'headerstaff.php';
if(!session_id())
{
    session_start();
}

$user_id =$_SESSION['uid'];

$sql="SELECT * FROM tb_staffattendance
            LEFT JOIN tb_user ON tb_staffattendance.staffattend_id = tb_user.u_id 
             LEFT JOIN tb_staff ON tb_staffattendance.staffattend_id = tb_staff.s_id   
      WHERE staffattend_id = '$user_id' AND attendance_status = '1' AND staff_status='1'";
$result = mysqli_query($con,$sql);

?>

</div>

<div class="container" style="margin-top:30px">
  <div class="card">
   <div class="card-header">
      <div class="row">
        <div class="col-md-9"><h2>Your Daily Attendance List</h2></div>
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
      <th scope="col">NO</th>
      <th scope="col">Staff ID</th>
      <th scope="col">Staff Name</th>
      <th scope="col"> Date</th>
      <th scope="col">Clock In Time</th>
      <th scope="col">Clock Out Time</th>
      <th scope="col">RTK picture</th>

    </tr>
  </thead>

  <tbody>
    <?php
  	$sn=0;
    ?>
   
    <?php
  	while ($row =mysqli_fetch_array($result)){
   
  	   $sn=$sn + 1;
  		echo '<tr>';
  	    echo "<td>".$sn."</td>";
  	  	echo "<td>".$row['staffattend_id']."</td>";
  		echo "<td>".$row['s_name']."</td>";
      echo "<td>".$row['attend_date']."</td>";
      echo "<td>".$row['clockin']."</td>";
      echo "<td>".$row['clockout']."</td>";
  		echo "<td><img src='uploads/".$row['RTK_picture']."'' width='250px'> </td>";

  		echo "</td>";
  		echo '</tr>';
  	}

  	?>

    
  </tbody>
</table>


</div>
</div>
</div>
</div>

<?php include 'footermain.php'; ?>