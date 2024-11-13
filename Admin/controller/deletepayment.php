<?php 
include '../config.php';
$admin=new Admin();
if(isset($_GET['p_id'])){
    $p_id=$_GET['p_id'];
    $stmt=$admin->cud("DELETE FROM `payment` WHERE `p_id`='$p_id' ",'DELETED');
    echo "<script>alert('payment deleted');window.location='../managepayment.php';</script>";
}
?>