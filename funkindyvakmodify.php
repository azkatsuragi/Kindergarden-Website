<?php

include ('dbconnect.php');
include 'smartsession.php';
include 'headerstaff.php';
if(!session_id())
{
    session_start();
}


if(isset($_GET['id']))
{
    $funvakid = $_GET['id'];
}

$sql = "SELECT * FROM tb_explorer LEFT JOIN tb_kidprogram ON tb_explorer.exp_mykid = tb_kidprogram.k_mykid
        LEFT JOIN tb_program ON tb_kidprogram.k_programme=tb_program.prog_id
        LEFT JOIN tb_session ON tb_kidprogram.k_session=tb_session.session_id
        WHERE exp_id='$funvakid'

         ";
$result = mysqli_query ($con,$sql);
$row = mysqli_fetch_array($result);
?>



<div class = "container">

  <form method ="POST" action="funkindyvakmodifyprocess.php.php" >
    <fieldset>

       <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Assessment ID</label>
      <input  style="width:250px;"  type="text" name="vakid" class="form-control" id="exampleInputPassword1"  value="<?php echo $funvakid?>"required>
    </div>
 

      <div class="form-group">
      <legend for="exampleInputEmail1" class="form-label mt-4" >Date :</legend>
      <input style="width:250px;" type="date" name="vakdate" class="form-control" id="exampleInputEmail1" value="<?php echo $row['exp_date']?>"required>
    </div>


  
  
  <legend>Select Session</legend>
       <div class="form-group">
      
       
        <?php
          $sqlclass = "SELECT * FROM tb_session";
          $resultclass = mysqli_query($con,$sqlclass);

          echo '<select style="width:250px;"class="form-select" id="exampleSelect1" name="session">';

          while($rowclass=mysqli_fetch_array($resultclass))
          {
            echo'<option value="'.$rowclass["session_id"]. '" >'.$rowclass["session_desc"].'</option>';
          }
          echo '</select>';

        ?>
      </div>
    <br>


      <legend>Select Kid</legend>
       <div class="form-group">
      
       
        <?php
          $sqlprogram= "SELECT * FROM tb_kidprogram
          WHERE k_programme='2' AND k_status='2' ";
          $resultprogram = mysqli_query($con,$sqlprogram);

          echo '<select style="width:250px;"class="form-select" id="exampleSelect1" name="k_mykid" >';

          while($rowprogram=mysqli_fetch_array($resultprogram))
          {
            echo'<option value="'.$rowprogram["k_mykid"]. '" >'.$rowprogram["k_name"].'</option>';
          }
          echo '</select>';

        ?>
      </div>
    
<br>




<body>

<br><br>
<h2 style="text-align: center;  font-family: 'Times New Roman';">Penilaian V.A.K </h2><br>






<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 16px;
  text-align: center;
  }


</style>
</head>

<table style="border:1px solid black;margin-left:auto;margin-right:auto;" >
 <tr >
    <th>Comments</th>
    <td><input type="text" name="vcomment" class="form-control"  id="exampleInputPassword1" value="<?php echo $row['v_comment']?>" required></td>
    <td><input type="text" name="acomment" class="form-control"  id="exampleInputPassword1" value="<?php echo $row['a_comment']?>"required></td>
    <td><input type="text" name="kcomment" class="form-control"  id="exampleInputPassword1" value="<?php echo $row['k_comment']?>"required></td>
  </tr>

  

  <tr >
    <th>Summary:</th>
<td colspan="3"><input type="text" name="summary" class="form-control"  id="exampleInputPassword1" value="<?php echo $row['exp_comment']?>"  required></td>

  </tr>
 
 
</table>

</body>


<input type="hidden" name="funvid" value="<?php echo $funvakid;?>">
<br><br><br>

<a href= 'funkindyvakmanage.php'class ='btn btn-primary'>Back</a> 
 <button type="submit" class="btn btn-dark">Modify</button>
    <button type="reset" class="btn btn-warning">Clear Form</button>
  </fieldset>
</form>
<br><br><br><br>
</div>
</div>

</div><br><br><br><br><br><br>
<?php include 'footermain.php';?>