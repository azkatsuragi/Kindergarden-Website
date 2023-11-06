<?php
include ('dbconnect.php');
include 'smartsession.php';
include 'headeradmin.php';
if(!session_id())
{
	session_start();
} 
?>

<div class = "container">
  <br>
  <form method ="POST" action="salaryprocess.php">
	<fieldset>
	  <legend>Staff Details</legend>
	  <div class="form-group">
		<label for="floatingInput" >Select Staff</label>
		<?php
		  $sql = "SELECT * FROM tb_staff";
		  $result = mysqli_query($con,$sql);

		  echo '<select class="form-select" id="exampleSelect1" name="sid">';

		  while($row=mysqli_fetch_array($result))
		  {
			echo'<option value="'.$row["s_IC"]. '" >'.$row["s_name"].'</option>';
		  }
		  echo '</select>';

		?>
	  </div>
	</fieldset>
<br>
	<fieldset>
	  <legend>Earning</legend>
	  <div class="form-group">
		<div class="form-floating mb-3">
		  <input type="number" name="fbasic" class="form-control" id="exampleInputPassword2" placeholder="Enter Basic Salary"required>
		  <label for="floatingInput">Enter Basic Salary</label>
		</div>
	  </div>
<br>
	  <div class="form-group row">
	  <div class="col-6">
		<div class="form-floating mb-3">
		  <input type="number" name="hour" class="form-control" id="exampleInputPassword2" placeholder="Enter overtime hours" required>
		  <label for="floatingInput">Enter overtime hour</label>
		</div>
	  </div>
	  <div class="col-6">
		<div class="form-floating mb-3">
		  <input type="number" name="rate" class="form-control" id="exampleInputPassword2" placeholder="Enter overtime rate" required>
		  <label for="floatingInput">Enter overtime rate</label>
		</div>
	  </div>
	</div>

<br>
	  <div class="form-group">
		<div class="form-floating mb-3">
		  <input type="number" name="feplaygroup" class="form-control" id="exampleInputPassword2" placeholder="Enter Playgroup Allowance"required>
		  <label for="floatingInput">Enter Playgroup Allowance</label>
		</div>
	  </div>
<br>
	  <div class="form-group">
		<div class="form-floating mb-3">
		  <input type="number" name="fecutiumum" class="form-control" id="exampleInputPassword2" placeholder="Enter Public Holiday Allowance"required>
		  <label for="floatingInput">Enter Public Holiday Allowance</label>
		</div>
	  </div>
<br>
	  <div class="form-group">
		<div class="form-floating mb-3">
		  <input type="number" name="felebihmasa" class="form-control" id="exampleInputPassword2" placeholder="Enter Overtime Allowance"required>
		  <label for="floatingInput">Enter Overtime Allowance</label>
		</div>
	  </div>
	</fieldset>
<br>
	<fieldset>
	  <legend>Deduction</legend>
	  <div class="form-group">
		<div class="form-floating mb-3">
		  <input type="number" name="kwsp_employee" class="form-control" id="exampleInputPassword2" placeholder="Enter KWSP"required>
		  <label for="floatingInput">Enter Employee KWSP</label>
		</div>
	  </div>
<br>
	  <div class="form-group">
		<div class="form-floating mb-3">
		  <input type="number" name="kwsp_employer" class="form-control" id="exampleInputPassword2" placeholder="Enter Employer KWSP"required>
		  <label for="floatingInput">Enter Employer KWSP</label>
		</div>
	  </div>
<br>
	  <div class="form-group">
		<div class="form-floating mb-3">
		  <input type="number" name="fcutitanpagaji" class="form-control" id="exampleInputPassword2" placeholder="Enter Unpaid Leave"required>
		  <label for="floatingInput">Enter Unpaid Leave</label>
		</div>
	  </div>
	</fieldset>
<br>
	<button type="submit" class="btn btn-primary">Generate Salary</button>
	<button type="reset" class="btn btn-primary">Cancel</button>
  </form>
<br><br>
</div>

<?php include 'footeradmin.php';?>