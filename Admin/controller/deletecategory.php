<?php 
include '../config.php';
$admin=new Admin();
if(isset($_GET['s_id'])){
    $s_id=$_GET['s_id'];
    $stmt=$admin->cud("DELETE FROM `subject` WHERE `s_id`='$s_id' ",'DELETED');
    echo "<script>alert('Subject Deleted');window.location='../managecategory.php';</script>";
}
if(isset($_GET['c_id'])){
    $c_id=$_GET['c_id'];
    $stmt=$admin->cud("DELETE FROM `course` WHERE `c_id`='$c_id' ",'DELETED');
    echo "<script>alert('Course Deleted');window.location='../managecategory.php';</script>";
}
?>