<?php
include '../config.php' ;
$admin=new Admin();
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
   $stmt=$admin->ret("SELECT * FROM `student` WHERE `s_email`='$email'");
   $num=$stmt->rowCount();
   if($num>0){
       $row=$stmt->fetch(PDO::FETCH_ASSOC);
       $dbpassword=$row['password'];
       if(password_verify($password,$dbpassword)){
           $_SESSION['stid']=$row['st_id'];
           echo "<script>alert('Login Successfull');window.location='../index.php';</script>";
       }else{
        echo "<script>alert('invalid password');window.location='../login.php';</script>";
       }
   }else{
    echo "<script>alert('You are Not valid user');window.location='../login.php';</script>";

   }
}
?>