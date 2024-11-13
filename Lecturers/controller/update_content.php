<?php
include '../config.php';
$admin=new Admin();
$lid=$_SESSION['lid'];
if(isset($_POST['content'])){
    $cid=$_POST['c_id'];
    $sid=$_POST['s_id'];
    
    $ac_id=$_POST['acid'];
    $discription=$_POST['discription'];
    $upload='upload/'.basename($_FILES['pdf']['name']);
    move_uploaded_file($_FILES['pdf']['tmp_name'],$upload);
   
    if ($_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
        move_uploaded_file($_FILES['pdf']['tmp_name'], $upload);
        $stmt = $admin->cud("UPDATE `add_content` SET `pdf` = '$upload', `disc` = '$discription',`c_id`='$cid',`s_id`='$sid'  WHERE `ac_id`='$ac_id'", 'updated');
    } else {
        $stmt = $admin->cud("UPDATE `add_content` SET  `disc` = '$discription',`c_id`='$cid',`s_id`='$sid' WHERE `ac_id`='$ac_id'", 'updated');
    }
    
 
echo "<script>alert('Content Updated Succesffully');window.location='../view_content.php'</script>";
}
?>