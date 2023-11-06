<?php 
include ('dbconnect.php');
include 'smartsession.php';
include 'headeradmin.php';
if(!session_id())
{
    session_start();
}

$sql = "SELECT * FROM tb_salary
LEFT JOIN tb_staff ON tb_salary.sa_staff = tb_staff.s_IC";
$result = mysqli_query($con, $sql);
?>

<div class="container">

<br><h3>Salary Slip List</h3>

<table class="table table-hover text-center">
  	<thead>
    	<tr>
    		<th scope="col">Reference Number</th>
            <th scope="col">Month</th>
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
            echo '<td>'.date('F', strtotime($row['sa_issuedate'])).'</td>';
            echo '<td>'.$row['sa_issuedate'].'</td>';
            echo '<td>'.$row['s_name'].'</td>';
            echo "<td><a href = 'salaryview.php?id=".$row['sa_reference']."' class = 'btn btn-success' >View</a> &nbsp";
            echo "<a href = 'salaryupdate.php?id=".$row['sa_reference']."' class = 'btn btn-primary' onclick='return update()'>Update</a> &nbsp";
            echo "<a href = 'salarydelete.php?id=".$row['sa_reference']."' class = 'btn btn-danger' onclick='return padam()'>Delete</a></td> &nbsp";
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>


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


<?php include 'footeradmin.php' ?>