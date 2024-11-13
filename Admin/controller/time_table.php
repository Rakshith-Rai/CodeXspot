<?php 
include '../config.php';
$admin=new Admin();
if(isset($_POST['time'])){
    $day=$_POST['day'];
    $sid1=$_POST['s_id1'];
    $sid2=$_POST['s_id2'];
    $sid3=$_POST['s_id3'];
    $sid4=$_POST['s_id4'];
    $sid5=$_POST['s_id5'];
    $sid6=$_POST['s_id6'];
    $stmt=$admin->cud("INSERT INTO `time_table`(`day`,`period_1`,`period_2`,`period_3`,`period_4`,`period_5`,`period_6`) VALUES ('$day','$sid1','$sid2','$sid3','$sid4','$sid5','$sid6')",'inserted');
    echo "<script>alert('TiemTabel Inserted');window.location='../time_table.php';</script>";

}
?>