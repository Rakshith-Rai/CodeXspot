<?php 
include '../config.php';
$admin=new Admin();
if(isset($_POST['payment'])){
 $duration=$_POST['duration'];  
 $amount=$_POST['amount'];
 $details=$_POST['details'];
 $information=$_POST['var'];
 $information=implode(",",$information);
 $stmt=$admin->cud("INSERT INTO `payment`(`p_duration`,`amount`,`details`,`info`)VALUES('$duration','$amount','$details','$information')",'Inserted');
 echo "<script>alert('payment details inserted');window.location='../managepayment.php';</script>";
}

?>