<?php 
include '../config.php' ;
$admin=new Admin();
if(isset($_POST['register'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phoneno=$_POST['phoneno'];
    $address=$_POST['add'];

    $experience='upload/'.basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'],$experience);
    $course=$_POST['course'];
    $password=$_POST['password'];
    $acc=$_POST['acc'];
    $ifsc=$_POST['ifsc'];
    $status='pending';
    $password=password_hash($password,PASSWORD_BCRYPT);
    $stmt=$admin->cud("INSERT INTO `lecturer` (`c_id`,`l_name`,`l_email`,`phone_no`,`address`,`experience`,`acc_no`,`ifsc`,`password`,`status`)VALUES('$course','$name','$email','$phoneno','$address','$experience','$acc','$ifsc','$password','$status')",'inserted');
    echo "<script>alert('Registration Successfull');window.location='../login.php';</script>";
}
?>