<?php 
include '../config.php' ;
$admin=new Admin();
$stid=$_SESSION['stid'];
if(isset($_POST['prof'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phoneno=$_POST['phone'];
    $address=$_POST['address'];

    $stmt = $admin->cud("UPDATE `student` SET `st_name`='$name', `s_email`='$email', `s_phone_no`='$phoneno', `s_address`='$address' WHERE `st_id`='$stid'", 'updated');

    echo "<script>alert('Updated Successfull');window.location='../profile.php';</script>";
}
?>