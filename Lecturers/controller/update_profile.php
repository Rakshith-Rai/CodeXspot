<?php
include '../config.php';
$admin = new Admin();
if (isset($_POST['upadte_profile'])) {
    $lid = $_POST['lid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $address = $_POST['add'];
    // $collegename = $_POST['clgname'];
    $experience = 'upload/' . basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'], $experience);
    $course = $_POST['c_id'];

    $status = 'pending';

    if ($_FILES['img']['error'] === UPLOAD_ERR_OK) {
        move_uploaded_file($_FILES['img']['tmp_name'], $image);
        $stmt = $admin->cud("UPDATE `lecturer` SET `c_id`='$course',`l_name`='$name',`l_email`='$email',`phone_no`='$phoneno',`address`='$address',`experience`='$experience' WHERE `l_id`='$lid'", 'updated');
    } else {
$stmt = $admin->cud("UPDATE `lecturer` SET `c_id`='$course',`l_name`='$name',`l_email`='$email',`phone_no`='$phoneno',`address`='$address' WHERE `l_id`='$lid'", 'updated');
    }


   echo "<script>alert('Updated Successfull');window.location='../profile.php';</script>";
}
