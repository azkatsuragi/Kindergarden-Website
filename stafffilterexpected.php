<?php

include ('dbconnect.php');
include 'smartsession.php';
include 'headerstaff.php';
if(!session_id())
{
    session_start();
}

$sid = $_SESSION['uid'];
//$week = $_GET['week'];

?>

<div class = "container my-5">
    <br>
        <form method ="POST" action="">
            <fieldset>
                <legend>Search Expected Attendance</legend>
                <br>

      <input type="text" placeholder="Search week. Eg: 1" name="search">
      <button type="submit" name="submit" class="btn btn-primary">Search</button>
</fieldset>
</form>
      <div class="container">
<br><h3>Search Attendance by Week</h3>
<table class="table table-hover">

   <?php
    if(isset($_POST['submit'])){
        $search=$_POST['search'];
        $sql="SELECT * FROM tb_expattendance WHERE week ='$search' AND exp_att !='2'";
        $query_run = mysqli_query($con, $sql);
        if($query_run){
        if(mysqli_num_rows($query_run)>0){
            echo '<thead>              
                <tr>
                <th>Guardian ID</th>
                <th>Kid ID</th>
                <th>Week</th>
                <th>whole week attendance</th>
                <th>Note</th>

                </tr>
                </thead>';
               while($rows=mysqli_fetch_assoc($query_run)){
               echo '<tbody>
               <tr>
               <td>'.$rows['g_id'].'</td>
               <td>'.$rows['k_mykid'].'</td>
               <td>'.$rows['week'].'</td>
               <td>'.$rows['wholeweek'].'</td>
               <td>'.$rows['note'].'</td>
 
               </tr>
               <tbody>';}


            }
            else{
                echo '<h2>Data not found</h2>';
            }
        }
        
    }
    ?>




</table>
</div>








</div>

<?php include 'footermain.php' ?>

