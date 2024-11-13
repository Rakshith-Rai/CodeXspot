<?php 
include '../config.php';
$admin=new Admin();
$stid=$_SESSION['stid'];
if(isset($_POST['feed'])){
    $lid=$_POST['lid'];
    $msg=$_POST['msg'];
    $stmt=$admin->cud("INSERT INTO `feedback`(`st_id`, `l_id`, `message`) VALUES ('$stid','$lid','$msg')",'inserted');
    echo "<script>alert('Thank You For Feedback');window.location='../class_link.php'</script>";


}
?>