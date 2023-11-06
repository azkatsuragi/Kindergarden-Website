<?php 

include 'headeradmin.php';
include ('dbconnect.php');


//Retrieve activity
$sql = "SELECT * FROM tb_announcement WHERE ann_status!='2'";
  
$result = mysqli_query($con, $sql);


?>

<div class="container">
<br><h3>Announcement List</h3>
<table class="table table-hover">
  <thead>
    <style>
      img{
        width:200px; height:300px;
      }
    </style>
    <tr>
      <th scope="col">Announcement ID</th>
      <th scope="col">Announcement Name</th>
      <th scope="col">Announcement Description</th>
      <th scope="col">Date of Event</th>
      <th scope="col">Time of Event</th>
      <th scope="col">Announcement Picture</th>
    </tr>
  </thead>
  <tbody>

    <?php
        while($row=mysqli_fetch_array($result))
        {
            echo '<tr>';
            echo "<td>".$row['ann_ID']."</td>";
            echo "<td>".$row['ann_name']."</td>";
            echo "<td>".$row['ann_desc']."</td>";
            echo "<td>".$row['ann_date']."</td>";
            echo "<td>".$row['ann_time']."</td>";
            echo "<td><img src='uploads/".$row['ann_pic']."'></td>";
            echo '<td>';
                //echo "<a href = 'modifyactivity.php?id=".$row['n_ID']."' class = 'btn btn-warning'>Update</a> &nbsp";
                //echo "<a href = 'activitycancel.php?id=".$row['n_ID']."' class = 'btn btn-danger'>Delete</a>";
            echo '</td>';
            echo '</tr>';
        }

    ?>

   
  
    
  </tbody>
</table>
    
    
</div>

<?php include 'footermain.php';?>