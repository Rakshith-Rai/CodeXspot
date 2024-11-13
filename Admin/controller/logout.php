<?php 
include '../config.php';
$admin=new Admin();
session_destroy();
header('location:../login.php');
?>