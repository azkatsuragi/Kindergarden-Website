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

$sql = "SELECT * FROM tb_kidprogram LEFT JOIN tb_guardian ON tb_kidprogram.g_ic = tb_guardian.g_ic WHERE k_mykid = '$mykid'";
$result = mysqli_query ($con,$sql);
$row = mysqli_fetch_array($result);

?>

<form method="POST" action="kidprogrammodifyprocess.php" >
  <div class="container-fluid row g-3">
    <!--kids detail!-->
    <br><br> <h2>Kid's detail</h2>
    <div class="col-sm-6 form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Full Name</label>
      <input type="text" name="fkidname" class="form-control"  id="exampleInputPassword1" placeholder="Enter kid's full name" value="<?php echo $row['k_name']?>"required>
    </div>


    <div class="col-sm-6 form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">MyKids Number</label>
      <input type="text" name="fkidid" class="form-control" id="exampleInputEmail1" placeholder="Enter MyKids number" value="<?php echo $row['k_mykid']?>"required>
    </div>

    <div class="col-sm-6 form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Date of Birth</label>
      <input type="date" name="fdob" class="form-control" id="exampleInputEmail1" value="<?php echo $row['k_dob']?>"required>
    </div>
    <hr><h5>Health's detail</h5>
    <div class="col-sm-12 form-group">
      <label for="exampleTextarea" class="form-label mt-4">Any Allergy?</label>
      <textarea class="form-control" id="exampleTextarea"name="fallergy" rows="3"placeholder="(If yes, Please state what kind of allergy and medication)"><?php echo $row['k_allergy']?></textarea>
    </div>

    <hr><h5>Preference's detail</h5>
    <div class="col-sm-6 form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Favourite Food</label>
      <input type="text" name="ffood"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter kid's favourite food" value="<?php echo $row['k_food']?>"required>
    </div>

    <div class="col-sm-6 form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Favourite Color</label>
      <input type="text" name="fcolor"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter kid's favourite color" value="<?php echo $row['k_color']?>"required>
    </div>

    <div class="col-sm-6 form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Favourite Toys</label>
      <input type="text" name="ftoys"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter kid's favourite toys" value="<?php echo $row['k_toys']?>" required>
    </div>

    <div class="col-sm-6 form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Still wearing diapers during day time?</label>
      <select name="fdiapers" value="<?php echo $row['k_diapers']?>" >
        <option >-Select-</option>
        <option >Yes</option>
        <option >No</option>
      </select>
    </div>
<hr><h5>Program's detail</h5>
    <div class="col-sm-6 form-group">
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
  <br>

    <div class="col-sm-6 form-group">
        <label for="floatingInput" >Program</label>
        <?php
          $sql = "SELECT * FROM tb_program";
          $result = mysqli_query($con,$sql);

          echo '<select class="form-select" style="width:250px"id="exampleSelect1" name="fprogram">';

          while($row=mysqli_fetch_array($result))
          {
            echo'<option value="'.$row["prog_id"]. '" >'.$row["prog_type"].'</option>';
          }
          echo '</select>';

        ?>
      </div>
      <hr>
</div>
<input type="hidden" name="fkid" value="<?php echo $mykid;?>">

<div class="text-center">
<a href= 'kidprogramcustomermanage.php'class ='btn btn-primary'>Back</a> &nbsp;
<button type="submit" class="btn btn-dark">Update</button> &nbsp;
<button type="reset" class="btn btn-warning">Clear Form</button>
</div>
</form>
<?php include 'footermain.php';?>