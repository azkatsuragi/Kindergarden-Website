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

//Retrieve new bookings

$sql = "SELECT * FROM tb_kidprogram
     LEFT JOIN tb_status ON tb_kidprogram.k_status = tb_status.status
     WHERE k_mykid = '$mykid'";

$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

$gic = $_GET['gic'];

$guardian = "SELECT * FROM tb_guardian
     WHERE g_ic = '$gic'";

$res = mysqli_query($con,$guardian);
$rowi = mysqli_fetch_array($res);
?>

<div class ="container-fluid">
    <form class="form-horizontal" method="POST" action ="regisapprovalprocess.php" onsubmit="return validation()">

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
     <table>
          <div class="row g-3">
               <div class="col-sm-6">
                    <div class="form-floating">
                         <input name="gocc" type="text" class="form-control" id="gname" placeholder="Guardian Name">
                         <label for="gname">Gurdian Occupation</label>
                    </div>
               </div>
               <div class="col-sm-6">
                    <div class="form-floating">
                         <input name="gmail" type="gmail" class="form-control" id="gmail" placeholder="Guardian Name">
                         <label for="gmail">Gurdian Email</label>
                    </div>
               </div>
               <script>
                    function validateEmail() {
                    var email = document.getElementById("gmail").value;
                    var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                    if (!pattern.test(email)) 
                    {
                        alert("Invalid email address");
                        return false;
                    }
                         return true;
                    }
               </script>
               <div class="col-12">
                    <div class="form-floating">
                         <input name="gadd" type="text" class="form-control" placeholder="Guardian Phone">
                         <label for="gmail">Guardian Address</label>
                    </div>
               </div>
               <div class="col-sm-6">
                    <div class="form-floating">
                         <input type="password" class="form-control" placeholder="Enter Password">
                         <label for="gmail">Enter Password</label>
                    </div>
               </div>
               <div class="col-sm-6">
                    <div class="form-floating">
                         <input name="gpwd" type="password" class="form-control" placeholder="Re-enter Password">
                         <label for="gmail">Re-enter Password</label>
                    </div>
               </div>
               <input type="hidden" name="gic" value="<?php echo $gic; ?>">
               <script>
                    const passwordInput = document.querySelector("input[type='password']");
                    const icInput = document.querySelector("input[name='gic']");
                    passwordInput.addEventListener("change", function() 
                    {
                         if (this.value === icInput.value) 
                         {
                             this.value = "";
                             alert("Password should not be the same as IC number.");
                         }
                         else if(this.value.length < 8)
                         {
                              this.value = "";
                              alert("Password must be at least 8 characters long.");
                         }
                         else
                         {
                              const password = this.value;
                              const hasUppercase = /[A-Z]/.test(password);
                              const hasLowercase = /[a-z]/.test(password);
                              const hasSpecial = /[!@#$%^&*_]/.test(password);
                              if (!hasUppercase || !hasLowercase || !hasSpecial) 
                              {
                                   alert("Password must contain at least 1 uppercase letter, 1 lowercase letter, and a special character");
                                   this.value = "";
                              }
                         }
                    });
               </script>

          </div>
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
     <div class="row g-3">
          <div class="col-sm-6">
               <div class="form-floating">
                 <input name="kdob" type="date" class="form-control" id="cname" placeholder="Child Name">
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
                    <input name="kallergy" type="text" class="form-control" id="cage" placeholder="Child Mykid">
                    <label for="cage">Allergy</label>
               </div>
          </div>
          <div class="col-sm-6">
               <div class="form-floating">
                    <input name="kcolor" type="text" class="form-control" id="cname" placeholder="Child Name">
                    <label for="cname">Favourite Colour</label>
               </div>
          </div>
          <div class="col-sm-6">
               <div class="form-floating">
                    <input name="kfood" type="text" class="form-control" id="cage" placeholder="Child Mykid">
                    <label for="cage">Favourite Food</label>
               </div>
          </div>
          <div class="col-sm-6">
               <div class="form-floating">
                    <input name="ktoys" type="text" class="form-control" id="cname" placeholder="Child Name">
                    <label for="cname">Favourite Toys</label>
               </div>
          </div>
          <div class="col-sm-6 form-group">
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
          <div class="col-sm-4 form-group">
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
          <div class="col-sm-4 form-group">
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
          <div class="col-sm-4 form-group">
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
     </div>
     </table>

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
           <a href= 'adminview.php'class ='btn btn-warning'>Back</a> 
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