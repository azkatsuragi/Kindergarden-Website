<?php

$fic = $_SESSION['uid'];
$sql = "SELECT * FROM tb_user WHERE u_id = '$fic'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

 if($row['u_type']!=1)  //cant jump to cust
  {
    session_destroy();
     echo "<script>
     window.location.href='admin.php';
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

    <style>
        body {
            background-color: white;
        }
    </style>
    
</head>

<body>

        <!-- Spinner End -->


        <!-- Navbar Start -->

        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="admin.php" class="sidenav-brand">
                <h1 class="m-0 text-primary">Intellect Playschool</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">

                     <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Manage Class</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="regisapprove.php" class="dropdown-item">Kid's Register</a>
                            <a href="feeadminview.php" class="dropdown-item" >Fee Approval</a>
                            <a href="classlittleexplorer.php" class="dropdown-item">Little Explorer</a>
                            <a href="classfunkindyland.php" class="dropdown-item">Fun Kindy Land</a>  
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="createactivity.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Activity Update</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="admincreateactivity.php" class="dropdown-item">Create Activity</a>
                            <a href="adminactivitymanage.php" class="dropdown-item">Update Activity</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="createactivity.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Announcement</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="createannouncement.php" class="dropdown-item">Create Announcement</a>
                            <a href="announcementmanage.php" class="dropdown-item">Update Announcement</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Staff</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="adminstaffattendmanage.php" class="dropdown-item">Staff Attendance</a>
                            <a href="adminviewmc.php" class="dropdown-item">Staff MC</a>
                            <a href="salary.php" class="dropdown-item">Staff Salary</a>
                            <a href="salarylist.php" class="dropdown-item">Manage Staff Salary</a>
                        </div>
                    </div>

                      <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kid</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="adminviewactualattend.php" class="dropdown-item"> Actual Attendance</a>
                            <a href="adminfilterexpected.php" class="dropdown-item"> Expected Attendance</a>
                        </div>
                    </div>
                </div>
                <a href="logout.php" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Log Out<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <!-- Navbar End -->