<?php 

include ('dbconnect.php');
include 'smartsession.php';
include 'headeradmin.php';
if(!session_id())
{
    session_start();
}


//Retrieve announcement
$sql = "SELECT * FROM tb_announcement WHERE ann_status!='2'";
  
$result = mysqli_query($con, $sql);

//$query = $db->query("SELECT * FROM tb_announcement ORDER BY ann_pic ASC");

//if($result->num_rows > 0){
 // while($row = $result->fetch_assoc()){
   // $imageURL = 'uploads/'.$row['ann_pic'];
// while($row=mysqli_fetch_array($result))

?>


<?php

if(isset($_SESSION['announceid'])){
?>
<div class="alert alert-success">
  <strong>Success! </strong><?php
  echo $_SESSION['announceid'];

?>
</div>

<?php
  unset($_SESSION['announceid']);
}

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
      <th scope="col">Picture</th>
      <th scope="col">Manage</th>
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
  				echo "<a href = 'modifyannouncement.php?id=".$row['ann_ID']."' class = 'btn btn-warning'>Update</a> &nbsp";
  				echo "<a onClick=\" javascript:return confirm('Are you sure to delete this?');\" href = 'announcementdelete.php?id=".$row['ann_ID']."' class = 'btn btn-danger'>Delete</a>";
  			echo '</td>';
  			echo '</tr>';
  		}

  	?>

   
  
    
  </tbody>
</table>
	
	
</div>

<?php include 'footermain.php';?>