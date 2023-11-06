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
    $funid = $_GET['id'];
}

$sql = "SELECT * FROM tb_subject
        LEFT JOIN tb_kidprogram ON tb_subject.fun_mykid = tb_kidprogram.k_mykid
        LEFT JOIN tb_program ON tb_subject.fun_prog= tb_program.prog_id
        LEFT JOIN tb_class ON tb_subject.fun_class = tb_class.class_id
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

              <div class="form-group" >
      <h4 style="font-family:Times New Roman;"for="exampleInputPassword1" class="form-label mt-4" >Assessment ID : <?php echo $row['fun_id']?></h4>
     
    </div>

    

   <div class="form-group">
      <h4 style="font-family:Times New Roman;"for="exampleInputEmail1" class="form-label mt-4">Date : <?php echo $row['fun_date']?></h4>
  
    </div>

       <div class="form-group" >
       <h4 style="font-family:Times New Roman;"for="exampleInputEmail1" class="form-label mt-4">Kid Name : <?php echo $row['k_name']?></h4>
      </div>

<div class="form-group" >
    <h4 style="font-family:Times New Roman;"for="exampleInputEmail1" class="form-label mt-4">Session : <?php echo $row['class_name']?></h4>
      </div>
    <br>

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
    
         <?php echo $row['manner_bm']?>
 
        </td>

   <td class="form-group"> 
       <?php echo $row['writing_bm']?> 

      </td>

         <td class="form-group"> 
       <?php echo $row['reading_bm']?> 

      </td>

         <td class="form-group"> 

       </td>
  </tr>


    <tr >
    <th>Bahasa Inggeris</th>
   <td class="form-group"> 
       <?php echo $row['manner_bi']?> 

      </td>
    <td class="form-group"> 
       <?php echo $row['writing_bi']?> 

      </td>
    <td class="form-group"> 
       <?php echo $row['reading_bi']?> 

      </td>
         <td class="form-group"> 
     </td>
  </tr>


    <tr >
    <th>Bahasa Arab</th>
   <td class="form-group"> 
       <?php echo $row['manner_ba']?> 
      </td>
    <td class="form-group"> 
       <?php echo $row['writing_ba']?>  
      </td>
         <td class="form-group"> 
        <?php echo $row['reading_ba']?> 

      </td>
         <td class="form-group"> 
       </td>
  </tr>


    <tr >
    <th>Matematik</th>
   <td class="form-group"> 
        <?php echo $row['manner_math']?> 
      </td>
    <td class="form-group"> 
        <?php echo $row['writing_math']?>  
      </td>
         <td class="form-group"> 
        <?php echo $row['reading_math']?> 

      </td>
         <td class="form-group"> 
       <?php echo $row['counting_math']?> 

      </td>
  </tr>


    <tr >
    <th>Sains</th>
   <td class="form-group"> 
        <?php echo $row['manner_sains']?> 
      </td>
    <td class="form-group"> 
       <?php echo $row['writing_sains']?> 
      </td>
         <td class="form-group"> 
       <?php echo $row['reading_sains']?> 
 
      </td>
         <td class="form-group"> 
       </td>
  </tr>


    <tr >
    <th>Arts & Craft</th>
   <td class="form-group"> 
        <?php echo $row['manner_art']?> 
      </td>
    <td class="form-group"> 
        <?php echo $row['writing_art']?>  
      </td>
    <td class="form-group"> 
        <?php echo $row['reading_art']?> 

      </td>
    <td class="form-group"> 
       </td>
  </tr>


    <tr >
    <th>Pendidikan Islam & Jawi / Moral</th>
   <td class="form-group"> 
       <?php echo $row['manner_agama']?> 
      </td>
  
   <td class="form-group"> 
       <?php echo $row['writing_agama']?>   
      </td>
         <td class="form-group"> 
        <?php echo $row['reading_agama']?> 
 
      </td>
         <td class="form-group"> 
       </td>
  </tr>


    <tr >
    <th>Sports/Sensory/Gym/Brain Gym</th>
   <td class="form-group"> 
       <?php echo $row['manner_sport']?> 
      </td>
  
   <td class="form-group"> 
       <?php echo $row['writing_sport']?>  
      </td>
         <td class="form-group"> 
        <?php echo $row['reading_sport']?> 

      </td>
         <td class="form-group"> 
       </td>
  </tr>


</table>

</body>

<br><br>
        <div style="display: flex; justify-content: center;">
        <a href= 'funkindymanage.php'class ='btn btn-warning'>Back</a> 
  
    </div>
        </form>        
</div>
</div>

<?php include 'footermain.php' ?>