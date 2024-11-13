<?php 
include '../config.php';
$admin=new Admin();
$lid=$_SESSION['lid'];
if(isset($_POST['clink'])){
    $c_id=$_POST['c_id'];
    $s_id=$_POST['s_id'];
    $mc_id=$_POST['mc_id'];
    $st_id=$_POST['st_id'];
    $j_id=$_POST['j_id'];
    $class_link=$_POST['link'];
    $stmt=$admin->cud("INSERT INTO `class_link` (`l_id`,`c_id`,`s_id`,`mc_id`,`st_id`,`j_id`,`class_link`)VALUES('$lid','$c_id','$s_id','$mc_id','$st_id','$j_id','$class_link')",'insterted');
    echo "<script>alert('Class Link Sent Successfull');window.location='../view_request_link.php';</script>";

}
?>