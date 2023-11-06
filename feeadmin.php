<?php 
include ('dbconnect.php');
include 'smartsession.php';
include 'headeradmin.php';
if(!session_id())
{
    session_start();
}


if(isset($_GET['id']))
{
  $invoice = $_GET['id'];
}

//retrive new  bookings
$sql = "SELECT * FROM tb_fee 
WHERE f_invoice = '$invoice'";

$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
?>

<div class="container">

<br><h3>Fee Details</h3>

    <form class = "form-horizontal" method="POST" action="feeadminprocess.php" >

        <table class="table table-hover">
            <tr>
                <td>Reference Number</td>
                <td><?php echo $row['f_invoice']; ?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><?php echo $row['f_date']; ?></td>
            </tr>
            <tr>
                <td>Month</td>
                <td><?php echo $row['f_month']; ?></td>
            </tr>
            <tr>
                <td>Total Amount</td>
                <td><?php echo $row['f_total']; ?></td>
            </tr>
            <tr>
                <td>Payment Made</td>
                <td><?php echo $row['f_debit']; ?></td>
            </tr>
            <tr>
                <td>Outstanding</td>
                <td><?php echo $row['f_credit']; ?></td>
            </tr>
            <tr>
                <td>Receipt</td>
                <td><?php echo $row['f_resit']; ?></td>
            </tr>
            <tr>
                <td>Approval</td>
                <td>
                    <?php
                        $sqlstatus = "SELECT * FROM tb_feestatus";
                        $resultstatus = mysqli_query($con,$sqlstatus);

                        echo '<select class="form-select" id="exampleSelect1" name="fstatus">';

                        while($rowstatus=mysqli_fetch_array($resultstatus))
                        {
                            echo'<option value="'.$rowstatus["fs_id"].'" >'.$rowstatus["fs_desc"].'</option>';
                        }
                        echo '</select>';
                    ?>
                </td>
            </tr>
        </table>
        <input type="hidden" name="reference" value="<?php echo $row['f_invoice']; ?>">
        <input type="hidden" name="mykid" value="<?php echo $row['f_kids']; ?>">
        <input type="hidden" name="credit" value="<?php echo $row['f_credit']; ?>"><br>
        <button type="submit" class="btn btn-success" onclick='return process()'>Process</button>
    </form>
<script>
function process() {
    var confirmResult = window.confirm("Are you sure you want to process this?");
        if (confirmResult == false) {
            // stop the transaction from proceeding if the user presses "Cancel"
            return false;
        }
        // continue with the transaction if the user presses "OK"
        return true;
    }
</script>
</div>

<?php include 'footeradmin.php'; ?>