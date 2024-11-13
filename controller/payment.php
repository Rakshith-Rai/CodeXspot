<?php 
include '../config.php';
$admin=new Admin();
$stid=$_SESSION['stid'];
if(isset($_POST['pay'])){
    $pid=$_POST['p_id'];
    $tans=$_POST['tans'];
    $paymentMethod=$_POST['paymentMethod'];
    $c_name=$_POST['c_name'];
    $c_no=$_POST['c_no'];
    $status='Active';
    $stmt=$admin->cud("INSERT INTO `membership`(`st_id`,`p_id`,`pay_method`,`trans_id`,`card_name`,`card_no`,`pay_status`) VALUES ('$stid','$pid','$paymentMethod','$tans','$c_name','$c_no','$status')",'inserted');
    echo "<script>alert('Payment Done');window.location='../index.php'</script>";
}
?>