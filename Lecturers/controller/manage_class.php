<?php 
include '../config.php';
$admin=new Admin();
$lid=$_SESSION['lid'];
if(isset($_POST['add'])){
   echo $c_id=$_POST['c_id'];
    $s_id=$_POST['s_id'];
    $add='upload/'.basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'],$add);
    $discription=$_POST['discription'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $stmt=$admin->cud("INSERT INTO `manage_class` (`l_id`,`c_id`,`s_id`,`img`,`discription`,`m_date`,`m_time`)VALUES('$lid','$c_id','$s_id','$add','$discription','$date','$time')",'insterted');
    echo "<script>alert('Class Added Successfull');window.location='../manage_class.php';</script>";

}
?>