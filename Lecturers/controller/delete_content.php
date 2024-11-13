<?php 
include '../config.php';
$admin=new Admin();
if(isset($_GET['ac_id'])){
    $ac_id=$_GET['ac_id'];
    $stmt=$admin->cud("DELETE  FROM `add_content` WHERE `ac_id`='$ac_id'",'deleted');
    echo "<script>alert('Content Deleted');window.location='../view_content.php';</script>";

}
?>