<?php 
include ('dbconnect.php');
include 'smartsession.php';
include 'headeradmin.php';
if(!session_id())
{
	session_start();
}


//retrive new  bookings
$sql = "SELECT * FROM tb_fee 
LEFT JOIN tb_kidprogram ON tb_fee.f_kids = tb_kidprogram.k_mykid
LEFT JOIN tb_feestatus ON tb_fee.f_status = tb_feestatus.fs_id
LEFT JOIN tb_feetype ON tb_fee.f_type = tb_feetype.ft_id
WHERE f_status!='3'";

$result = mysqli_query($con,$sql);
?>

<div class="container">

<br><h3>Approve Fee</h3>

<table class="table table-hover text-center">
  <thead>
	<tr>
	  <th scope="col">Reference Number</th>
	  <th scope="col">Kid Name</th>
	  <th scope="col">Kid Mykid</th>
	  <th scope="col">Fee Type</th>
	  <th scope="col">Status</th>
	  <th scope="col">Operation</th>
	</tr>
  </thead>
  <tbody>
	<?php
		while($row=mysqli_fetch_array($result))
		{
			echo '<tr>';
			echo '<td>'.$row['f_invoice'].'</td>';
			echo '<td>'.$row['k_name'].'</td>';
			echo '<td>'.$row['k_mykid'].'</td>';
			echo '<td>'.$row['ft_desc'].'</td>';
			echo '<td>'.$row['fs_desc'].'</td>';
			echo '<td>';
			echo "<a href = 'feeadmin.php?id=".$row['f_invoice']."' class = 'btn btn-warning' onclick='return update()'>Update</a>&nbsp";
			echo "<a href = 'feedelete.php?id=".$row['f_invoice']."' class = 'btn btn-danger' onclick='return padam()'>Delete</a>&nbsp";
			echo '</td>';
			echo '</tr>';
		}

	?>
</table>
<script>
	function update() {
		var confirmResult = window.confirm("Are you sure you want to update this?");
		if (confirmResult == false) {
			// stop the transaction from proceeding if the user presses "Cancel"
			return false;
		}
		// continue with the transaction if the user presses "OK"
		return true;
	}

	function padam() {
		var confirmResult = window.confirm("Are you sure you want to delete this?");
		if (confirmResult == false) {
			// stop the transaction from proceeding if the user presses "Cancel"
			return false;
		}
		// continue with the transaction if the user presses "OK"
		return true;
	}
</script>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php include 'footeradmin.php'; ?>