<?php 
include ('dbconnect.php');
include 'smartsession.php';
include 'headerguardian.php';
if(!session_id())
{
    session_start();
}


$uid = $_SESSION['uid'];

//Retrieve individual bookings
$sql = "SELECT * FROM tb_kidprogram
LEFT JOIN tb_feestatus ON tb_kidprogram.k_feestatus = tb_feestatus.fs_id
LEFT JOIN tb_program ON tb_kidprogram.k_programme= tb_program.prog_id
LEFT JOIN tb_session ON tb_kidprogram.k_session = tb_session.session_id
WHERE g_ic = '$uid'";

$result = mysqli_query ($con,$sql);

$sqlage = "SELECT * FROM tb_kidprogram WHERE g_ic = '$uid'";
$resultage = mysqli_query($con,$sqlage);
$rowage = mysqli_fetch_array($resultage);

$kdob = $rowage['k_dob'];
$cdate = date('Y'); 
$age = (int)$cdate - (int)$kdob;

echo '<div class= "row g-3">';
while($row=mysqli_fetch_array($result))
{
echo '<div class= "col-sm-6">';
echo'<div class=" container-fluid col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">';
echo '<div class="classes-item">
        <div class="bg-light rounded-circle w-75 mx-auto p-3">
            <img class="img-fluid rounded-circle" src="img/classes-1.jpg" alt="">
        </div>';
echo    '<div class="bg-light rounded p-4 pt-5 mt-n5">
            <a class="d-block text-center h3 mt-3 mb-4">'.$row['k_name'].', '.$age.'</a>';
echo    '</div>
        <div class="row g-3 text-center">
            <div class="col-sm-6">
                <div class="border-top border-3 border-primary pt-2">
                    <a href="kidprogramview.php?id='.$row['k_mykid'].'" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="border-top border-3 border-success pt-2">                    
                <a class = "btn btn-success" href = "feeguardian.php" >Pay Fee</a> &nbsp
                </div>
            </div>
        </div>
    </div>
</div>';
echo '</div>';
}
echo '</div>';

include 'footermain.php';?>