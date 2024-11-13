<?php 
include 'config.php';
$admin =new Admin();

$cid=$_GET['c_id'];

$stmt=$admin->ret("SELECT * FROM `subject` WHERE `c_id`='$cid' ");

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

    echo "<option value='".$row['s_id']."'>".$row['s_name']."</option>";
}


?>