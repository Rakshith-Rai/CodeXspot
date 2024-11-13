<?php 
include 'config.php';
$admin=new Admin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>View payment</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images\logo\favicon.png"" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include 'header.php'?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include 'sidebar.php'?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
           
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">View Payment</h4>
                 
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            SI.NO
                          </th>
                          <th>
                            Student Name
                          </th>
                          <th>
                            Duration
                          </th>
                          <th>
                            Pay Method
                          </th>
                          <th>
                            Transaction Id
                          </th>
                          <th>
                            Card Name
                          </th>
                          <th>
                            Card Number
                          </th>
                          <th>
                            Amount
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $i=1;
                        $stmt=$admin->ret("SELECT * FROM `membership` INNER JOIN `student` ON student.st_id=membership.st_id INNER JOIN `payment`  ON payment.p_id=membership.p_id");
                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <tr>
                          <td>
                            <?php echo $i++?>
                          </td>
                          <td>
                            <?php echo $row['st_name']?>
                          </td>
                          <td>
                          <?php echo $row['p_duration']?> 
                          </td>
                          <td>
                          <?php echo $row['pay_method']?>
                          </td>
                          <td>
                          <?php echo $row['trans_id']?>
                          </td>
                          <td>
                          <?php echo $row['card_name']?>
                          </td>
                          <td>
                          <?php echo $row['card_no']?>
                          </td>
                          <td>
                          ₹<?php echo $row['amount']?>
                          </td>
                          <td>
                          <?php 
                          if($row['pay_method']=='upi'){
                          ?>
                          <button class="btn btn-success">PAID</button>
                          <?php }elseif($row['pay_method']=='card'){ ?>
                            <button class="btn btn-success">PAID</button>
                            <?php } ?>
                          </td>
                        </tr>
                       <?php } ?>
                        
                   
                     
                      </tbody>
                    </table>
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
