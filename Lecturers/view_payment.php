<?php
include 'config.php';
$admin = new Admin();
$lid = $_SESSION['lid'];
$start_date=0;
$end_date=0;
if (isset($_POST['report'])) {
    $start_date = date('Y-m', strtotime($_POST['date1'])); // Convert start date to year and month format

    if (!empty($_POST['date2'])) {
        $end_date = date('Y-m', strtotime($_POST['date2'])); // Convert end date to year and month format
    } else {
        $end_date = $start_date; // Use start date as end date if only one month is selected
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Payment</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images\logo\favicon.png"/>
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
                                <h6 class="mb-4">Basic Form</h6>
                                <form action="view_payment.php" method="POST">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Start Month</label>
                                        <input type="month" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="date1">

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
                                    <h6 class="mb-0">Recent Sales</h6>
                                    <a href="">Show All</a>
                                </div>

                                <div class="table-responsive">
                                    <table
                                        class="table text-start align-middle table-bordered table-hover mb-0">
                                        <thead>
                                            <tr class="text-dark">
                                                <th scope="col">SI.NO</th>
                                                <th scope="col">AMOUNT</th>
                                                <th scope="col">MONTH</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            $stmt = $admin->ret("SELECT * FROM `lecturer_payment` WHERE `l_id`='$lid' AND DATE_FORMAT(`date`, '%Y-%m') BETWEEN '$start_date' AND '$end_date'");
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo $row['amount'] ?></td>
                                                    <td><?php echo date('F', strtotime($row['date'])) ?></td>
                                                </tr>
                                            <?php } ?>
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
