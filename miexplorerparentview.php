<?php

include ('dbconnect.php');
include 'smartsession.php';
include 'headerguardian.php';
if(!session_id())
{
    session_start();
}

if(isset($_GET['id'])){
    $miid = $_GET['id'];
}


$sql = "SELECT * FROM tb_multiple
        LEFT JOIN tb_kidprogram ON tb_kidprogram.k_mykid=tb_multiple.mu_kid
        LEFT JOIN tb_program ON tb_program.prog_id=tb_multiple.mu_prog
        LEFT JOIN tb_session ON tb_session.session_id=tb_multiple.mu_class
        WHERE mu_id='$miid'
        ";
$result = mysqli_query ($con,$sql);
$row=mysqli_fetch_array($result);


?>

<div class = "container">
    <br>

<body>

<br><br>
<h2 style="text-align: center;  font-family: 'Times New Roman';">Multiple Intelligence</h2><br>

 <fieldset>

  <div class="form-group">
      <input  type="hidden" name="miid" class="form-control" value="<?php echo $miid;?>">
    </div>
    

              <div class="form-group" >
      
      <h4 style="font-family:Times New Roman;"for="exampleInputPassword1" class="form-label mt-4" >Assessment ID : <?php echo $miid;?></h4>
     
    </div>

    

   <div class="form-group">
      <h4 style="font-family:Times New Roman;"for="exampleInputEmail1" class="form-label mt-4">Date : <?php echo $row['mi_date']?></h4>
  
    </div>

       <div class="form-group" >
       <h4 style="font-family:Times New Roman;"for="exampleInputEmail1" class="form-label mt-4">Kid Name : <?php echo $row['k_name']?></h4>
      </div>
<div>

       <div class="form-group" >
       <h4 style="font-family:Times New Roman;"for="exampleInputEmail1" class="form-label mt-4">Kid ID : <?php echo $row['mu_kid']?></h4>
      </div>

<div class="form-group" >
    <h4 style="font-family:Times New Roman;"for="exampleInputEmail1" class="form-label mt-4">Session : <?php echo $row['session_desc']?></h4>
      </div>
    <br>
<br><br>





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
    <td> <?php echo $row['mu_bahasa']?> </td>
  </tr>

<tr >
    <th>Kecerdasan Logik (MATEMATIK)</th>
    <td> <?php echo $row['mu_logik']?> </td>
  </tr>

  <tr >
    <th>Kecerdasan Fizikal</th>
    <td> <?php echo $row['mu_fizikal']?> </td>
  </tr>
  <tr >
    <th>Kecerdasan Muzikal</th>
    <td> <?php echo $row['mu_music']?> </td>
  </tr>
  <tr >
    <th>Kecerdasan Visual (spatial)</th>
    <td> <?php echo $row['mu_visual']?> </td>
  </tr>
  <tr >
    <th>Kecerdasan Kinestik (spatial)</th>
    <td> <?php echo $row['mu_kine']?> </td>
  </tr>
  <tr >
    <th>Kecerdasan Interpersonal</th>
    <td> <?php echo $row['mu_inter']?> </td>
  </tr>
  <tr >
    <th>Kecerdasan Intrapersonal</th>
    <td> <?php echo $row['mu_intra']?> </td>
  </tr>
  <tr >
    <th>Kecerdasan Naturalis</th>
    <td> <?php echo $row['mu_naturalis']?> </td>
  </tr>
  <tr >
    <th>Kecerdasan Existentials</th>
    <td> <?php echo $row['mu_exis']?> </td>
  </tr>

 
</table>

</body>

<br><br><br>



<div class="text-center">


        <a href= 'miexplorerparent.php'class ='btn btn-warning'>Back</a> 
</div>
<?php include 'footermain.php';?>