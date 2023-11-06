<?php 

include 'headeradmin.php';
include ('dbconnect.php');


//Retrieve activity
$sql = "SELECT * FROM tb_activity WHERE n_status!='2'";
  
$result = mysqli_query($con, $sql);


?>

<div class="container">
<br><h3>Activity List</h3>
<table class="table table-hover">
  <thead>
    <style>
      img{
        width:200px; height:300px;
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
    </tr>
  </thead>
  <tbody>

    <?php
        while($row=mysqli_fetch_array($result))
        {
            echo '<tr>';
            echo "<td>".$row['n_ID']."</td>";
            echo "<td>".$row['n_name']."</td>";
            echo "<td>".$row['n_desc']."</td>";
            echo "<td>".$row['n_date']."</td>";
            echo "<td>".$row['n_time']."</td>";
            echo "<td>".$row['ac_location']."</td>";
        echo "<td>".$row['ac_environment']."</td>";
        echo "<td><img src='uploads/".$row['n_pic']."'></td>";
            
            echo '</tr>';
        }

    ?>

   
  
    
  </tbody>
</table>
    
    
</div>

<?php include 'footermain.php';?>