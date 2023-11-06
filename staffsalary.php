<?php 
include ('dbconnect.php');
include 'smartsession.php';
include 'headerstaff.php';
if(!session_id())
{
	session_start();
}

$sid = $_SESSION['uid'];

$sql = "SELECT * FROM tb_salary
LEFT JOIN tb_staff ON tb_salary.sa_staff = tb_staff.s_IC 
WHERE s_id = '$sid'";

$result = mysqli_query($con, $sql);
?>

<div class="container">

<br><h3>Salary Slip List</h3>

<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">Reference Number</th>
			<th scope="col">Issue Date</th>
			<th scope="col">Staff Name</th>
			<th scope="col">Operation</th>
		</tr>
	</thead>
	<tbody>
	<?php
		while($row=mysqli_fetch_array($result))
		{
			echo '<tr>';
			echo '<td>'.$row['sa_reference'].'</td>';
			echo '<td>'.$row['sa_issuedate'].'</td>';
			echo '<td>'.$row['s_name'].'</td>';
			echo "<td><a href='print.php?id=".$row['sa_reference']."' class='btn btn-success view-salary'>View</a> &nbsp;</td>";
			echo '</tr>';
		}
		?>
	</tbody>
</table>
</div>

<script>
$(document).ready(function() {
  $('.view-salary').click(function() {
	var reference = $(this).data('id');
	$.ajax({
	  url: 'print.php',
	  type: 'GET',
	  data: { id: reference },
	  success: function(response) {
		// update the current page with the response
		// e.g. add the response to a modal or display it in a div
	  }
	});
  });
});
</script>


<?php include 'footeradmin.php' ?>