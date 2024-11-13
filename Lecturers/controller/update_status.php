<?php 
include '../config.php';
$admin=new Admin();
if(isset($_GET['accept'])){
    $accept=$_GET['accept'];
    $st_id=$_GET['st_id'];
    $stmt=$admin->cud("UPDATE `join_class` SET `j_status`='accepted' WHERE `st_id`='$st_id' AND `j_id`='$accept'",'updated');
    echo "<script>alert('Request Accepted Successfull');window.location='../view_request_link.php'</script>";
}
if(isset($_GET['cancel'])){
    $cancel=$_GET['cancel'];
    $st_id=$_GET['st_id'];
    $stmt=$admin->cud("UPDATE `join_class` SET `j_status`='canceled' WHERE `st_id`='$st_id' AND `j_id`='$cancel'",'updated');
    echo "<script>alert('Request Cancelled Successfull');window.location='../view_request_link.php'</script>";
}
?>