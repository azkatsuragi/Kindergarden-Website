<?php 

include 'smartsession.php';

if (!session_id())
{
     session_start();
}

include 'headeradmin.php';
include ('dbconnect.php');

if(isset($_GET['id']))
{
    $mykid = $_GET['id'];
}


//Retrieve new bookings

$sql = "SELECT * FROM tb_kidprogram
      LEFT JOIN tb_status ON tb_kidprogram.k_status = tb_status.s_id
      LEFT JOIN tb_user ON tb_kidprogram.g_id = tb_user.u_id 
      WHERE k_mykid = '$mykid'";

$result = mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

?>

<div class ="container">
   <br><h3>Kid Program Registration List</h3>
    <form class="form-horizontal" method="POST" action ="adminapprovalprocess.php">
     <table class="table table-hover">
          <tr>
               <td>Guardian ID</td>
               <td><?php echo $row['g_id'];?></td>
          </tr>

          <tr>
               <td>Guardian Name</td>
               <td><?php echo $row['g_name'];?></td>
          </tr>

          <tr>
               <td>Guardian Phone</td>
               <td><?php echo $row['g_phone'];?></td>
          </tr>

          <tr>
               <td>Guardian Occupation</td>
               <td><?php echo $row['g_occupation'];?></td>
          </tr>

          <tr>
               <td>Guardian Address</td>
               <td><?php echo $row['g_add'];?></td>
          </tr>

          <tr>
               <td>Kid Name</td>
               <td><?php echo $row['k_name'];?></td>
          </tr>
          <tr>
               <td>MyKid ID</td>
               <td><?php echo $row['k_mykid'];?></td>
          </tr>

          <tr>
               <td>Kid DOB</td>
               <td><?php echo $row['k_dob'];?></td>
          </tr>

           <tr>
               <td>Kid Age</td>
               <td><?php echo $row['k_age'];?></td>
          </tr>

          <tr>
               <td>Kid Allergy</td>
               <td><?php echo $row['k_allergy'];?></td>
          </tr>

          <tr>
               <td>Favourite Color</td>
               <td><?php echo $row['k_color'];?></td>
          </tr>

          <tr>
               <td>Favourite Food</td>
               <td><?php echo $row['k_food'];?></td>
          </tr>

          <tr>
               <td>Favourite Toys</td>
               <td><?php echo $row['k_toys'];?></td>
          </tr>

          <tr>
               <td>Still use diapers?</td>
               <td><?php echo $row['k_diapers'];?></td>
          </tr>
          <tr>
               <td>Program</td>
               <td><?php echo $row['k_programme'];?></td>
          </tr>

          <tr>
               <td>SessionT</td>
               <td><?php echo $row['k_session'];?></td>
          </tr>

          <tr>
               <td>Register Date</td>
               <td><?php echo $row['k_registerdate'];?></td>
          </tr>
            <td>Approval</td>
            <td>
                 <?php

                   $sqlstatus="SELECT * FROM tb_status";
                   $resultstatus = mysqli_query($con,$sqlstatus);

                   echo '<select class="form-select" name="fstatus" id="exampleSelect1">';

                   while($rowstatus=mysqli_fetch_array($resultstatus))
                   {
                      echo '<option value= "'.$rowstatus["s_id"].'">'.$rowstatus["s_desc"].'</option>';
                   }

                   echo '</select>';

                   ?>
                 
         </td>
         </tr>

      </table>
      <input type="hidden" name="mykid" value="<?php echo $row['k_mykid']?>">
           <a href= 'adminview.php'class ='btn btn-warning'>Back</a> 
         <button type="submit" class="btn btn-primary">Process</button>

    </form><br><br><br><br><br><br>

</div>

<?php include 'footermain.php';?>