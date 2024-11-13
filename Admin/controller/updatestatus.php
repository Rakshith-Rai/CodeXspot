<?php
include '../config.php' ;
$admin=new Admin();
if(isset($_GET['lid'])){
$lid=$_GET['lid'];
$stmt=$admin->cud("UPDATE `lecturer` SET `status`='Accepted' WHERE `l_id`='$lid'",'updated');
echo "<script>alert('Lecturer Accepted');window.location='../manage_lecturer.php'</script>";
}
if(isset($_GET['l_id'])){
    $lid=$_GET['l_id'];
    $stmt=$admin->cud("UPDATE `lecturer` SET `status`='Rejected' WHERE `l_id`='$lid'",'updated');
    echo "<script>alert('Lecturer Rejected');window.location='../manage_lecturer.php'</script>";
}
?>