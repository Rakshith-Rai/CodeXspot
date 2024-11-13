<?php
include '../config.php' ;
$admin=new Admin();
if(isset($_POST['subject'])){
    $sid=$_POST['sid'];
$s_name=$_POST['s_name'];
$stmt=$admin->cud("UPDATE `subject` SET `s_name`='$s_name' WHERE `s_id`='$sid'",'updated');
echo "<script>alert('Subject Updated');window.location='../managecategory.php';</script>";
}
if(isset($_POST['course'])){
    $cid=$_POST['cid'];
$c_name=$_POST['c_name'];
$stmt=$admin->cud("UPDATE `course` SET `c_name`='$c_name' WHERE `c_id`='$cid'",'updated');
echo "<script>alert('Course Updated');window.location='../managecategory.php';</script>";
}

?>