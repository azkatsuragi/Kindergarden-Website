<?php 
include ('dbconnect.php');
include 'smartsession.php';
include 'headerguardian.php';
if(!session_id())
{
    session_start();
}


$pid= $_SESSION['uid'];

if(isset($_GET['id']))
{
  $mykid = $_GET['id'];
}
?>

<div class="container-fluid">

<br><h3>Fee List</h3>

<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Invoice Number</th>
        <th scope="col">Month</th>
        <th scope="col">Issue Date</th>
        <th scope="col">Payment</th>
        <th scope="col">Amount</th>
        <th scope="col">Balance</th>
        <th scope="col">Receipt</th>
        <th scope="col">Operation</th>
    </tr>
  </thead>
  <?php
  $no=1;
  $sqlv= "SELECT * FROM tb_kidprogram LEFT JOIN tb_fee ON tb_kidprogram.k_mykid = tb_fee.f_kids WHERE g_ic = '$pid' AND k_feestatus != '1' AND f_kids = '$mykid'";
  $queryv= mysqli_query($con,$sqlv);
  while($data=mysqli_fetch_array($queryv))
  {
  $viewpdf= "feeview.php?id=".$data['f_invoice'];
  $deletepdf= "feedelete.php?id=".$data['f_invoice'];
  ?>
  <tbody>
    <?php
      $date = $data['f_month'];
      $month_number = date("n", strtotime($date));

      $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');

      $month_name = $months[$month_number];
      echo '<tr>';
      echo '<td>'.$data['f_invoice'].'</td>';
      echo '<td>'.$month_name.'</td>';
      echo '<td>'.$data['f_date'].'</td>';
      echo '<td>'.$data['f_total'].'</td>';
      echo '<td>'.$data['f_debit'].'</td>';
      echo '<td>'.$data['f_credit'].'</td>';
      echo '<td>'.$data['f_resit'].'</td>';
      echo "<td><a href = ".$viewpdf." class = 'btn btn-warning' >View Reciept</a> </td>&nbsp";
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
</div>

<?php include 'footeradmin.php' ?>