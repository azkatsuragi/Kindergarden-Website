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
        LEFT JOIN tb_status ON tb_kidprogram.k_status = tb_status.s_id
        LEFT JOIN tb_program ON tb_kidprogram.k_programme= tb_program.prog_id
        LEFT JOIN tb_class ON tb_kidprogram.k_session = tb_class.class_id
        ";
$result = mysqli_query ($con,$sql);


?>


          <div class="container">
     <br><h3>Kid Program Registration List</h3>
     <form class="form-horizontal" method="POST" action ="adminapprovalprocess.php">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Guardian ID</th>
      <th scope="col">Guardian Name</th>
      <th scope="col">Guardian Phone</th>
      <th scope="col">Guardian Occupation</th>
      <th scope="col">Guardian Address</th>
      <th scope="col">Kid Name</th>
      <th scope="col">Mykid ID</th>
      <th scope="col">Kid DOB</th>
      <th scope="col">Kid Age</th>
      <th scope="col">Program</th>
      <th scope="col">Session</th>
      <th scope="col">Register Date</th>
      <th scope="col">Status</th>

    </tr>
  </thead>
  <tbody>

     <?php
     while($row=mysqli_fetch_array($result))
     {
         echo '<tr>';
         echo "<td>".$row['g_id']."</td>";
         echo "<td>".$row['g_name']."</td>";
         echo "<td>".$row['g_phone']."</td>";
         echo "<td>".$row['g_occupation']."</td>";
         echo "<td>".$row['g_add']."</td>";
         echo "<td>".$row['k_name']."</td>";
         echo "<td>".$row['k_mykid']."</td>";
         echo "<td>".$row['k_dob']."</td>";
         echo "<td>".$row['k_age']."</td>";
        
         echo "<td>".$row['prog_name']."</td>";
         echo "<td>".$row['class_name']."</td>";
         echo "<td>".$row['k_registerdate']."</td>";
       
        echo "<td>".$row['s_desc']."</td>";
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