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
        LEFT JOIN tb_program ON tb_kidprogram.k_programme= tb_program.prog_id
        LEFT JOIN tb_session ON tb_kidprogram.k_session = tb_session.session_id
        WHERE k_programme='2' AND k_status='2'";
$result = mysqli_query ($con,$sql);
?>


          <div class="container">
     <br><h3 style="font-family:Times New Roman;">Fun Kindy Land Class Student</h3><br>
     
    <table class="table table-hover">
  <thead>
    <tr>
      
      <th scope="col">Kid Name</th>
      <th scope="col">Mykid ID</th>
      <th scope="col">Kid Age</th>
      <th scope="col">Program</th>
      <th scope="col">Session</th>

    </tr>
  </thead>
  <tbody>

     <?php
     while($row=mysqli_fetch_array($result))
     {
        $kdob = $row['k_dob'];
        $cdate = date('Y'); 
        $age = (int)$cdate - (int)$kdob;

         echo "<td>".$row['k_name']."</td>";
         echo "<td>".$row['k_mykid']."</td>";
         echo "<td>".$age."</td>";     
         echo "<td>".$row['prog_type']."</td>";
         echo "<td>".$row['session_desc']."</td>";
       
      
         echo '</tr>';
     }
     ?>
  </tbody>
</table>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<?php include 'footeradmin.php';?>