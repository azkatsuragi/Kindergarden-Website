<?php 

include ('dbconnect.php');
include 'smartsession.php';
include 'headerguardian.php';
if(!session_id())
{
    session_start();
}


if(isset($_GET['id']))
{
    $mykid = $_GET['id'];
}

//Retrieve individual
$sql = "SELECT * FROM tb_kidprogram
        LEFT JOIN tb_status ON tb_kidprogram.k_status = tb_status.status
        LEFT JOIN tb_guardian ON tb_kidprogram.g_ic = tb_guardian.g_ic
        LEFT JOIN tb_program ON tb_kidprogram.k_programme=tb_program.prog_id
        LEFT JOIN tb_session ON tb_kidprogram.k_session=tb_session.session_id
        WHERE k_mykid = '$mykid'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

$sqlage = "SELECT * FROM tb_kidprogram WHERE k_mykid = '$mykid'";
$resultage = mysqli_query($con,$sqlage);
$rowage = mysqli_fetch_array($resultage);

$kdob = $rowage['k_dob'];
$cdate = date('Y'); 
$age = (int)$cdate - (int)$kdob;

?>

<div class ="container">
   <br><h3>Kid Program Registration List</h3>
    <form class="form-horizontal" >
     <table class="table table-hover">
          <legend>Guardian Information</legend>
          <tr>
               <td>Guardian IC</td>
               <td><?php echo $row['g_ic'];?></td>
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
               <td><?php echo $row['g_occ'];?></td>
          </tr>
          <tr>
               <td>Guardian Address</td>
               <td><?php echo $row['g_add'];?></td>
          </tr>
     </table>
     <table class="table table-hover">
          <legend>Kid Information</legend>
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
               <td><?php echo $age;?></td>
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
     </table>
     <table class="table table-hover">
          <legend>Program Information</legend>
          <tr>
               <td>Program</td>
               <td><?php echo $row['prog_type'];?></td>
          </tr>

          <tr>
               <td>Session</td>
               <td><?php echo $row['session_desc'];?></td>
          </tr>
          <tr>
            <td>Status</td>
            <td><?php echo $row['status_type'];?></td>
         </tr>

      </table>
         <a href= 'kidprogramcustomermanage.php' class ='btn btn-warning'>Back</a>  &nbsp;
         <a href= 'kidprogrammodify.php?id=<?php echo $mykid; ?>' class ='btn btn-dark'>Update Details</a> &nbsp;
         <a href= 'kidprogramcancel.php?id=<?php echo $mykid; ?>'class ='btn btn-danger'>Cancel</a>
    </form><br><br><br><br><br><br>

</div>

<?php include 'footermain.php';?>