<?php 

include 'smartsession.php';

if (!session_id())
{
  session_start();
}

include 'headerguardian.php';
include ('dbconnect.php');

$gid = $_SESSION['uid'];

//Retrieve expected attendance
$sql = "SELECT * FROM tb_expattendance
        WHERE g_id = '$gid'";
  
$result = mysqli_query($con, $sql);

//$query = $db->query("SELECT * FROM tb_announcement ORDER BY ann_pic ASC");

//if($result->num_rows > 0){
 // while($row = $result->fetch_assoc()){
   // $imageURL = 'uploads/'.$row['ann_pic'];
// while($row=mysqli_fetch_array($result))

?>



<div class="container">
<br><h3>Attendance List</h3>
<table class="table table-hover">
  <thead>
    <style>
      img{
        width:200px;
      }
    </style>
    <tr>
      <th scope="col">Attendance ID</th>
      <th scope="col">Guardian ID</th>
      <th scope="col">Kid ID</th>
      <th scope="col">Week</th>
      <th scope="col">Weekly Attendance</th>
      <th scope="col">Note</th>
      <th scope="col">Manage</th>
      
      
    </tr>
  </thead>
  <tbody>

   <?php
      while($row=mysqli_fetch_array($result))
      {
         echo '<tr>';
         echo "<td>".$row['exp_id']."</td>";
         echo "<td>".$row['g_id']."</td>";
         echo "<td>".$row['k_mykid']."</td>";
         echo "<td>".$row['week']."</td>";
         echo "<td>".$row['wholeweek']."</td>";
         echo "<td>".$row['note']."</td>";
        // echo "<td><img src='uploads/".$row['RTK_picture']."'></td>";
        

    
          echo '<td>';
            // echo "<a href = 'modifyexpected.php?id=".$row['g_id']."' class = 'btn btn-warning'>Update</a> &nbsp";
            echo "<a onClick=\" javascript:return confirm('Are you sure to delete this?');\" href = 'expecteddelete.php?id=".$row['exp_id']."' class = 'btn btn-danger'>Delete</a>";
         echo '</td>';
         echo '</tr>';
      }

   ?>

   
  
    
  </tbody>
</table>
   
   
</div>

<?php include 'footermain.php';?>