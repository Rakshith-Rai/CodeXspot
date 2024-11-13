<?php
include 'config.php' ;
$admin=new Admin();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Manage lecturer</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- endinject -->
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
    <?php  include 'header.php'?>
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
                  <h4 class="card-title">Lecturer Details</h4>
                 
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            SI.No
                          </th>
                          <th>
                            Lecturer name
                          </th>
                          <th>
                            Email
                          </th>
                         
                         
                       
                         <th>
                             Action
                         </th>
                          <th>
                            View
                          </th>
                          <th>
                            Pay
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $i=1;
                          $stmt=$admin->ret("SELECT * FROM `lecturer`");
                          while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

                          
                          ?>
                        <tr>
                          <td>
                          <?php echo $i++?>
                          </td>
                          <td>
                            <?php echo $row['l_name']
                            ?>
                          </td>
                          <td>
                            <?php echo $row['l_email'] ?>
                          </td>
                          
                         
                          <td>
                            <?php if($row['status']=='pending'){?>
                          <a href="controller/updatestatus.php?lid=<?php echo $row['l_id']?>"><button class="btn btn-success">Accept</button></a>
                          
                          <a href="controller/updatestatus.php?l_id=<?php echo $row['l_id']?>"><button class="btn btn-danger">Reject</button></a>

                        <?php }elseif($row['status']=='Accepted'){ ?>   
                          <button class="btn btn-success">Accepted</button>
                          
                          <?php }elseif($row['status']=='Rejected'){ ?>
                            <button class="btn btn-danger">Rejected</button>
                            <?php }?>
                            

                      </td> 
                      <td><a href="lecturer_details.php?lid=<?php echo $row['l_id']?>"><i class="mdi mdi-eye" style="font-size: 30px;color:#22A699"></i></a></td>  
                      <td>
    <?php
    $current_date = date('Y-m-d');
    $payment_stmt = $admin->ret("SELECT * FROM `lecturer_payment` WHERE `l_id`='$row[l_id]' ORDER BY `lp_id` DESC LIMIT 1");
    
    if ($payment_stmt && $payment_stmt->rowCount() > 0) {
        $payment_row = $payment_stmt->fetch(PDO::FETCH_ASSOC);
        $payment_date = $payment_row['date'];
        $payment_status = $payment_row['lp_status'];

        $payment_button_text = ($payment_status == 'paid' && strtotime($payment_date . ' +1 month') > strtotime($current_date)) ? 'Paid' : 'Pay';

        if ($payment_button_text == 'Paid') {
            echo '<button class="btn btn-success">' . $payment_button_text . '</button>';
        } else {
            echo '<button class="btn btn-light" data-toggle="modal" data-target="#exampleModal' . $row['l_id'] . '" data-whatever="@mdo">' . $payment_button_text . '</button>';
        }
    } else {
        echo '<button class="btn btn-light" data-toggle="modal" data-target="#exampleModal' . $row['l_id'] . '" data-whatever="@mdo">Pay</button>';
    }
    ?>               
                     </tr>
                  

<div class="modal fade" id="exampleModal<?php echo $row['l_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PayMent</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="controller/payment.php" method="POST">
          <input type="hidden" name="l_id" value="<?php echo $row['l_id'] ?>" id="">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Account Number:</label>
            <input type="text" class="form-control" readonly name="amt" value="<?php echo $row['acc_no'] ?>" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">IFSC CODE:</label>
            <input type="text" class="form-control" readonly name="amt" value="<?php echo $row['ifsc'] ?>" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Payment:</label>
            <input type="text" class="form-control" required  name="amt" id="recipient-name">
          </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="pay" class="btn btn-primary">Submit</button>
      </div>
      
      </form>
    </div>
  </div>
</div>
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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
