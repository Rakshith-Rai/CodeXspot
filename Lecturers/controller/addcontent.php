<?php
include '../config.php';
$admin=new Admin();
$lid=$_SESSION['lid'];
if(isset($_POST['add'])){
    $cid=$_POST['c_id'];
    $sid=$_POST['s_id'];
   
    $add='upload/'.basename($_FILES['addcontent']['name']);
    move_uploaded_file($_FILES['addcontent']['tmp_name'],$add);
    $discription=$_POST['discription'];
    // $stmt=$admin->ret("SELECT * FROM `add_content` WHERE `c_id`='$cid'");
    // $num=$stmt->rowCount();
    // if($num>0){
    //     echo "<script>alert('Your Not Able to take this course');window.location='../addcontent.php'</script>";
    // }else{
$stmt=$admin->cud("INSERT INTO `add_content`(`l_id`,`c_id`,`s_id`,`pdf`,`disc`)VALUES('$lid','$cid','$sid','$add','$discription')",'inserted');
echo "<script>alert('Content Uploaded Succesffully');window.location='../addcontent.php'</script>";
}
// }
?>
