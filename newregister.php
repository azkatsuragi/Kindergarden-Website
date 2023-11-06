<?php 

include ('dbconnect.php');
include 'smartsession.php';
include 'headerguardian.php';
if(!session_id())
{
    session_start();
}

$pid = $_SESSION['uid'];

//Retrieve new bookings

$sql = "SELECT * FROM tb_guardian WHERE g_ic = '$pid'";

$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

$gic = $row['g_ic'];
?>

<div class ="container-fluid">
    <form class="form-horizontal" method="POST" action ="newregisapprovalprocess.php">

     <br><h3>Guardian Information</h3>
     <table class="table table-hover">
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
               <td>Guardian Email</td>
               <td><?php echo $row['g_email'];?></td>
          </tr>
     </table>

     <hr>

     <br><h3>Kid Information</h3>
      <div class="row g-3">
          <div class="col-sm-6">
               <div class="form-floating">
                 <input name="kname" type="text" class="form-control" placeholder="Kid Name">
                 <label for="cname">Kid Name</label>
               </div>
          </div>
          <div class="col-sm-6">
               <div class="form-floating">
                 <input name="kmykid" type="number" class="form-control" placeholder="Kid Mykid">
                 <label for="cname">Kid Mykid</label>
               </div>
             </div>
          <div class="col-sm-6">
               <div class="form-floating">
                 <input name="kdob" type="date" class="form-control" id="cname" placeholder="Date of Birth">
                 <label for="cname">Date of Birth</label>
               </div>
          </div>
</script>

<!-- Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        The date of birth must be between 2 and 6 years ago.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Click anywhere to dissmiss</button>
      </div>
    </div>
  </div>
</div>

<script>
     const dateInput = document.querySelector("input[type='date']");
     dateInput.addEventListener("change", function() 
     {
          const currentDate = new Date();
          const twoYearsAgo = new Date(currentDate.getFullYear() - 2, currentDate.getMonth(), currentDate.getDate());
          const sixYearsAgo = new Date(currentDate.getFullYear() - 6, currentDate.getMonth(), currentDate.getDate());
          if (this.valueAsNumber < sixYearsAgo.getTime() || this.valueAsNumber > twoYearsAgo.getTime()) 
          {
               this.value = "";
               $("#errorModal").modal("show");
          }
     });
</script>

          <div class="col-sm-6">
               <div class="form-floating">
                    <input name="kallergy" type="text" class="form-control" id="cage" placeholder="Allergy">
                    <label for="cage">Allergy</label>
               </div>
          </div>
          <div class="col-sm-6">
               <div class="form-floating">
                    <input name="kcolor" type="text" class="form-control" id="cname" placeholder="Favourite Colour">
                    <label for="cname">Favourite Colour</label>
               </div>
          </div>
          <div class="col-sm-6">
               <div class="form-floating">
                    <input name="kfood" type="text" class="form-control" id="cage" placeholder="Favourite Food">
                    <label for="cage">Favourite Food</label>
               </div>
          </div>
          <div class="col-sm-6">
               <div class="form-floating">
                    <input name="ktoys" type="text" class="form-control" id="cname" placeholder="Favourite Toys">
                    <label for="cname">Favourite Toys</label>
               </div>
          </div>
          <div class="col-sm-6">
               <label for="exampleInputEmail1" class="form-label mt-4">Still wearing diapers during day time?</label>
               <select name="kdiapers">
                    <option >Yes</option>
                    <option >No</option>
               </select> 
          </div>
        </div>

<hr>

     <br><h3>Program Registration</h3>
     <table class="table table-hover">
          <div class="row g-3">
          <div class="col-sm-3 form-group">
          <label for="floatingInput" >Program</label>
<?php
     $sql = "SELECT * FROM tb_program";
     $result = mysqli_query($con,$sql);

     echo '<select class="form-select" id="exampleSelect1" name="fprogram">';

     while($row=mysqli_fetch_array($result))
     {
          echo'<option value="'.$row["prog_id"]. '" >'.$row["prog_type"].'</option>';
     }
     echo '</select>';

?>
          </div>
          <div class="col-sm-3 form-group">
               <label for="floatingInput" >Session</label>
<?php
     $sql = "SELECT * FROM tb_session";
     $result = mysqli_query($con,$sql);

     echo '<select class="form-select" id="exampleSelect1" name="fsession">';

     while($row=mysqli_fetch_array($result))
     {
          echo'<option value="'.$row["session_id"]. '" >'.$row["session_desc"].'</option>';
     }
     echo '</select>';

?>
          </div>
          <div class="col-sm-3 form-group">
               <label for="floatingInput" >Meals</label>
<?php
     $sql = "SELECT * FROM tb_meals";
     $result = mysqli_query($con,$sql);

     echo '<select class="form-select" id="exampleSelect1" name="fmeals">';

     while($row=mysqli_fetch_array($result))
     {
          echo'<option value="'.$row["m_id"]. '" >'.$row["m_desc"].'</option>';
     }
     echo '</select>';

?>
          </div>
     <div class="col-sm-3">
  <div class="form-floating">
    <input name="appdate" type="datetime-local" class="form-control" id="cage" placeholder="Register Date">
    <label for="cage">Register Date</label>
  </div>
</div>
     </div>
     </table>

<hr>
          
        <input type="hidden" name="gic" value="<?php echo $gic; ?>">  
      <input type="hidden" name="mykid" value="<?php echo $mykid; ?>"> <br>
      <div class="text-center">
         <button type="submit" class="btn btn-primary">Process</button>
       </div>

    </form><br><br><br><br><br><br>

</div>

<?php include 'footermain.php';?>