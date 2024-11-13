<?php
include 'config.php';
$admin = new Admin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Codexspot Report</title>
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


                        <div class="col-sm-12 col-xl-11 " style="margin-top: 10px;margin-left: 20px;">
                            <div class="bg-light rounded h-100 p-4">
                                <h6 class="mb-4">Student Reports</h6>
                                <form action="report.php" method="POST">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" name="date1">

                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">End Date</label>
                                        <input type="date" class="form-control" required id="exampleInputPassword1" name='date2'>
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="report">Submit</button>
                                    <button type="submit" class="btn btn-danger">Clear</button>
                                </form>
                            </div>
                        </div>
                        <!-- Recent Sales Start -->
                        <div class="container-fluid pt-4 px-4">
                            <div class="bg-light text-center rounded p-4">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h6 class="mb-0">Recent Salse</h6>
                                    <a href="">Show All</a>
                                </div>
                                <?php
                                $start_date = 0;
                                $end_date = 0;
                                if (isset($_POST['report'])) {
                                    $start_date = $_POST['date1'];
                                    $end_date = $_POST['date2'];
                                }

                                ?>

                                <div class="table-responsive">
                                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                                        <thead>
                                            <tr class="text-dark">
                                                <th scope="col">SI.NO</th>
                                                <th scope="col">STUDENT NAME</th>
                                                <th scope="col">AMOUNT</th>
                                                <th scope="col">DATE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            $stmt = $admin->ret("SELECT * FROM `membership`  INNER JOIN `student` ON student.st_id=membership.st_id INNER JOIN `payment` ON payment.p_id=membership.p_id  WHERE   `pay_date` BETWEEN '$start_date' AND '$end_date' ");
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


                                            ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo $row['st_name'] ?></td>
                                                    <td><?php echo $row['amount'] ?></td>
                                                    <td><?php echo $row['pay_date'] ?></td>
                                                </tr>
                                            <?php }  ?>
                                        </tbody>
                                    </table>
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