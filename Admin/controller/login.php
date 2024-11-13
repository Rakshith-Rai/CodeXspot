<?php
include '../config.php';
$admin=new Admin();
if(isset($_POST['login'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $stmt=$admin->ret("SELECT * FROM `admin` WHERE `a_name`='$name'");
    $num=$stmt->rowCount();
    if($num>0){
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $dbpassword=$row['a_password'];
        if(password_verify($password,$dbpassword)){
            $_SESSION['aid']=$row['a_id'];
            echo "<script>alert('Login Successfull');window.location='../index.php';</script>";
        }else{
echo"<script>alert('wrong password');window.location='../login.php';</script>";
        }
    }else{
        echo"<script>alert('invalid user');window.location='../login.php';</script>";
    }
}                    
?>