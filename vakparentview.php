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
    $vakid = $_GET['id'];
}


//Retrieve individual
$sql = "SELECT * FROM tb_explorer
        LEFT JOIN tb_kidprogram ON tb_explorer.exp_mykid = tb_kidprogram.k_mykid
        LEFT JOIN tb_program ON tb_kidprogram.k_programme=tb_program.prog_id
        LEFT JOIN tb_session ON tb_kidprogram.k_session=tb_session.session_id
          WHERE exp_id='$vakid'
        ";
$result = mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

?>

<div class ="container">
   <br><h3 style="font-family:Times New Roman;">Little Explorer Assessment</h3>
    <form class="form-horizontal" >
     <table class="table table-hover">
        
          <tr>
               <td>Kid Name</td>
               <td><?php echo $row['k_name'];?></td>
          </tr>

          <tr>
               <td>MyKid ID</td>
               <td><?php echo $row['exp_mykid'];?></td>
          </tr>

          <tr>
               <td>Program</td>
               <td><?php echo $row['prog_type'];?></td>
          </tr>

          <tr>
               <td>Session</td>
               <td><?php echo $row['session_desc'];?></td>
          </tr>

          <tr>
               <td>Visual</td>
               <td><?php echo $row['v_comment'];?></td>
          </tr>
          <tr>
               <td>Audio</td>
               <td><?php echo $row['a_comment'];?></td>
          </tr>

          <tr>
               <td>Kinestetik</td>
               <td><?php echo $row['k_comment'];?></td>
          </tr>

           <tr>
               <td>Summary</td>
               <td><?php echo $row['exp_comment'];?></td>
          </tr>

          <tr>
               <td>Date</td>
               <td><?php echo $row['exp_date'];?></td>
          </tr>

        

      </table>
    
         <a href= 'vakparent.php'class ='btn btn-warning'>Back</a> 
    </form><br><br><br><br><br><br>

</div>

<?php include 'footermain.php';?>