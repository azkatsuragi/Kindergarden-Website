<?php 

include ('dbconnect.php');
include 'smartsession.php';
include 'headerstaff.php';
if(!session_id())
{
    session_start();
}


//Retrieve activity
$sql = "SELECT * FROM tb_activity WHERE n_status!='2'";
  
$result = mysqli_query($con, $sql);


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

<div class="container">
<br><h3>Activity List</h3>
<table class="table table-hover">
  <thead>
    <style>
      img{
        
      }
    </style>
    <tr>
      <th scope="col">Activity ID</th>
      <th scope="col">Activity Name</th>
      <th scope="col">Activity Description</th>
      <th scope="col">Activity Date</th>
      <th scope="col">Activity Time</th>
      <th scope="col">Activity Location</th>
      <th scope="col">Activity Environment</th>
      <th scope="col">Activity Picture</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>

  	<?php
  		while($row=mysqli_fetch_array($result))
  		{
  			echo '<tr>';
  			echo "<td>".$row['n_id']."</td>";
  			echo "<td>".$row['n_name']."</td>";
  			echo "<td>".$row['n_desc']."</td>";
  			echo "<td>".$row['n_date']."</td>";
  			echo "<td>".$row['n_time']."</td>";
  			echo "<td>".$row['ac_location']."</td>";
        echo "<td>".$row['ac_environment']."</td>";
        echo "<td><img style='width:200px height:300px' src='uploads/".$row['n_pic']."'></td>";
  			echo '<td>';
  				echo "<a href = 'staffmodifyactivity.php?id=".$row['n_id']."' class = 'btn btn-warning'>Update</a> &nbsp";
  				//echo "<a href = 'activitycancel.php?id=".$row['n_ID']."' class = 'btn btn-danger'>Delete</a>";
  			echo '</td>';
  			echo '</tr>';
  		}

  	?>

   
  
    
  </tbody>
</table>
	
	
</div>

<?php include 'footermain.php';?>