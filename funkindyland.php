<?php 
include ('dbconnect.php');
include 'smartsession.php';
include 'headerstaff.php';
if(!session_id())
{
    session_start();
}


$sql = "SELECT * FROM tb_kidprogram 
LEFT JOIN tb_program ON tb_kidprogram.k_programme = tb_program.prog_id
WHERE prog_id = '1'";
$result = mysqli_query($con, $sql);
?>

<div class="container">
  <br><h3>Children List</h3>
<form method="POST" action="fee.php">
<table class="table table-hover"> 
  <thead>
    <tr>
      <th scope="col">Child Mykid</th>
      <th scope="col">Child Name</th>
      <th scope="col">Program</th>
      <th scope="col">Assesment</th>
     </tr>
  </thead>
  <?php while($row = mysqli_fetch_array($result))
     {
     echo '<tbody> <tr>';
     echo '<td>'.$row['k_mykid'].'</td>';
     echo '<td>'.$row['k_name'].'</td>';
     echo '<td>'.$row['prog_type'].'</td>';
     echo '<td><a class = "btn btn-warning" href = "assessment.php?id='.$row['k_mykid'].'" >View</a> &nbsp</td>';
     echo '</tr></tbody>';
     }
     ?>
</table>
</form>
<?php include 'footeradmin.php' ?>