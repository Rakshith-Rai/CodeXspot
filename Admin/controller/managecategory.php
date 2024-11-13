<?php 
include '../config.php';
$admin=new Admin();
if(isset($_POST['course'])){
    $c_name=$_POST['c_name'];
    $stmt=$admin->ret("SELECT * FROM `course` WHERE `c_name`='$c_name'");
    $num=$stmt->rowCount();
    if($num>0){
        echo "<script>alert('Entered Course Name Already Exists');window.location='../managecategory.php';</script>";

    }else{
    $stmt=$admin->cud("INSERT INTO `course`(`c_name`)VALUES('$c_name')",'Inserted');
    echo "<script>alert('Course Inserted');window.location='../managecategory.php';</script>";
}
}
if(isset($_POST['subject'])){
    $c_id=$_POST['c_id'];
    $s_name=$_POST['s_name'];
    $stmt=$admin->ret("SELECT * FROM `subject` WHERE `s_name`='$s_name'");
    $num=$stmt->rowCount();
    if($num>0){
        echo "<script>alert('Entered Subject Name Already Exists');window.location='../managecategory.php';</script>";

    }else{
    $stmt=$admin->cud("INSERT INTO `subject`(`c_id`,`s_name`)VALUES('$c_id','$s_name')",'Inserted');
    echo "<script>alert('Subject Inserted');window.location='../managecategory.php';</script>";
}
}
?>