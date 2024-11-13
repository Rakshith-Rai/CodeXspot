<?php
include '../config.php';
$admin=new Admin();
$lid=$_SESSION['lid'];
if(isset($_POST['upload'])){
    $cid=$_POST['c_id'];
    $sid=$_POST['s_id'];
    
    $upload='upload/'.basename($_FILES['video']['name']);
    move_uploaded_file($_FILES['video']['tmp_name'],$upload);
    $discription=$_POST['discription'];
$stmt=$admin->cud("INSERT INTO `upload_video`(`l_id`,`c_id`,`s_id`,`u_video`,`desc`)VALUES('$lid','$cid','$sid','$upload','$discription')",'inserted');
echo "<script>alert('Video Uploaded Succesffully');window.location='../uploadvideo.php'</script>";
}
?>