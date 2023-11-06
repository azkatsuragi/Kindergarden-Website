<?php 

include ('dbconnect.php');
include 'smartsession.php';
include 'headerstaff.php';
if(!session_id())
{
    session_start();
}


//Retrieve individual
$sql = "SELECT * FROM tb_explorer
        LEFT JOIN tb_kidprogram ON tb_explorer.exp_mykid = tb_kidprogram.k_mykid
        LEFT JOIN tb_program ON tb_kidprogram.k_programme=tb_program.prog_id
        LEFT JOIN tb_session ON tb_kidprogram.k_session=tb_session.session_id
       
        ";
$result = mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

?>

<div class = "container">
    <br>

    <fieldset>



              <div class="form-group" >
      <h4 style="font-family:Times New Roman;"for="exampleInputPassword1" class="form-label mt-4" >Assessment ID : <?php echo $row['exp_id'];?></h4>
     
    </div>

    

   <div class="form-group">
      <h4 style="font-family:Times New Roman;"for="exampleInputEmail1" class="form-label mt-4">Date : <?php echo $row['exp_date'];?></h4>
  
    </div>

       <div class="form-group" >
       <h4 style="font-family:Times New Roman;"for="exampleInputEmail1" class="form-label mt-4">Kid Name : <?php echo $row['k_name'];?></h4>
      </div>

<div class="form-group" >
    <h4 style="font-family:Times New Roman;"for="exampleInputEmail1" class="form-label mt-4">Session : <?php echo $row['session_desc'];?></h4>
      </div>


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
  <tr>
    <th width="25%">Cara Prembelajaran V.A.K</th>
    <th width="25%">Visual</th>
    <th width="25%">Audio</th>
    <th width="25%">Kinestetik</th>
  </tr>

  <tr >
    <th>Comments</th>
    <td><?php echo $row['v_comment'];?></td>
    <td><?php echo $row['a_comment'];?></td>
    <td><?php echo $row['k_comment'];?></td>
  </tr>

    <tr >
    <th>Summary</th>
<td colspan="3"><?php echo $row['exp_comment'];?></td>


  </tr>
 
 
</table>

</body>



<br><br><br>
<div class="text-center">

 <br><br>
        <div style="display: flex; justify-content: center;">
        <a href= 'vakmanage.php'class ='btn btn-warning'>Back</a> 
</div>
<?php include 'footermain.php';?>


