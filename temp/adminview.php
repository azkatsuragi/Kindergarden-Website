<?php 

include 'smartsession.php';

if (!session_id())
{
     session_start();
}

include 'headeradmin.php';
include ('dbconnect.php');



//Retrieve individual bookings
$sql = "SELECT * FROM tb_kidprogram
        LEFT JOIN tb_user ON tb_kidprogram.g_id = tb_user.u_id
        LEFT JOIN tb_status ON tb_kidprogram.k_status = tb_status.status
        LEFT JOIN tb_program ON tb_kidprogram.k_programme= tb_program.prog_id
        LEFT JOIN tb_class ON tb_kidprogram.k_session = tb_class.class_id
        WHERE k_status = '1'";
$result = mysqli_query ($con,$sql);
?>

<div class="container">
     <br><h3>Kid Program Registration List</h3>
     <form class="form-horizontal" method="POST" action ="adminapprovalprocess.php">
    <table class="table table-hover">
  <thead>
    <tr>
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
        echo "<td>".$row['g_name']."</td>";
        echo "<td>".$row['g_phone']."</td>";
        echo "<td>".$row['k_name']."</td>";
        echo "<td>".$row['k_mykid']."</td>";
        echo "<td>".$row['k_appointmentdate']."</td>";
        echo "<td>".$row['status_type']."</td>";
        echo "<td>";
            echo "<a href= 'adminapproval.php?id=".$row['k_mykid']." 'class ='btn btn-warning'>Approval</a>";
        echo "</td>";
        echo '</tr>';
     }

     ?>

    
  </tbody>
</table>
</div><br><br><br>


<?php include 'footermain.php';?>