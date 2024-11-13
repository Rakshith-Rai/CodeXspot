<?php
include '../config.php' ;
$admin=new Admin();
if(isset($_POST['payment'])){
    $p_id=$_POST['p_id'];
$p_duration=$_POST['p_duration'];
$amount=$_POST['amount'];
$details=$_POST['details'];
 $information=$_POST['var'];
 $information=implode(",",$information);
$stmt=$admin->cud("UPDATE `payment` SET `p_duration`='$p_duration',`amount`='$amount',`details`='$details',`info`='$information' WHERE `p_id`='$p_id'",'updated');
 echo "<script>alert('payment updated');window.location='../managepayment.php';</script>";
}

?>