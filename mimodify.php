<?php

include ('dbconnect.php');
include 'smartsession.php';
include 'headerstaff.php';
if(!session_id())
{
    session_start();
}

if(isset($_GET['id'])){
    $fmiid = $_GET['id'];
}


$sql = "SELECT * FROM tb_multiple
        LEFT JOIN tb_kidprogram ON tb_kidprogram.k_mykid=tb_multiple.mu_kid
        LEFT JOIN tb_program ON tb_program.prog_id=tb_multiple.mu_prog
        LEFT JOIN tb_session ON tb_session.session_id=tb_multiple.mu_class
        WHERE mu_id='$fmiid'
        ";
$result = mysqli_query ($con,$sql);
$row=mysqli_fetch_array($result);



?>

<div class = "container">
    <br>

<body>

  <form method ="POST" action="mimodifyprocess.php" enctype="multipart/form-data">
<br><br>
<h2 style="text-align: center;  font-family: 'Times New Roman';">Multiple Intelligence</h2><br>

 <fieldset>
    
  
  <div class="form-group">
      <legend for="exampleInputPassword1" class="form-label mt-4">Assessment ID :<?php echo $fmiid;?></legend>

    </div>
    
   <div class="form-group">
      <legend for="exampleInputEmail1" class="form-label mt-4">Date :</legend>
      <input style="width:250px;" type="date" name="midate" class="form-control" id="exampleInputEmail1" value="<?php echo $row['mi_date']?>" required>
    </div>

  <legend>Session : <?php echo $row['session_desc']?></legend>
       <div class="form-group">

      </div>
 


      <legend>Name : <?php echo $row['mu_kid']?></legend>
       <div class="form-group">
     
      </div>
    
<br><br><br>





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
    <td><input type="text" name="mibahasa" class="form-control"  id="exampleInputPassword1" value="<?php echo $row['mu_bahasa']?>"required></td>
  </tr>

<tr >
    <th>Kecerdasan Logik (MATEMATIK)</th>
    <td><input type="text" name="milogik" class="form-control"  id="exampleInputPassword1" value="<?php echo $row['mu_logik']?>"required></td>
  </tr>

  <tr >
    <th>Kecerdasan Fizikal</th>
    <td><input type="text" name="mifizik" class="form-control"  id="exampleInputPassword1"value="<?php echo $row['mu_fizikal']?>" required></td>
  </tr>
  <tr >
    <th>Kecerdasan Muzikal</th>
    <td><input type="text" name="mimusic" class="form-control"  id="exampleInputPassword1"value="<?php echo $row['mu_music']?>" required></td>
  </tr>
  <tr >
    <th>Kecerdasan Visual (spatial)</th>
    <td><input type="text" name="mivisual" class="form-control"  id="exampleInputPassword1" value="<?php echo $row['mu_visual']?>"required></td>
  </tr>
  <tr >
    <th>Kecerdasan Kinestik (spatial)</th>
    <td><input type="text" name="mikine" class="form-control"  id="exampleInputPassword1"value="<?php echo $row['mu_kine']?>" required></td>
  </tr>
  <tr >
    <th>Kecerdasan Interpersonal</th>
    <td><input type="text" name="miinter" class="form-control"  id="exampleInputPassword1"value="<?php echo $row['mu_inter']?>" required></td>
  </tr>
  <tr >
    <th>Kecerdasan Intrapersonal</th>
    <td><input type="text" name="miintra" class="form-control"  id="exampleInputPassword1" value="<?php echo $row['mu_intra']?>"required></td>
  </tr>
  <tr >
    <th>Kecerdasan Naturalis</th>
    <td><input type="text" name="minatu" class="form-control"  id="exampleInputPassword1"value="<?php echo $row['mu_naturalis']?>" required></td>
  </tr>
  <tr >
    <th>Kecerdasan Existentials</th>
    <td><input type="text" name="miexist" class="form-control"  id="exampleInputPassword1" value="<?php echo $row['mu_exis']?>"required></td>
  </tr>
  

 
 
</table>

</body>

<br><br><br>


<input type="hidden" name="fmiid" value="<?php echo $fmiid;?>" >
<div class="text-center">
<a href= 'mimanage.php'class ='btn btn-dark'>Back</a> 
 <button type="submit" class="btn btn-success" name="submit">Update</button>
    <button  type="reset" class="btn btn-warning">Clear Comment</button>
</div>
<?php include 'footermain.php';?>