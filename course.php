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

<!-- Mirrored from dreamslms.dreamguystech.com/html/course-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 06:26:58 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>CodeXspot Course</title>

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


        <!-- <div class="breadcrumb-bar mt-5">
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
                                    <div class="show-filter add-course-info ">
                                        <form action="#">
                                            <div class="row gx-2 align-items-center">
                                                <div class="col-md-6 col-item">

                                                </div>
                                                <div class="col-md-6 col-lg-6 col-item">
                                                    <div class="form-group select-form mb-0">
                                                        <select class="form-select select" name="sellist1" onchange="selected_model(this.value)">
                                                            <option>Select Subject</option>
                                                            <?php
                                                            if (isset($_GET['c_id'])) {
                                                                $c_id = $_GET['c_id'];
                                                                $stmt = $admin->ret("SELECT * FROM `subject` WHERE `c_id`='$c_id'");
                                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                                    <option value="<?php echo $row['s_id'] ?>"><?php echo $row['s_name'] ?></option>
                                                            <?php }
                                                            }  ?>
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
$stmt = $admin->ret("SELECT * FROM `membership` WHERE `st_id`='$stid'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row && is_array($row) && $row['pay_status'] == 'Active') {
    // Your code here

?>
                  <div class="row" id="model_filter">
                            <?php
                            if (isset($_GET['c_id'])) {
                                $c_id=$_GET['c_id'];
                                $stmt = $admin->ret("SELECT * FROM `add_content` INNER JOIN `course` ON course.c_id=add_content.c_id INNER JOIN `subject` ON subject.s_id=add_content.s_id INNER JOIN `lecturer` ON lecturer.l_id=add_content.l_id WHERE course.c_id='$c_id'");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                    <div class="col-lg-12 col-md-12 d-flex" >
                                        <div class="course-box course-design list-course d-flex">
                                            <div class="product">
                                                <div class="product-img">
                                                    <a href="lecturers/controller/<?php echo $row['pdf'] ?>" target="_blank">
                                                        <img class="img-fluid" alt="" src="assets/img/pdf.jpg">
                                                    </a>

                                                </div>
                                                <div class="product-content">
    <div class="head-course-title">
        <h3 class="title"><a href="lecturers/controller/<?php echo $row['pdf'] ?>" target="_blank"><?php echo $row['s_name'] ?></a></h3>
        <div class="all-btn all-category d-flex align-items-center g-5">
            <a href="lecturers/controller/<?php echo $row['pdf'] ?>" target="_blank" class="btn btn-primary">View <i class="fa fa-eye"></i></a>
            <a href="lecturers/controller/<?php echo $row['pdf'] ?>" class="btn btn-primary" download>  <i class="fas fa-download"></i> Download </a>
        </div>
    </div>
    <div class="course-info border-bottom-0 pb-0  align-items-center">
        <div class="rating-img d-flex align-items-center">
            <img src="assets/img/icon/icon-01.svg" alt="">
            <p><?php echo $row['c_name'] ?></p>
        </div>
        <div class="course-view d-flex align-items-center">
            <img src="assets/img/icon/icon-02.svg" alt="">
            <p><?php echo $row['disc'] ?></p>
        </div>
    </div>
    <div class="rating"></div>
    <div class="course-group d-flex mb-0">
        <div class="course-group-img d-flex">
            <!-- <a href="instructor-profile.html"><img src="assets/img/user/user1.jpg" alt="" class="img-fluid"></a> -->
            <div class="course-name">
                <h4><a href=""><?php echo $row['l_name'] ?></a></h4>
                <p>Instructor</p>
            </div>
        </div>
        <div class="course-share d-flex align-items-center justify-content-center">
            <a href="#rate"><i class="fa-regular fa-heart"></i></a>
        </div>
    </div>
</div>

                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>

                        </div>
<?php }else{ ?>
    <div class="row" id="model_filter">
                            <?php
                            if (isset($_GET['c_id'])) {
                                $c_id=$_GET['c_id'];
                                $stmt = $admin->ret("SELECT * FROM `add_content` INNER JOIN `course` ON course.c_id=add_content.c_id INNER JOIN `subject` ON subject.s_id=add_content.s_id INNER JOIN `lecturer` ON lecturer.l_id=add_content.l_id WHERE course.c_id='$c_id'");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                    <div class="col-lg-12 col-md-12 d-flex" >
                                        <div class="course-box course-design list-course d-flex">
                                            <div class="product">
                                                <div class="product-img">
                                                    <a href="pricing-plan.php">
                                                        <img class="img-fluid" alt="" src="assets/img/pdf.jpg">
                                                    </a>

                                                </div>
                                                <div class="product-content">
    <div class="head-course-title">
        <h3 class="title"><a href="pricing-plan.php"><?php echo $row['s_name'] ?></a></h3>
        <div class="all-btn all-category d-flex align-items-center g-5">
            <a href="pricing-plan.php" id="target" class="btn btn-primary">View <i class="fa fa-eye"></i></a>
            <a href="pricing-plan.php" class="btn btn-primary" >  <i class="fas fa-download"></i> Download </a>
        </div>
    </div>
    <div class="course-info border-bottom-0 pb-0  align-items-center">
        <div class="rating-img d-flex align-items-center">
            <img src="assets/img/icon/icon-01.svg" alt="">
            <p><?php echo $row['c_name'] ?></p>
        </div>
        <div class="course-view d-flex align-items-center">
            <img src="assets/img/icon/icon-02.svg" alt="">
            <p><?php echo $row['disc'] ?></p>
        </div>
    </div>
    <div class="rating"></div>
    <div class="course-group d-flex mb-0">
        <div class="course-group-img d-flex">
            <!-- <a href="instructor-profile.html"><img src="assets/img/user/user1.jpg" alt="" class="img-fluid"></a> -->
            <div class="course-name">
                <h4><a href=""><?php echo $row['l_name'] ?></a></h4>
                <p>Instructor</p>
            </div>
        </div>
        <div class="course-share d-flex align-items-center justify-content-center">
            <a href="#rate"><i class="fa-regular fa-heart"></i></a>
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
                   
                </div>
            </div>
        </section>


      <?php include 'footer.php' ?>

    </div>


    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
<script>
     // Add a click event listener to the document
  document.addEventListener("click", function(event) {
    // Check if the target element or any of its ancestors have the id "disabledDiv"
    if (event.target.closest("#disabledDiv")) {
      // Display an alert message
      alert("Click events are disabled within this div.");
    }
  });
</script>
    <script src="assets/js/script.js"></script>
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
            xmlhttp.open("GET", "ajax_course.php?s_id=" + s_id + "&c_id=" + <?php echo $c_id ?>, true);
            xmlhttp.send();
        }
    </script>
</body>

<!-- Mirrored from dreamslms.dreamguystech.com/html/course-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 06:27:00 GMT -->

</html>