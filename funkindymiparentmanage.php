<?php 
include ('dbconnect.php');
include 'smartsession.php';
include 'headerguardian.php';
if(!session_id())
{
    session_start();
}

$pid= $_SESSION['uid'];


$sql = "SELECT * FROM tb_multiple
        LEFT JOIN tb_kidprogram ON tb_kidprogram.k_mykid=tb_multiple.mu_kid
        LEFT JOIN tb_program ON tb_program.prog_id=tb_multiple.mu_prog
        LEFT JOIN tb_session ON tb_session.session_id=tb_multiple.mu_class
     	 WHERE k_programme='2' AND mu_kid= '$pid'
        ";
$result = mysqli_query ($con,$sql);


?>




<div class="container">
     <br><h3 style="font-family:Times New Roman;">Fun KindyLand Multiple Intelligence Assessment</h3>
    <table class="table table-hover">
  <thead>
    <tr>

      <th scope="col">Assessment ID</th>  
      <th scope="col">Kid Name</th>
      <th scope="col">MyKid ID</th>
      <th scope="col">Assessment Date</th>

    </tr>
  </thead>
  <tbody>

     <?php
     while($row=mysqli_fetch_array($result))
     {
         echo '<tr>';
         echo "<td>".$row['mu_id']."</td>";
         echo "<td>".$row['k_name']."</td>";
         echo "<td>".$row['mu_kid']."</td>";
         echo "<td>".$row['mi_date']."</td>";


         echo "<td>";
               echo "<a href= 'miparentview.php?id=".$row['mu_id']."'class ='btn btn-warning'>View  </a> &nbsp";
               echo "</td>";
       

         echo "</td>";
         echo '</tr>';
     }

     ?>

    
  </tbody>
</table>
</div><br><br><br>


<?php include 'footermain.php';?>