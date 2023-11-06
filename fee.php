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
  $kidIC = $_GET['id'];
}

$sql = "SELECT * FROM tb_kidprogram
        LEFT JOIN tb_program ON tb_kidprogram.k_programme = tb_program.prog_id
        LEFT JOIN tb_meals ON tb_kidprogram.k_meals = tb_meals.m_id
        LEFT JOIN tb_session ON tb_kidprogram.k_session = tb_session.session_id
        LEFT JOIN tb_feestatus ON tb_kidprogram.k_feestatus = tb_feestatus.fs_id
        WHERE k_mykid = '$kidIC'";

$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

$kdob = $row['k_dob'];
$cdate = date('Y'); 
$age = (int)$cdate - (int)$kdob;

$pay = $row['k_feeinfo'];

$fee = "SELECT * FROM tb_feeinfo
WHERE fi_id = '$pay'";
$display = mysqli_query($con, $fee);
$rowfee = mysqli_fetch_array($display);

$type = "SELECT * FROM tb_feetype";
$show = mysqli_query($con, $type);
?>
<div class="container-fluid row g-3">
  <br>
      <div class="col-6 ml-5">
      <legend>Kids Info</legend>
      <table class="table">
        <tr>
          <th scope="col">Kids Mykid</th>
          <td><?php echo $row['k_mykid']?></td>
        </tr>
        <tr>
          <th scope="col">Programme</th>
          <td><?php echo $row['prog_type']?></td>
        </tr>
        <tr>
          <th scope="col">Session</th>
          <td><?php echo $row['session_desc']?></td>
        </tr>
        <tr>
          <th scope="col">Meals</th>
          <td><?php echo $row['m_desc']?></td>
        </tr>
        <tr>
          <th scope="col">Status</th>
          <td><?php echo $row['fs_desc']?></td>
        </tr>
      </table>
    </div>
<br>
     <div class="col-6 ml-5"> 
     <table class="table table-hover">
      <legend>Fee Info</legend>
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Payment Item</th>
          <th scope="col">Price</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-light">
          <th scope="row">1</th>
          <td>Annual Fee (Deposit + January)</td>
          <td><?php echo $rowfee['fi_deposit'] + $rowfee['fi_anual'] + $rowfee['fi_monthly'] ?></td>
        </tr>
        <tr class="table-light">
          <th scope="row">2</th>
          <td>Monthly Fee</td>
          <td><?php echo $rowfee['fi_monthly'] ?></td>
        </tr>
        <tr class="table-light">
          <th scope="row">3</th>
          <td>Meals Fee for 6 Months</td>
          <td><?php echo $rowfee['fi_meals']/2 ?></td>
        </tr>
        <tr class="table-light">
          <th scope="row">3</th>
          <td>Meals Fee for 12 Months</td>
          <td><?php echo $rowfee['fi_meals'] ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<hr>

  <form method ="POST" action="feeprocess.php" enctype="multipart/form-data">
    <div class="container-fluid pt-5">
        <div class="row g-3">
          <div class="col-sm-6">
              <i class="flaticon-014-blackboard h1 font-weight-normal text-primary mb-3"></i>
              <div class="pl-4">
                <div class="form-group">
                  <label for="exampleInputEmail1" class="form-label mt-4">Payment Date</label>
                  <input type="month" name="paydate" class="form-control" id="exampleInputEmail1"required>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group">
              <label class="form-label mt-4">Select Payment Item</label>
                <select class="form-select" name="feetype" required>
                  <option value="" disabled selected>Choose your option</option>
                  <?php
                  while($rowtype = mysqli_fetch_array($show))
                  {
                  echo '
                  <option value="'.$rowtype['ft_id'].'">'.$rowtype['ft_desc'].'</option>'; };
                  ?>
                  </select>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label class="form-label mt-4">Amount Pay</label>
                <input type="number" name="debit" class="form-control" id="exampleInputPassword2" placeholder="Enter Amount Pay"required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="formFile" class="form-label mt-4">PDF File</label>
              <input class="form-control" type="file" name="f_resit">
            </div>
          </div>
        </div>
      </div>
<br>
    <input type="hidden" name="kidid" value="<?php echo $row['k_mykid']; ?>">
    <input type="hidden" name="feeinfo" value="<?php echo $pay; ?>">
  <div class="container-fluid text-center">
    <button type="submit" class="btn btn-primary">Make Payment</button>
    <button type="reset" class="btn btn-primary">Cancel</button>
  </div>
  </form>
<br><br>

<?php include 'footeradmin.php'; ?>