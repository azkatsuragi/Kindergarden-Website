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
    $funid = $_GET['id'];
}

$sql = "SELECT * FROM tb_subject
        LEFT JOIN tb_kidprogram ON tb_subject.fun_mykid = tb_kidprogram.k_mykid
        LEFT JOIN tb_program ON tb_kidprogram.k_programme=tb_program.prog_id
        LEFT JOIN tb_session ON tb_kidprogram.k_session=tb_session.session_id
        WHERE fun_id='$funid'
        ";
$result = mysqli_query ($con,$sql);
$row=mysqli_fetch_array($result);



?>


<div class="container-fluid">
  <br>
   <h3 style="font-family:Times New Roman;">Subject Assessment</h3>

 
    <div class="container-fluid">
        <hr>
        <form action="funkindymodifyprocess.php" method="POST">

              <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Assessment ID</label>
      <input style="width:250px;"  class="form-control" value="<?php echo $funid;?>" required>
  
    </div>

    

   <div class="form-group">
      <legend for="exampleInputEmail1" class="form-label mt-4">Date :</legend>
      <input style="width:250px;" type="date" name="subdate" class="form-control" id="exampleInputEmail1" value="<?php echo $row['fun_date']?>" required>
    </div>
<br>

             <legend>Select Kid</legend>
       <div class="form-group">
      
       
        <?php
          $sql = "SELECT * FROM tb_kidprogram
          WHERE k_programme='1' AND k_status='2'  ";
          $result = mysqli_query($con,$sql);

          echo '<select style="width:250px;"class="form-select" id="exampleSelect1" name="k_mykid">';

          while($row=mysqli_fetch_array($result))
          {
            echo'<option value="'.$row["k_mykid"]. '" >'.$row["k_name"].'</option>';
          }
          echo '</select>';

        ?>
      </div>

 <br>
  <legend>Select Session</legend>
       <div class="form-group">
      
       
        <?php
          $sql = "SELECT * FROM tb_session";
          $result = mysqli_query($con,$sql);

          echo '<select style="width:250px;"class="form-select" id="exampleSelect1" name="session">';

          while($row=mysqli_fetch_array($result))
          {
            echo'<option value="'.$row["session_id"]. '" >'.$row["session_desc"].'</option>';
          }
          echo '</select>';

        ?>
      </div>
    <br>

      <br><br>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table" style="width:100%;">
                       
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
  <tr>
   <thead>
                            <th scope="col">Subject</th>
                            <th scope="col">Manners</th>
                            <th scope="col">Writing</th>
                            <th scope="col">Reading</th>
                            <th scope="col">Counting</th>
                        </thead>

  <tr >
    <th>Bahasa Malaysia</th>
    <td class="form-group"> 
        <select name="bmfmanner">
        <option >G (Good)</option>
        <option >N (Unable to cooperate)</option>
        </select> 
        </td>

   <td class="form-group">
   <select name="bmfwrite">
        <option >L1 (Minimum)</option>
        <option >L2 (Basic)</option>
        <option >L3 (Moderate)</option>
        <option >L4 (Excellent)</option>
        </select>       
       </td>

         <td class="form-group"> 
          <select name="bmfread">
        <option >L1 (Minimum)</option>
        <option >L2 (Basic)</option>
        <option >L3 (Moderate)</option>
        <option >L4 (Excellent)</option>
        </select>  

      </td>

         <td class="form-group"> 

       </td>
  </tr>


    <tr >
    <th>Bahasa Inggeris</th>
   <td class="form-group"> 
       <select name="bifmanner">
        <option >G (Good)</option>
        <option >N (Unable to cooperate)</option>
        </select>
      </td>
    <td class="form-group"> 
        <select name="bifwrite">
        <option >L1 (Minimum)</option>
        <option >L2 (Basic)</option>
        <option >L3 (Moderate)</option>
        <option >L4 (Excellent)</option>
        </select>  
      </td>
   <td class="form-group"> 
        <select name="bifread">
        <option >L1 (Minimum)</option>
        <option >L2 (Basic)</option>
        <option >L3 (Moderate)</option>
        <option >L4 (Excellent)</option>
        </select> 
      </td>
         <td class="form-group"> 
     </td>
  </tr>


    <tr >
    <th>Bahasa Arab</th>
   <td class="form-group"> 
       <select name="bafmanner">
        <option >G (Good)</option>
        <option >N (Unable to cooperate)</option>
        </select>
      </td>
    <td class="form-group"> 
       <select name="bafwrite">
        <option >L1 (Minimum)</option>
        <option >L2 (Basic)</option>
        <option >L3 (Moderate)</option>
        <option >L4 (Excellent)</option>
        </select>  
      </td>
         <td class="form-group"> 
        <select name="bafread">
        <option >L1 (Minimum)</option>
        <option >L2 (Basic)</option>
        <option >L3 (Moderate)</option>
        <option >L4 (Excellent)</option>
        </select> 
      </td>
         <td class="form-group"> 
       </td>
  </tr>


    <tr >
    <th>Matematik</th>
   <td class="form-group"> 
        <select name="mfmanner">
        <option >G (Good)</option>
        <option >N (Unable to cooperate)</option>
        </select>
      </td>
    <td class="form-group"> 
        <select name="mfwrite">
        <option >L1 (Minimum)</option>
        <option >L2 (Basic)</option>
        <option >L3 (Moderate)</option>
        <option >L4 (Excellent)</option>
        </select>  
      </td>
         <td class="form-group"> 
         <select name="mfread">
        <option >L1 (Minimum)</option>
        <option >L2 (Basic)</option>
        <option >L3 (Moderate)</option>
        <option >L4 (Excellent)</option>
        </select> 
      </td>
         <td class="form-group"> 
       <select name="mfcount">
        <option >L1 (Minimum)</option>
        <option >L2 (Basic)</option>
        <option >L3 (Moderate)</option>
        <option >L4 (Excellent)</option>
        </select> 
      </td>
  </tr>


    <tr >
    <th>Sains</th>
   <td class="form-group"> 
        <select name="sfmanner">
        <option >G (Good)</option>
        <option >N (Unable to cooperate)</option>
        </select>
      </td>
    <td class="form-group"> 
       <select name="sfwrite">
        <option >L1 (Minimum)</option>
        <option >L2 (Basic)</option>
        <option >L3 (Moderate)</option>
        <option >L4 (Excellent)</option>
        </select>  
      </td>
         <td class="form-group"> 
       <select name="sfread">
        <option >L1 (Minimum)</option>
        <option >L2 (Basic)</option>
        <option >L3 (Moderate)</option>
        <option >L4 (Excellent)</option>
        </select> 
      </td>
         <td class="form-group"> 
       </td>
  </tr>


    <tr >
    <th>Arts & Craft</th>
   <td class="form-group"> 
        <select name="artfmanner">
        <option >G (Good)</option>
        <option >N (Unable to cooperate)</option>
        </select>
      </td>
    <td class="form-group"> 
        <select name="artfwrite">
        <option >L1 (Minimum)</option>
        <option >L2 (Basic)</option>
        <option >L3 (Moderate)</option>
        <option >L4 (Excellent)</option>
        </select>  
      </td>
    <td class="form-group"> 
        <select name="artfread">
        <option >L1 (Minimum)</option>
        <option >L2 (Basic)</option>
        <option >L3 (Moderate)</option>
        <option >L4 (Excellent)</option>
        </select> 
      </td>
    <td class="form-group"> 
       </td>
  </tr>


    <tr >
    <th>Pendidikan Islam & Jawi / Moral</th>
   <td class="form-group"> 
       <select name="pfmanner">
        <option >G (Good)</option>
        <option >N (Unable to cooperate)</option>
        </select>
      </td>
  
   <td class="form-group"> 
       <select name="pfwrite">
        <option >L1 (Minimum)</option>
        <option >L2 (Basic)</option>
        <option >L3 (Moderate)</option>
        <option >L4 (Excellent)</option>
        </select>  
      </td>
         <td class="form-group"> 
        <select name="pfread">
        <option >L1 (Minimum)</option>
        <option >L2 (Basic)</option>
        <option >L3 (Moderate)</option>
        <option >L4 (Excellent)</option>
        </select> 
      </td>
         <td class="form-group"> 
       </td>
  </tr>


    <tr >
    <th>Sports/Sensory/Gym/Brain Gym</th>
   <td class="form-group"> 
       <select name="gymfmanner">
        <option >G (Good)</option>
        <option >N (Unable to cooperate)</option>
        </select>
      </td>
  
   <td class="form-group"> 
       <select name="gymfwrite">
        <option >L1 (Minimum)</option>
        <option >L2 (Basic)</option>
        <option >L3 (Moderate)</option>
        <option >L4 (Excellent)</option>
        </select>  
      </td>
         <td class="form-group"> 
        <select name="gymfread">
        <option >L1 (Minimum)</option>
        <option >L2 (Basic)</option>
        <option >L3 (Moderate)</option>
        <option >L4 (Excellent)</option>
        </select> 
      </td>
         <td class="form-group"> 
       </td>
  </tr>


</table>

</body>

<input type="hidden" name="funid" value="<?php echo $fun_id;?>">
<br><br>
        <div style="display: flex; justify-content: center;">
        <button type="submit" class="btn btn-primary">Submit</button>&nbsp;
        <a href= 'funkindymanage.php' class ='btn btn-warning'>Back</a>
    </div>
        </form>        
</div>
</div>

<?php include 'footermain.php' ?>