<?php
include '../config.php';
$admin=new Admin();
$lid=$_SESSION['lid'];
if(isset($_POST['upload'])){
    $cid=$_POST['c_id'];
    $sid=$_POST['s_id'];
    
    $uid=$_POST['uid'];
    $upload='upload/'.basename($_FILES['video']['name']);
    move_uploaded_file($_FILES['video']['tmp_name'],$upload);
    $discription=$_POST['discription'];
    if ($_FILES['video']['error'] === UPLOAD_ERR_OK) {
        move_uploaded_file($_FILES['video']['tmp_name'], $upload);
        $stmt = $admin->cud("UPDATE `upload_video` SET `u_video` = '$upload', `desc` = '$discription',`c_id`='$cid',`s_id`='$sid'  WHERE `u_id`='$uid'", 'updated');
    } else {
        $stmt = $admin->cud("UPDATE `upload_video` SET  `desc` = '$discription',`c_id`='$cid',`s_id`='$sid' WHERE `u_id`='$uid'", 'updated');
    }
    
 
echo "<script>alert('Video Updated Succesffully');window.location='../view_uploaded_vedio.php'</script>";
}
?>