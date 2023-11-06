<?php

$fic = $_SESSION['uid'];
$sql = "SELECT * FROM tb_user WHERE u_id = '$fic'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

 if($row['u_type']!=3)  //cant jump to cust
   {
     session_destroy();
      echo "<script>
      window.location.href='guardian.php';
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
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


         <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="guardian.php" class="navbar-brand">
                <img src="img/intellectlogo.png" width="180" height="160" >

            </a>


            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="guardianviewactivity.php" class="nav-item nav-link">Activity</a>
                    <a href="guardianviewannouncement.php" class="nav-item nav-link">Announcement</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Program</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="newregister.php" class="dropdown-item">New Register</a>
                            <a href="kidprogramcustomermanage.php" class="dropdown-item">Manage Kids</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Fee</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="feeinfo1.php" class="dropdown-item">Fee for Program Little Explorer</a>
                            <a href="feeinfo2.php" class="dropdown-item">Fee for Program Fun KindyLand</a>
                            <a href="feeguardian.php" class='dropdown-item'>Make Payment</a>
                        </div>
                    </div>

                          <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Attendance</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="expattandance.php" class="dropdown-item">Take Kid Attendance</a>
                        </div>
                    </div>

                         <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Assessment</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="vakparent.php" class="dropdown-item">Little explorer VAK assessment</a>
                            <a href="miexplorerparent.php" class="dropdown-item">Little explorer Multiple Intelligence assessment</a>
                            <a href="funkindyparentmanage.php" class="dropdown-item">Fun KindyLand Subject assessment</a>
                            <a href="funkindyvakparentmanage.php" class="dropdown-item">Fun KindyLand VAK assessment</a>
                            <a href="funkindymiparentmanage.php" class="dropdown-item">Fun KindyLand Multiple Intelligence assessment</a>
                      
                        </div>
                    </div>
 
                </div>

       


             <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                      
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>



            </div>
        </nav>