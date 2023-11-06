<?php 

include ('dbconnect.php');
include 'smartsession.php';
include 'headeradmin.php';
if(!session_id())
{
    session_start();
}

if(isset($_GET['id']))
{
    $mykid = $_GET['id'];
}

$gic = $_GET['gic'];

//Retrieve new bookings

$guardian = "SELECT * FROM tb_guardian WHERE g_ic = '$gic'";
$res = mysqli_query($con, $guardian);
$rowi = mysqli_fetch_array($res);

$kid = "SELECT * FROM tb_kidprogram 
LEFT JOIN tb_status ON tb_kidprogram.k_status = tb_status.status 
LEFT JOIN tb_program ON tb_kidprogram.k_programme = tb_program.prog_id
LEFT JOIN tb_session ON tb_kidprogram.k_session = tb_session.session_id
LEFT JOIN tb_meals ON tb_kidprogram.k_meals = tb_meals.m_id
WHERE k_mykid = '$mykid'";
$result = mysqli_query($con,$kid);
$row = mysqli_fetch_array($result);
?>

<div class ="container">
    <form class="form-horizontal" method="POST" action ="newregisapprprocess.php" onsubmit="return validation()">

     <br><h3>Guardian Information</h3>
     <table class="table table-hover">
          <tr>
               <td>Guardian Name</td>
               <td><?php echo $rowi['g_name'];?></td>
          </tr>
          <tr>
               <td>Guardian Phone</td>
               <td><?php echo $rowi['g_phone'];?></td>
          </tr>
     </table>
     <hr>

     <br><h3>Kid Information</h3>
     <table class="table table-hover">
          <tr>
               <td>Kid Name</td>
               <td><?php echo $row['k_name'];?></td>
          </tr>
          <tr>
               <td>Kid MyKid</td>
               <td><?php echo $row['k_mykid'];?></td>
          </tr>
     </table>
<hr>
     <br><h3>Program Registration</h3>
     <table class="table table-hover">
          <div class="row g-3">
          <div class="col-sm-4 form-group">
          <label for="floatingInput" >Program : </label>
<?php
     echo'<label value="'.$row["prog_id"]. '" >'.$row["prog_type"].'</label>';
?>
          </div>
          <div class="col-sm-4 form-group">
               <label for="floatingInput" >Session : </label>
<?php
     echo'<label value="'.$row["session_id"]. '" >'.$row["session_desc"].'</label;>';

?>
          </div>
          <div class="col-sm-4 form-group">
               <label for="floatingInput" >Meals : </label>
<?php
     echo'<label value="'.$row["m_id"]. '" >'.$row["m_desc"].'</label>';

?>
          </div>
     </div>
<hr>
     <table class="table table-hover">
          <td>Approval</td>
          <td>
               <?php

               $sqlstatus="SELECT * FROM tb_status";
               $resultstatus = mysqli_query($con,$sqlstatus);

               echo '<select class="form-select" name="fstatus" id="exampleSelect1">';

               while($rowstatus=mysqli_fetch_array($resultstatus))
               {
                    echo '<option value= "'.$rowstatus["status"].'">'.$rowstatus["status_type"].'</option>';
               }

               echo '</select>';

               ?>      
          </td>
          </tr>

      </table>
          
        <input type="hidden" name="gic" value="<?php echo $gic; ?>">  
      <input type="hidden" name="mykid" value="<?php echo $mykid; ?>">
           <a href= 'regisapprove.php'class ='btn btn-warning'>Back</a> 
         <button type="submit" class="btn btn-primary">Process</button>

    </form><br><br><br><br><br><br>

    <script>
function validation() {
    var confirmResult = window.confirm("Are you sure you want to approve this kid?");
    if (confirmResult == false) {
        // stop the transaction from proceeding if the user presses "Cancel"
        return false;
    }
    // continue with the transaction if the user presses "OK"
    return true;
}
</script>

</div>

<?php include 'footermain.php';?>