<?php
include 'config.php';
$admin = new Admin();
$cid = $_GET['c_id'];
$stid=$_SESSION['stid'];
if(!isset($_SESSION['stid'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamslms.dreamguystech.com/html/course-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 06:27:03 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>CodeXspot video</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets\img\logo\favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper">

        <?php include 'header.php' ?>

<!-- 
        <div class="breadcrumb-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="breadcrumb-list">
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Courses</li>
                                    <li class="breadcrumb-item active" aria-current="page">All Courses</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


        <section class="course-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">

                        <div class="showing-list">
                            <div class="row">
                                <div class="col-lg-6">

                                </div>
                                <div class="col-lg-6">
                                    <div class="show-filter add-course-info">
                                        <form action="#">
                                            <div class="row gx-2 align-items-center">
                                                <div class="col-md-6 col-item">

                                                </div>
                                                <div class="col-md-6 col-lg-6 col-item">
                                                    <div class="form-group select-form mb-0">
                                                        <select class="form-select select" id="sel1" name="sellist1" onchange="selected_model(this.value)">
                                                            <option>Select Subject </option>
                                                            <?php
                                                            if (isset($_GET['c_id']));
                                                            $c_id = $_GET['c_id'];
                                                            $stmt = $admin->ret("SELECT * FROM `subject` WHERE `c_id`='$c_id'");
                                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                                <option value="<?php echo $row['s_id']?>"><?php echo $row['s_name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
$stmt=$admin->ret("SELECT * FROM `membership` WHERE `st_id`='$stid' ");
$n=$stmt->rowCount();
if($n>0){
$row=$stmt->fetch(PDO::FETCH_ASSOC);
if($row['pay_status']=='Active'){
?> 
                        <div class="row" style="width:1200px;" id="model_filter">
                            <?php
                            if (isset($_GET['c_id'])) {
                                $c_id = $_GET['c_id'];
                                $stmt = $admin->ret("SELECT * FROM `upload_video` INNER JOIN `course` ON course.c_id=upload_video.c_id INNER JOIN `subject` ON subject.s_id=upload_video.s_id INNER JOIN `lecturer` ON lecturer.l_id=upload_video.l_id WHERE upload_video.c_id='$c_id' ");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                    <div class="col-lg-4 col-md-6 d-flex">
                                        <div class="course-box course-design d-flex ">
                                            <div class="video-sec vid-bg">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="lecturers/controller/<?php echo $row['u_video'] ?>" class="video-thumbnail" data-fancybox="">
                                                            <div class="play-icon">
                                                                <i class="fa-solid fa-play"></i>
                                                            </div>
                                                            <img class="" src="assets/img/video.jpg" alt="">
                                                        </a>
                                                        <div class="video-details">
                                                            <div class="course-fee">
                                                                <h2><?php echo $row['s_name'] ?></h2>

                                                            </div>

                                                        </div>
                                                        <div class="product-content">
                                                            <div class="course-group d-flex">
                                                                <div class="course-group-img d-flex">
                                                                    <a href="lecturers/controller/<?php echo $row['u_video'] ?>"><img src="assets/img/user/user2.jpg" alt="" class="img-fluid"></a>
                                                                    <div class="course-name">
                                                                        <h4><a href="lecturers/controller/<?php echo $row['u_video'] ?>"><?php echo $row['l_name'] ?></a></h4>
                                                                        <p>Instructor</p>
                                                                    </div>
                                                                </div>
                                                                <div class="course-share d-flex align-items-center justify-content-center">
                                                                    <a href="#rate"><i class="fa-regular fa-heart"></i></a>
                                                                </div>
                                                            </div>
                                                            <h3 class="title"><a href="lecturers/controller/<?php echo $row['u_video'] ?>"><?php echo $row['desc'] ?></a></h3>
                                                            <hr>

                                                            <div class="all-btn all-category d-flex align-items-center">
                                                                <a href="lecturers/controller/<?php echo $row['u_video'] ?>" class="btn btn-primary"><i class="fa fa-eye"></i> View Video</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>

                        </div>
<?php }} else{ ?>
    <div class="row" style="width:1200px;" id="model_filter">
                            <?php
                            if (isset($_GET['c_id'])) {
                                $c_id = $_GET['c_id'];
                                $stmt = $admin->ret("SELECT * FROM `upload_video` INNER JOIN `course` ON course.c_id=upload_video.c_id INNER JOIN `subject` ON subject.s_id=upload_video.s_id INNER JOIN `lecturer` ON lecturer.l_id=upload_video.l_id WHERE upload_video.c_id='$c_id' ");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                    <div class="col-lg-4 col-md-6 d-flex">
                                        <div class="course-box course-design d-flex ">
                                            <div class="video-sec vid-bg">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="pricing-plan.php" class="video-thumbnail" data-fancybox="">
                                                            <div class="play-icon">
                                                                <i class="fa-solid fa-play"></i>
                                                            </div>
                                                            <img class="" src="assets/img/video.jpg" alt="">
                                                        </a>
                                                        <div class="video-details">
                                                            <div class="course-fee">
                                                                <h2><?php echo $row['s_name'] ?></h2>

                                                            </div>

                                                        </div>
                                                        <div class="product-content">
                                                            <div class="course-group d-flex">
                                                                <div class="course-group-img d-flex">
                                                                    <!-- <a href=""><img src="assets/img/user/user2.jpg" alt="" class="img-fluid"></a> -->
                                                                    <div class="course-name">
                                                                        <h4><a href=""><?php echo $row['l_name'] ?></a></h4>
                                                                        <p>Instructor</p>
                                                                    </div>
                                                                </div>
                                                                <div class="course-share d-flex align-items-center justify-content-center">
                                                                    <a href="#rate"><i class="fa-regular fa-heart"></i></a>
                                                                </div>
                                                            </div>
                                                            <h3 class="title"><a href="#"><?php echo $row['desc'] ?></a></h3>
                                                            <hr>

                                                            <div class="all-btn all-category d-flex align-items-center">
                                                                <a href="pricing-plan.php" class="btn btn-primary"><i class="fa fa-eye"></i> View Video</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>

                        </div>
                        <?php } ?>


                    </div>
                    <div class="col-lg-3 theiaStickySidebar">
                        <div class="filter-clear">
                            <div class="clear-filter d-flex align-items-center">
                                <h4><i class="feather-filter"></i>Filters</h4>
                                <div class="clear-text">
                                    <p>CLEAR</p>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php include 'footer.php' ?>
    </div>
    <script>
        function selected_model(s_id) {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    document.getElementById("model_filter").innerHTML = xmlhttp.responseText;

                }
            }
            xmlhttp.open("GET", "ajax_video.php?s_id=" + s_id + "&c_id=" + <?php echo $c_id ?>, true);
            xmlhttp.send();
        }
    </script>

    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

    <script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from dreamslms.dreamguystech.com/html/course-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 06:27:03 GMT -->

</html>