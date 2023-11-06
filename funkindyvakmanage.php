<?php 
include ('dbconnect.php');
include 'smartsession.php';
include 'headerstaff.php';
if(!session_id())
{
    session_start();
}




//Retrieve individual bookings
$sql = "SELECT * FROM tb_explorer
        LEFT JOIN tb_kidprogram ON tb_explorer.exp_mykid = tb_kidprogram.k_mykid
        LEFT JOIN tb_program ON tb_explorer.exp_prog= tb_program.prog_id
        LEFT JOIN tb_session ON tb_explorer.exp_class = tb_session.session_id
        WHERE k_programme='2' AND k_status='2' ";
$result = mysqli_query ($con,$sql);


?>



<div class="container">
     <br><h3 style="font-family:Times New Roman;">VAK Assessment</h3>
    <table class="table table-hover">
  <thead>
    <tr>

      <th scope="col">Assessment ID</th>  
      <th scope="col">Kid Name</th>
      <th scope="col">MyKid ID</th>
      <th scope="col">Kid DOB</th>
      <th scope="col">Program</th>
      <th scope="col">Session</th>
      <th scope="col">Assessment Date</th>

    </tr>
  </thead>
  <tbody>

     <?php
     while($row=mysqli_fetch_array($result))
     {
         echo '<tr>';
         echo "<td>".$row['exp_id']."</td>";
         echo "<td>".$row['k_name']."</td>";
         echo "<td>".$row['exp_mykid']."</td>";
         echo "<td>".$row['k_dob']."</td>";
         echo "<td>".$row['prog_type']."</td>";
         echo "<td>".$row['session_desc']."</td>";
         echo "<td>".$row['exp_date']."</td>";


         echo "<td>";
               echo "<a href= 'funkindyvakview.php?id=".$row['k_mykid']."'class ='btn btn-warning'>View  </a> &nbsp";
               echo "</td>";
               echo "<td>";
               echo "<a href= 'funkindyvakmodify.php?id=".$row['k_mykid']."'class ='btn btn-dark'>Modify</a> &nbsp";
               echo "</td>";
               echo "<td>";
               echo "<a href= 'funkindyvakdelete.php?id=".$row['k_mykid']."'class ='btn btn-danger'>Delete</a>";

         echo "</td>";
         echo '</tr>';
     }

     ?>

    
  </tbody>
</table>
</div><br><br><br>


<?php include 'footermain.php';?>