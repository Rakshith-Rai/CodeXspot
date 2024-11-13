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
  <title>time table</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">

  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images\logo\favicon.png"" />
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
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">TimeTable</h4>
                  
                  <form class="forms-sample" action="controller/time_table.php" method="POST">
                  <div class="form-group">
                    <label>Select Day</label>
                    <select class="js-example-basic-single w-100" name="day">
                      <option value="Monday">Monday</option>
                      <option value="Thuesday">Thuesday</option>
                      <option value="Wednesday">Wednesday</option>
                      <option value="Thursday">Thursday</option>
                      <option value="Friday">Friday</option>
                      <option value="Saturday">Saturday</option>
                    
                    </select>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-6">
                    <label>Select Subject</label>
                    <select  name="s_id1"   class="js-example-basic-multiple w-100">
                    <option value="">Select Subject</option>
                      <?php $stmt=$admin->ret("SELECT * FROM `subject` ");
                      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                      ?>
                      <option value="<?php echo $row['s_id'] ?>"><?php echo $row['s_name']?></option>
                    <?php } ?>
                    </select>
                  </div> <div class="form-group col-md-6">
                    <label>Select Subject</label>
                    <select  name="s_id2"   class="js-example-basic-multiple w-100">
                    <option value="">Select Subject</option>
                      <?php $stmt=$admin->ret("SELECT * FROM `subject` ");
                      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                      ?>
                      <option value="<?php echo $row['s_id'] ?>"><?php echo $row['s_name']?></option>
                    <?php } ?>
                    </select>
                  </div> 
                  </div>
                  <div class="row">
                  <div class="form-group col-md-6">
                    <label>Select Subject</label>
                    <select  name="s_id3"  class="js-example-basic-multiple w-100">
                    <option value="">Select Subject</option>
                      <?php $stmt=$admin->ret("SELECT * FROM `subject` ");
                      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                      ?>
                      <option value="<?php echo $row['s_id'] ?>"><?php echo $row['s_name']?></option>
                    <?php } ?>
                    </select>
                  </div> <div class="form-group col-md-6">
                    <label>Select Subject</label>
                    <select  name="s_id4"  class="js-example-basic-multiple w-100">
                    <option value="">Select Subject</option>
                      <?php $stmt=$admin->ret("SELECT * FROM `subject` ");
                      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                      ?>
                      <option value="<?php echo $row['s_id'] ?>"><?php echo $row['s_name']?></option>
                    <?php } ?>
                    </select>
                  </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-6">
                    <label>Select Subject</label>
                    <select  name="s_id5"  class="js-example-basic-multiple w-100">
                    <option value="">Select Subject</option>
                      <?php $stmt=$admin->ret("SELECT * FROM `subject` ");
                      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                      ?>
                      <option value="<?php echo $row['s_id'] ?>"><?php echo $row['s_name']?></option>
                    <?php } ?>
                    </select>
                  </div> <div class="form-group col-md-6">
                    <label>Select Subject</label>
                    <select  name="s_id6"  class="js-example-basic-multiple w-100">
                    <option value="">Select Subject</option>
                      <?php $stmt=$admin->ret("SELECT * FROM `subject` ");
                      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                      ?>
                      <option value="<?php echo $row['s_id'] ?>"><?php echo $row['s_name']?></option>
                    <?php } ?>
                    </select>
                  </div>
                  </div>
                    
                  
                    <button type="submit" class="btn btn-primary mr-2" name="time">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
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
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
