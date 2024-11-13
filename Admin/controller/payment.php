<?php 
include '../config.php';
$admin=new Admin();
if(isset($_POST['pay'])){
    $l_id=$_POST['l_id'];
    $amount=$_POST['amt'];
    $status='paid';
    $stmt=$admin->cud("INSERT INTO `lecturer_payment`(`l_id`,`amount`,`lp_status`)VALUES('$l_id','$amount','$status') ",'Inserted');
    echo "<script>alert('Payment Done');window.location='../manage_lecturer.php';</script>";

}
?>