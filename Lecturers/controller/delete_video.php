<?php 
include '../config.php';
$admin=new Admin();
if(isset($_GET['u_id'])){
    $u_id=$_GET['u_id'];
    $stmt=$admin->cud("DELETE  FROM `upload_video` WHERE `u_id`='$u_id'",'deleted');
    echo "<script>alert('Video Deleted');window.location='../view_uploaded_vedio.php';</script>";

}
?>