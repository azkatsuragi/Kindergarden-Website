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

<body>

  <form method ="POST" action="miexplorerprocess.php" enctype="multipart/form-data">
<br>

 <fieldset>
    
  
  <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Assessment ID</label>
      <input style="width:250px;" type="text" name="mikid" class="form-control" id="exampleInputPassword1" placeholder="Enter assessment ID" required>
    </div>
    
   <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Date :</label>
      <input style="width:250px;" type="date" name="midate" class="form-control" id="exampleInputEmail1" required>
    </div>

  <label>Select Session</label>
       <div class="form-group">
      
       
        <?php
          $sql = "SELECT * FROM tb_session";
          $result = mysqli_query($con,$sql);

          echo '<select style="width:250px;"class="form-select" id="exampleSelect1" name="misession">';

          while($row=mysqli_fetch_array($result))
          {
            echo'<option value="'.$row["session_id"]. '" >'.$row["session_desc"].'</option>';
          }
          echo '</select>';

        ?>
      </div>
 


      <label>Select Kid</label>
       <div class="form-group">
      
       
        <?php
          $sql = "SELECT * FROM tb_kidprogram
          WHERE k_programme='1' AND k_status='2'";
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

<h2 style="text-align: center;  font-family: 'Times New Roman';">Multiple Intelligence</h2><br>



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
    <th width="25%">Kepelbagaian Kecerdasan</th>
    <th width="25%">Catatan/ Komen</th>
 
  </tr>

  <tr >
    <th>Kecerdasan Bahasa</th>
    <td><input type="text" name="mibahasa" class="form-control"  id="exampleInputPassword1" required></td>
  </tr>

<tr >
    <th>Kecerdasan Logik (MATEMATIK)</th>
    <td><input type="text" name="milogik" class="form-control"  id="exampleInputPassword1" required></td>
  </tr>

  <tr >
    <th>Kecerdasan Fizikal</th>
    <td><input type="text" name="mifizik" class="form-control"  id="exampleInputPassword1" required></td>
  </tr>
  <tr >
    <th>Kecerdasan Muzikal</th>
    <td><input type="text" name="mimusic" class="form-control"  id="exampleInputPassword1" required></td>
  </tr>
  <tr >
    <th>Kecerdasan Visual (spatial)</th>
    <td><input type="text" name="mivisual" class="form-control"  id="exampleInputPassword1" required></td>
  </tr>
  <tr >
    <th>Kecerdasan Kinestik (spatial)</th>
    <td><input type="text" name="mikine" class="form-control"  id="exampleInputPassword1" required></td>
  </tr>
  <tr >
    <th>Kecerdasan Interpersonal</th>
    <td><input type="text" name="miinter" class="form-control"  id="exampleInputPassword1" required></td>
  </tr>
  <tr >
    <th>Kecerdasan Intrapersonal</th>
    <td><input type="text" name="miintra" class="form-control"  id="exampleInputPassword1" required></td>
  </tr>
  <tr >
    <th>Kecerdasan Naturalis</th>
    <td><input type="text" name="minatu" class="form-control"  id="exampleInputPassword1" required></td>
  </tr>
  <tr >
    <th>Kecerdasan Existentials</th>
    <td><input type="text" name="miexist" class="form-control"  id="exampleInputPassword1" required></td>
  </tr>
  

 
 
</table>

</body>

<br><br><br>



<div class="text-center">

 <button type="submit" class="btn btn-dark" name="submit">Submit</button>
    <button  type="reset" class="btn btn-warning">Clear Comment</button>
</div>
<?php include 'footermain.php';?>