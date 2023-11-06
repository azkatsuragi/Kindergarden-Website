<?php

include ('dbconnect.php');
include 'smartsession.php';
include 'headerstaff.php';
if(!session_id())
{
    session_start();
}

?>
<div class = "container">
    <br>

  <form method ="POST" action="littleexplorerprocess.php" enctype="multipart/form-data">
    <fieldset>
    
  <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Assessment ID</label>
      <input style="width:250px;" type="text" name="vakid" class="form-control" id="exampleInputPassword1" placeholder="Enter assessment ID" required>
    </div>
  

   <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Date :</label>
      <input style="width:250px;" type="date" name="vakdate" class="form-control" id="exampleInputEmail1" required>
    </div>

   <br>
      <label>Select Kid</label>
       <div class="form-group">
      
       
        <?php
          $sql = "SELECT * FROM tb_kidprogram
          WHERE k_programme='1'";
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




<body>

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
  <tr>
    <th width="25%">Cara Prembelajaran V.A.K</th>
    <th width="25%">Visual</th>
    <th width="25%">Audio</th>
    <th width="25%">Kinestetik</th>
  </tr>

  <tr >
    <th>Comments</th>
    <td><input type="text" name="vcomment" class="form-control"  id="exampleInputPassword1" required></td>
    <td><input type="text" name="acomment" class="form-control"  id="exampleInputPassword1" required></td>
    <td><input type="text" name="kcomment" class="form-control"  id="exampleInputPassword1" required></td>
  </tr>

  

  <tr >
    <th>Summary:</th>
<td colspan="3"><input type="text" name="summary" class="form-control"  id="exampleInputPassword1" required></td>

  </tr>
 
 
</table>

</body>

<br><br><br>
<div class="text-center">

 <button type="submit" class="btn btn-dark" name="submit">Submit</button>
    <button  type="reset" class="btn btn-warning">Clear Comment</button>
</div>
<?php include 'footermain.php';?>