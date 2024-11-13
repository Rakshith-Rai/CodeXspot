<?php 
include '../config.php' ;
$admin=new Admin();
if(isset($_POST['register'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phoneno=$_POST['phoneno'];
    $address=$_POST['add'];
    $password=$_POST['password'];
    $c_id=$_POST['c_id'];
    $password=password_hash($password,PASSWORD_BCRYPT);
    $stmt=$admin->cud("INSERT INTO `student` (`st_name`,`s_email`,`s_phone_no`,`s_address`,`c_id`,`password`)VALUES('$name','$email','$phoneno','$address','$c_id','$password')",'inserted');
    echo "<script>alert('Registration Successfull');window.location='../login.php';</script>";
}
?>