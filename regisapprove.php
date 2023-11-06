<?php 

include ('dbconnect.php');
include 'smartsession.php';
include 'headeradmin.php';
if(!session_id())
{
    session_start();
}

//Retrieve individual bookings
$sql = "SELECT * FROM tb_kidprogram
        LEFT JOIN tb_status ON tb_kidprogram.k_status = tb_status.status
        LEFT JOIN tb_guardian ON tb_kidprogram.g_ic = tb_guardian.g_ic
        WHERE k_status = '1'";
$result = mysqli_query ($con,$sql);
?>

<div class="container">
     <br><h3>Kid Program Registration List</h3>
    <table class="table table-hover">
  <thead>
    <tr>
        <th scope="col">Guardian IC</th>
        <th scope="col">Guardian Name</th>
        <th scope="col">Guardian Phone</th>
        <th scope="col">Kid Name</th>
        <th scope="col">Kid Mykid</th>
        <th scope="col">Appointment Date</th>
        <th scope="col">Status</th>
        <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>

     <?php
     while($row=mysqli_fetch_array($result))
     {
        echo '<tr>';
        echo "<td>".$row['g_ic']."</td>";
        echo "<td>".$row['g_name']."</td>";
        echo "<td>".$row['g_phone']."</td>";
        echo "<td>".$row['k_name']."</td>";
        echo "<td>".$row['k_mykid']."</td>";
        echo "<td>".$row['k_appointmentdate']."</td>";
        echo "<td>".$row['status_type']."</td>";
        echo "<td>";
        if ($row['g_child'] != 1)
            echo "<a href= 'newregis.php?id=".$row['k_mykid']."&gic=".$row['g_ic']."' class ='btn btn-warning'>Approval</a>";
        else
            echo "<a href= 'regisapproval.php?id=".$row['k_mykid']."&gic=".$row['g_ic']." 'class ='btn btn-warning'>Approval</a>";
        echo "</td>";
        echo '</tr>';
     }

     ?>

    
  </tbody>
</table>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<?php include 'footeradmin.php';?>