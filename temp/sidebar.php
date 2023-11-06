<?php 

include("dbconnect.php");

//Retrieve individual bookings

?>
<link rel="stylesheet" href="css/style.css">
<div class="col-2 bg-white shadow pt-4">
              <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <h4 class="pl-3">Hi!</h4>
                <!-- <a class="nav-link" href="profileadmin.php">Teacher Profile</a> -->
              </li>
              <li class="nav-item pt-3">
                <a class="nav-link" href="profileadmin.php">Admin Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="manageparent.php">Manage Parents</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="managestudent.php">Manage Students</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="registerteacher.php">Manage Teacher</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="manageattendance.php">Manage Attendance</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="managepayment.php">Manage Payment</a>
              </li>
              <li class="nav-item dropdown">
                <a
                href="#"
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                >Manage Announcement</a>
                <div class="dropdown-menu rounded-0 m-0">
                  <a class="dropdown-item" href="viewannouncement.php">View Announcement</a>
                  <a class="dropdown-item" href="viewannouncement.php">Edit Announcement</a>
                  <a class="dropdown-item" href="viewannouncement.php">Delete Announcement</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a
                href="#"
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                >Manage Activity Update</a>
                <div class="dropdown-menu rounded-0 m-0">
                  <a class="dropdown-item" href="viewactivityupdate.php">View Activity Update</a>
                  <a class="dropdown-item" href="viewactivityupdate.php">Edit Activity Update</a>
                  <a class="dropdown-item" href="viewactivityupdate.php">Delete Activity Update</a>
                </div>
              </li>
            </ul>
        </div>