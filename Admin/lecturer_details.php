<?php
include 'config.php';
$admin = new Admin();
$lid = $_GET['lid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lecturer details</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images\logo\favicon.png"" />
    <style>
        .bio-graph-heading {
            background: #fbc02d;

            color: #fff;
            text-align: center;
            font-style: italic;
            padding: 40px 110px;
            border-radius: 4px 4px 0 0;
            -webkit-border-radius: 4px 4px 0 0;
            font-size: 30px;
            font-weight: 300;
            border-radius: 12px;
            margin-top: 9px;
        }



        .bio-graph-info h1 {
            font-size: 22px;

            font-weight: 300;
            margin: 5px 0 20px;
        }

        .bio-row {
            width: 50%;
            float: left;
            margin-bottom: 10px;
            padding: 0 15px;
        }

        .bio-row p span {
            width: 100px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include 'header.php' ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <?php include 'sidebar.php' ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <?php
                        $stmt = $admin->ret("SELECT * FROM `lecturer` INNER JOIN `course` ON course.c_id=lecturer.c_id WHERE `l_id`='$lid'");
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>

                        <div class="container bootstrap snippets bootdey">
                            <div class="row card">

                                <div class="profile-info col-md-12">

                                    <div class="panel">
                                        <div class="bio-graph-heading">
                                            Lecturer Details
                                        </div>
                                        <div class="panel-body bio-graph-info">
                                            <h1>Information</h1>
                                            <div class="row">
                                                <div class="bio-row">
                                                    <p><span>Name </span>: <?php echo $row['l_name'] ?></p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Phone </span>: <?php echo $row['phone_no'] ?></p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Email </span>: <?php echo $row['l_email'] ?></p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Address</span>: <?php echo $row['address'] ?></p>
                                                </div>
                                               
                                                <div class="bio-row">
                                                    <p><span>Selected Course </span>: <?php echo $row['c_name'] ?></p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row">


                                            <div class="col-md-6">
                                                <div class="panel">
                                                    <div class="panel-body">

                                                        <div class="bio-desk">

                                                            <a href="../Lecturers/controller/<?php echo $row['experience'] ?>" target="_blank">
                                                                <img src="images/pf.jpg" alt="" style="width: 200px; height: 200px;">
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>