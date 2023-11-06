<?php

$fic = $_SESSION['uid'];
$sql = "SELECT * FROM tb_user WHERE u_id = '$fic'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

if($row['u_type']!=2)  //cant jump to cust
  {
	 session_destroy();
	  echo "<script>
	  window.location.href='staff.php';
	  alert('Sorry this page isn't available');
	  </script>";
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
 

	<meta charset="utf-8">
	<title>Intellect PlaySchool</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta name="author" content="Virtual Vision" >
	<meta name="description" content="Project WBL 22/23" >

	<!-- Favicon -->
	<link href="img/favicon.ico" rel="icon">

	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
	
	<!-- Icon Font Stylesheet -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
	<link href="lib/animate/animate.min.css" rel="stylesheet">
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

	<!-- Customized Bootstrap Stylesheet -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Template Stylesheet -->
	<link href="css/style.css" rel="stylesheet">

	<!-- Data Tables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.css"/>
 
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.js"></script>

	<style>
		body {
			background-color: white;
		}
	</style>

</head>

<body>
	<div class="container-xxl bg-white p-0">
		<!-- Spinner Start -->
		
		<!-- Spinner End -->


		<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
			<a href="staff.php" class="navbar-brand">
				<img src="img/intellectlogo.png" width="180" height="160" >
			</a>
			<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<div class="navbar-nav mx-auto">

					<div class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Activity</a>
						<div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
							<a href="staffcreateactivity.php" class="dropdown-item">Create Avtivity</a>
							<a href="staffactivitymanage.php" class="dropdown-item">Update Avtivity</a>
							<a href="staffviewactivity.php" class='dropdown-item'>Show Activity</a>
						</div>
					</div>
 

					<div class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Little Explorer</a>
						<div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
							<a href="littleexplorer.php" class="dropdown-item">Create VAK assessment</a>
							<a href="vakmanage.php" class="dropdown-item">Manage VAK assessment</a>
							<a href="miexplorer.php" class="dropdown-item">Create Multiple Intelligence assessment</a>
							<a href="miexplorermanage.php" class="dropdown-item">Manage Multiple Intelligence assessment</a>
						</div>
				   </div>


					<div class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Fun Kindy Land</a>
						<div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
							<a href="funkindy.php" class="dropdown-item">Create Subject assessment</a>
							<a href="funkindymanage.php" class="dropdown-item">Manage Subject Assessment</a>
							<a href="funkindyvak.php" class="dropdown-item">Create VAK assessment</a>
							 <a href="funkindyvakmanage.php" class="dropdown-item">Manage VAK Assessment</a>
							<a href="mi.php" class="dropdown-item">Create Multiple Intelligence assessment</a>
							  <a href="mimanage.php" class="dropdown-item">Manage Multiple Intelligence assessment</a>
						</div>
					</div>


					<div class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Attendance</a>
						<div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
							<a href="takestaffattend.php" class="dropdown-item">Clock In/Clock Out</a>
							<a href="mc.php" class="dropdown-item">Upload MC</a>
							<a href="takeactualattend.php" class="dropdown-item">Take Actual Attendance</a>
              <a href="viewactualattend.php" class="dropdown-item">View Actual Attendance</a>
             <a href="stafffilterexpected.php" class="dropdown-item">View Expected Attendance</a>
						</div>
					</div>

					<a href="staffsalary.php" class="nav-item nav-link">Salary</a>

				</div>
				<a href="logout.php" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Log Out<i class="fa fa-arrow-right ms-3"></i></a>
			</div>
		</nav>