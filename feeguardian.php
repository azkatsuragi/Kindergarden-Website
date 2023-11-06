<?php 
include ('dbconnect.php');
include 'smartsession.php';
include 'headerguardian.php';
if(!session_id())
{
	session_start();
}


$pid= $_SESSION['uid'];

$sql = "SELECT * FROM tb_kidprogram 
LEFT JOIN tb_program ON tb_kidprogram.k_programme = tb_program.prog_id
LEFT JOIN tb_session ON tb_kidprogram.k_session = tb_session.session_id
LEFT JOIN tb_feestatus ON tb_kidprogram.k_feestatus = tb_feestatus.fs_id
WHERE g_ic = '$pid'";
$result = mysqli_query($con, $sql);
?>

<div class="container">
  <br><h3>Children List</h3>
<table class="table table-hover text-center"> 
  <thead>
	<tr>
	  <th scope="col">Child Mykid</th>
	  <th scope="col">Child Name</th>
	  <th scope="col">Program</th>
	  <th scope="col">Session</th>
	  <th scope="col">Payment</th>
	 </tr>
  </thead>
  <?php while($row = mysqli_fetch_array($result))
	 {
	 echo '<tbody> <tr>';
	 echo '<td>'.$row['k_mykid'].'</td>';
	 echo '<td>'.$row['k_name'].'</td>';
	 echo '<td>'.$row['prog_type'].'</td>';
	 echo '<td>'.$row['session_desc'].'</td>';
	 echo '<td><a class = "btn btn-primary" href = "feelist.php?id='.$row['k_mykid'].'" >View</a> &nbsp';
	 echo '<a class = "btn btn-warning" href = "fee.php?id='.$row['k_mykid'].'" >Pay</a></td> &nbsp';
	 echo '</tr></tbody>';
	 }
	 ?>
</table>
<?php include 'footeradmin.php' ?>