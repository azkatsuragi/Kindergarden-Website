<?php
include ('dbconnect.php');
include 'smartsession.php';
include 'headeradmin.php';
if(!session_id())
{
    session_start();
}
?>
<br>
<div class="row align-items-center">
    <div class="card border-danger mb-3 container-fluid text-center" style="max-width: 20rem;">
  		<img src="img\classes-1.jpg" class="card-img-top" alt="...">

  		<div class="card-body">
    		<h5 class="card-title">Fee</h5>
    		<p class="card-text">Total Fee Collected: RM5244.00</p>
    			<a href="feeadminview.php" class="btn btn-primary">Go to Fee</a>
  		</div>
	</div>
    <div class="card border-danger mb-3 container-fluid text-center" style="max-width: 20rem;">
  		<img src="img\classes-2.jpg" class="card-img-top" alt="...">

  		<div class="card-body">
    		<h5 class="card-title">Meals</h5>
    		<p class="card-text">Total Meals Spent: RM2324.00</p>
    			<a href="#" class="btn btn-primary">Go somewhere</a>
  		</div>
	</div>
    <div class="card border-danger mb-3 container-fluid text-center" style="max-width: 20rem;">
  		<img src="img\classes-3.jpg" class="card-img-top" alt="...">

  		<div class="card-body">
    		<h5 class="card-title">Kids</h5>
    		<p class="card-text">Total Kids in the Playschool: 32 Kids</p>
    			<a href="#" class="btn btn-primary">Go somewhere</a>
  		</div>
	</div>
</div>

<?php include 'footeradmin.php'; ?>