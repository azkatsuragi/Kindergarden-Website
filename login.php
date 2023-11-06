<?php include 'headermain.php'; ?>


<div class="container-xxl py-5">
	<div class = "container">
		<div class="row g-0">
			<div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
				<div class="position-relative h-100">
					<img class="position-absolute w-100 h-100 rounded" src="img/login.jpg" style="object-fit: cover;">
				</div>
			</div>
		<br>
			<div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
				<div class="h-100 d-flex flex-column justify-content-center p-5">
				<form method ="POST" action="loginprocess.php">
					<fieldset>
						<legend>Login</legend>

						<div class="form-group">
						<div class="form-floating mb-3">
							<input type="text" name="fic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your IC Number..." required>
							<label for="floatingInput">Enter Your Identification Number</label>
						</div>
						</div>

						<br>

						<div class="form-group">
						<div class="form-floating mb-3">
							<input type="password" name="fpwd" class="form-control" id="exampleInputPassword1" placeholder="Create new Password..." required>
							<label for="floatingInput">Please Enter Your Password</label>
						</div>
						</div>

						<br>
						<button type="submit" class="btn btn-success">Log In</button>
						<button type="reset" class="btn btn-primary">Cancel</button>
					</fieldset>
				</form>
				</div>
			</div>
	<br><br>
		</div>
	</div>
</div>


<?php include 'footermain.php'; ?>