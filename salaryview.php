<?php 
include ('dbconnect.php');
include 'smartsession.php';
include 'headeradmin.php';
if(!session_id())
{
	session_start();
}

if(isset($_GET['id']))
{
	$reference = $_GET['id'];
}
?>
<style>
	@media print 
	{
		@page{size: landscape;}

		body *{visibility: hidden;}
		
		.print-container, .print-container *{visibility: visible;}
		  
		.print-container
		{
		  position: absolute;
		  left: 0px;
		  top:0px;
		}
	}
</style>
<div class="container">
  <button onclick="window.print()" class="btn btn-secondary" type="submit">Print Salary</button>
</div>
<div class="row print-container container-fluid">
  <div class="md-12">
<div class="text-center">
  <div class="mt-2"><span class="fw-bolder"><script type = "text/javascript">
		 var dt = new Date();
		 document.write("Penyata Gaji " + dt.getFullYear() ); 
  </script></span><p class="mt-4">Tadika Intelek Ria Villa, Johor Bahru</p></div>
</div>

<?php
  $sql = "SELECT * FROM tb_salary 
		LEFT JOIN tb_staff ON tb_salary.sa_staff = tb_staff.s_IC
		WHERE sa_reference = '$reference'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
{

echo  '<table class="table">';
echo  '<thead>';
echo  '<tr><th scope="col">Reference Number: </th>&nbsp;&nbsp;&nbsp;';
echo  '<td>'.$row['sa_reference'].'</td><br>';
echo  '<th scope="col">Issue Date: </th>&nbsp;&nbsp;&nbsp;';
echo  '<td>'.$row['sa_issuedate'].'</td></tr>';
echo  '<tr><th scope="col">Name: </th>&nbsp;&nbsp;&nbsp;';
echo  '<td>'.$row['s_name'].'</td><br>';
echo  '<th scope="col">Position: </th>&nbsp;&nbsp;&nbsp;';
echo  '<td>'.$row['s_position'].'</td></tr><br>';
echo  '</thead>';
echo  '<table class="table">';
echo  '<thead class="bg-dark text-white">';
echo  '<tr>';
echo  '<th scope="col">Income</th>';
echo  '<th scope="col">Total (RM)</th>';
echo  '<th scope="col">Deduction</th>';
echo  '<th scope="col">Total (RM)</th>';
echo  '</tr>';
echo  '</thead>';
echo  '<tbody>';

echo '<tr>';
echo '<th scope="row">Basic</th>';
echo '<td>'.$row['sa_basic'].'</td>';
echo '<td>Employee KWSP</td>';
echo '<td>'.$row['sa_kwspstaff'].'</td>';
echo '</tr>';

echo '<tr>';
echo '<th scope="row">Overtime</th>';
echo '<td>'.$row['sa_ot'].'</td>';
echo '<td>Unpaid Leave</td>';
echo '<td>'.$row['sa_cutitanpagaji'].'</td>';
echo '</tr>';

echo '<tr>';
echo '<th scope="row">Playgroup Allowance</th>';
echo '<td>'.$row['sa_eplaygroup'].'</td>';
echo '<td></td>';
echo '<td></td>';
echo '</tr>';

echo '<tr>';
echo '<th scope="row">Public Holiday Allowance</th>';
echo '<td>'.$row['sa_ecutiumum'].'</td>';
echo '<td></td>';
echo '<td></td>';
echo '</tr>';

echo '<tr>';
echo '<th scope="row">Overtime Allowance</th>';
echo '<td>'.$row['sa_elebihmasa'].'</td>';
echo '<td>Employer KWSP</td>';
echo '<td>'.$row['sa_kwspmajikan'].'</td>';
echo '</tr>';

echo '<tr class="border-top">';
echo '<th scope="row">Total Income</th>';
echo '<td>'.$row['sa_totalincome'].'</td>';
echo '<td>Total Deductions</td>';
echo '<td>'.$row['sa_totaldeduct'].'</td>';
echo '</tr>';

echo '<tr>';
echo '<th scope="row"></th>';
echo '<td></td>';
echo '<td>Netpay RM</td>';
echo '<td>'.$row['sa_netpay'].'</td>';
echo '</tr>';
echo '</tr>';

echo  '</tbody>';
echo '</table>';
}
?>

<div class="d-flex justify-content-end">
  <div class="d-flex flex-column mt-2"> <span class="fw-bolder">Intellect Playschool</span> <span class="mt-4">Authorised Signatory</span><br> 
  </div>
</div>

</tr>
</thead>
</div></div>

<?php include 'footeradmin.php'; ?>