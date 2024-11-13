<?php
include '../config.php';
$admin=new Admin();
$st_id=$_SESSION['stid'];

if(isset($_GET['mcid'])){
    $mcid=$_GET['mcid'];
    $stmt=$admin->ret("SELECT * FROM `manage_class` WHERE `mc_id`='$mcid'");
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $c_id=$row['c_id'];
    $s_id=$row['s_id'];
    $l_id=$row['l_id'];
    $status='pending';
    $stmt=$admin->cud("INSERT INTO `join_class` (`l_id`,`s_id`,`c_id`,`mc_id`,`st_id`,`j_status`)VALUES('$l_id','$s_id','$c_id','$mcid','$st_id','$status')",'inserted');
    echo "<script>alert('Requested Sent Successfull');window.location='../class_link.php';</script>";
}

?>