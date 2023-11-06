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

$sql = "SELECT * FROM tb_salary WHERE sa_reference = '$reference'";
$result = mysqli_query ($con,$sql);
$row = mysqli_fetch_array($result);
?>

<div class = "container">
  <br>
  <form method ="POST" action="salaryupdateprocess.php">
	<div>Reference: <?php echo $reference ?></div>
	<fieldset>
	  <legend>Staff Details</legend>
	  <div class="form-group">
		<label for="floatingInput" >Select Staff</label>
		<?php
		  $sqls = "SELECT * FROM tb_staff";
		  $results = mysqli_query($con,$sqls);

		  echo '<select class="form-select" id="exampleSelect1" name="sid">';

		  while($rows=mysqli_fetch_array($results))
		  {
			echo'<option value="'.$rows["s_IC"]. '" >'.$rows["s_name"].'</option>';
		  }
		  echo '</select>';

		?>
	  </div>
	</fieldset>
<br>
	<fieldset>
	  <legend>Earning</legend>
	  <label>Basic Salary</label>
	  <div class="form-group">
		<div class="form-floating mb-3">
		  <input type="number" name="fbasic" class="form-control" id="exampleInputPassword2" placeholder="<?php echo $row['sa_basic']; ?>"required>
		  <label for="floatingInput"><?php echo 'RM '.$row['sa_basic']; ?></label>
		</div>
	  </div>
	  <label>Overtime Salary</label>
	  <div class="form-group">
		<div class="form-floating mb-3">
		  <input type="number" name="fot" class="form-control" id="exampleInputPassword2" placeholder="<?php echo $row['sa_ot']; ?>"required>
		  <label for="floatingInput"><?php echo 'RM '.$row['sa_ot']; ?></label>
		</div>
	  </div>
	  <label>Playgroup Allowance</label>
	  <div class="form-group">
		<div class="form-floating mb-3">
		  <input type="number" name="feplaygroup" class="form-control" id="exampleInputPassword2" placeholder="<?php echo $row['sa_eplaygroup']; ?>"required>
		  <label for="floatingInput"><?php echo 'RM '.$row['sa_eplaygroup']; ?></label>
		</div>
	  </div>
	  <label>Public Holiday Allowance</label>
	  <div class="form-group">
		<div class="form-floating mb-3">
		  <input type="number" name="fecutiumum" class="form-control" id="exampleInputPassword2" placeholder="<?php echo $row['sa_ecutiumum']; ?>"required>
		  <label for="floatingInput"><?php echo 'RM '.$row['sa_ecutiumum']; ?></label>
		</div>
	  </div>
	  <label>Overtime Allowance</label>
	  <div class="form-group">
		<div class="form-floating mb-3">
		  <input type="number" name="felebihmasa" class="form-control" id="exampleInputPassword2" placeholder="<?php echo $row['sa_elebihmasa']; ?>"required>
		  <label for="floatingInput"><?php echo 'RM '.$row['sa_elebihmasa']; ?></label>
		</div>
	  </div>
	</fieldset>
<br>
	<fieldset>
	  <legend>Deduction</legend>
	  <label>Employee KWSP</label>
	  <div class="form-group">
		<div class="form-floating mb-3">
		  <input type="number" name="kwsp_employee" class="form-control" id="exampleInputPassword2" placeholder="<?php echo $row['sa_kwspstaff']; ?>"required>
		  <label for="floatingInput"><?php echo 'RM '.$row['sa_kwspstaff']; ?></label>
		</div>
	  </div>
	  <label>Employer KWSP</label>
	  <div class="form-group">
		<div class="form-floating mb-3">
		  <input type="number" name="kwsp_employer" class="form-control" id="exampleInputPassword2" placeholder="<?php echo $row['sa_kwspmajikan']; ?>"required>
		  <label for="floatingInput"><?php echo 'RM '.$row['sa_kwspmajikan']; ?></label>
		</div>
	  </div>
	  <label>Unpaid Leave</label>
	  <div class="form-group">
		<div class="form-floating mb-3">
		  <input type="number" name="fcutitanpagaji" class="form-control" id="exampleInputPassword2" placeholder="<?php echo $row['sa_cutitanpagaji']; ?>"required>
		  <label for="floatingInput"><?php echo 'RM '.$row['sa_cutitanpagaji']; ?></label>
		</div>
	  </div>
	</fieldset>
<br>
	<input type="hidden" name="reference" value="<?php echo $reference; ?>">
	<button type="submit" class="btn btn-success" onclick="return process()">Update Salary</button>
	<button type="reset" class="btn btn-primary">Cancel</button>
  </form>
<br><br>
</div>


<script>
function process() {
	var confirmResult = window.confirm("Are you sure you want to update this?");
		if (confirmResult == false) {
			// stop the transaction from proceeding if the user presses "Cancel"
			return false;
		}
		// continue with the transaction if the user presses "OK"
		return true;
	}
</script>

<?php include 'footeradmin.php';?>