<?php
include 'smartsession.php';
include 'dbconnect.php';

// Start session if it hasn't been started
if (!session_id()) {
	session_start();
}

$attend_event = $_POST["attend_event"];
$user_id = $_SESSION['uid'];

// Set timezone to Singapore
date_default_timezone_set('Singapore');

// If file upload is submitted
if (isset($_POST["upload"])) {
	// Get the name of image
	$image_name = $_FILES['image']['name'];

	// Image path
	$image_path = "uploads/".basename($image_name);
	$date = date("Y-m-d");

	// Check if user has already clocked in today
	$result = "SELECT * FROM tb_staffattendance WHERE staffattend_id = '$user_id' AND attend_date = '$date'";
	$res = mysqli_query($con, $result);
	$count = mysqli_num_rows($res);

	// If user haven clock in/clock out today
	if ($count == 0) 
	{ 
		if ($attend_event == 'Clock In') 
		{

          if(move_uploaded_file($_FILES['image']['tmp_name'], $image_path)){

			$clock_in_time = date("H:i:s");
			$sql = "INSERT INTO tb_staffattendance (attendance_status, clockin, staffattend_id, RTK_picture, staff_status, attend_date)
			VALUES ('1', '$clock_in_time', '$user_id', '$image_name', '1', '$date')";
			$insert = mysqli_query($con, $sql);

			echo "<script>alert('Clock In Recorded!')</script>";
			echo "<script type = \"text/javascript\">
			window.location = (\"staffattendanceview.php\")
			</script>";
		}
			else 
			{
				$clock_in_time = date("H:i:s");
			$sql = "INSERT INTO tb_staffattendance (attendance_status, clockin, staffattend_id, RTK_picture, staff_status, attend_date)
			VALUES ('1', '$clock_in_time', '$user_id', 'NULL.jpg', '1', '$date')";
			$insert = mysqli_query($con, $sql);

			echo "<script>alert('Clock In Recorded!')</script>";
			echo "<script type = \"text/javascript\">
			window.location = (\"staffattendanceview.php\")
			</script>";
			}

		}
		else
			echo "<script>alert('You haven Clock In today!')</script>";
			echo "<script type = \"text/javascript\">
			window.location = (\"takestaffattend.php\")
			</script>";

	} 
	else 
	{ 
		// User has clocked in /out today
		if ($attend_event == 'Clock In') 
		{
			echo "<script>alert('You have already ".$attend_event." today!')</script>";
			echo "<script type = \"text/javascript\">
			window.location = (\"takestaffattend.php\")
			</script>";

		} 
		else if ($attend_event == 'Clock Out') 
		{
		
			$sql = "SELECT * FROM tb_staffattendance WHERE staffattend_id = '$user_id' AND attend_date = '$date' AND clockout IS NULL"; 
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($result);

			if ($row) 
			{
				$clock_out_time = date("H:i:s");

				$update_sql = "UPDATE tb_staffattendance SET clockout = '$clock_out_time' WHERE staffattend_id = '$user_id' AND attend_date = '$date'";
				$update = mysqli_query($con, $update_sql);

			    $clock_in_time=$row[4];
			    $clock_in_t=strtotime($clock_in_time);
			    $clock_out_t=strtotime($clock_out_time);

			    $interval=round(abs($clock_out_t - $clock_in_t) / 3600,2);

				$update_sql = "UPDATE tb_staffattendance SET  attendance_duration = '$interval' WHERE staffattend_id = '$user_id' AND attend_date = '$date'";

				$update = mysqli_query($con, $update_sql);

				echo "<script>alert('Clock Out Recorded!');window.location = (\"staffattendanceview.php\");</script>";


			}
			else 
				echo "<script>alert('You have already Clock Out today!')</script>";
			echo "<script type = \"text/javascript\">
			window.location = (\"takestaffattend.php\")
			</script>";

		}
		mysqli_close($con);
	}
}
?>