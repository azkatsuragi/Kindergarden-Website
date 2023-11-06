<?php 

include 'smartsession.php';

if (!session_id())
{
  session_start();
}

include 'headerstaff.php';
include ('dbconnect.php');


//Retrieve announcement
$sql = "SELECT * FROM tb_littleexplorer";
  
$result = mysqli_query($con, $sql);

//$query = $db->query("SELECT * FROM tb_announcement ORDER BY ann_pic ASC");

//if($result->num_rows > 0){
 // while($row = $result->fetch_assoc()){
   // $imageURL = 'uploads/'.$row['ann_pic'];
// while($row=mysqli_fetch_array($result))

?>


<?php

if(isset($_SESSION['sid'])){
?>
<div class="alert alert-success">
  <strong>Success! </strong><?php
  echo $_SESSION['sid'];

?>
</div>

<?php
  unset($_SESSION['sid']);
}

?>






<div class="container">
<br><h3>Little Explorer Assessment</h3>
<table class="table table-hover">
  <thead>
    <style>
      img{
        width:200px;
      }
    </style>
    <tr>
      
      <th scope="col">Kid ID</th>
      <th scope="col">Session</th>
      <th scope="col">Assessment Date</th>
      <th scope="col">Visual</th>
      <th scope="col">Audio</th>
      <th scope="col">Kinestetik</th>
      <th scope="col">Summary</th>
      <th scope="col">Manage</th>

    </tr>
  </thead>
  <tbody>

   <?php
      while($row=mysqli_fetch_array($result))
      {
         echo '<tr>';
         
         echo "<td>".$row['k_mykid']."</td>";
         echo "<td>".$row['session']."</td>";
         echo "<td>".$row['ass_date']."</td>";
         
         echo "<td>".$row['v_comment']."</td>";
         echo "<td>".$row['a_comment']."</td>";
         echo "<td>".$row['k_comment']."</td>";
         echo "<td>".$row['summary']."</td>";

        
        

    
          echo '<td>';
            echo "<a href = 'modifylittleexplorer.php?id=".$row['s_id']."' class = 'btn btn-warning'>Update</a> &nbsp";
            echo "<a onClick=\" javascript:return confirm('Are you sure to delete this?');\" href = 'littleexplorerdelete.php?id=".$row['s_id']."' class = 'btn btn-danger'>Delete</a>";
         echo '</td>';
         echo '</tr>';
      }

   ?>

   
  
    
  </tbody>
</table>
   
   
</div>

<?php include 'footermain.php';?>