<?php 
include 'config.php';
$admin=new Admin();
if(!isset($_SESSION['lid'])){
  header('location:login.php');
  }
  $lid=$_SESSION['lid'];
  $st=$admin->ret("SELECT * FROM `lecturer` inner join `course` on course.c_id=lecturer.c_id where `l_id`='$lid'");
  $ro=$st->fetch(PDO::FETCH_ASSOC);
  $cid=$ro['c_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Manage class</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images\logo\favicon.png"/>
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
          
          
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Content</h4>
                  
                  <form class="forms-sample" action='controller/manage_class.php' method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                  <input type="text" value="<?php echo $ro['c_name'] ?>" readonly name="c_id" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" required >
                  <input type="hidden" value="<?php echo $ro['c_id'] ?>" readonly name="c_id" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" required >
                  <div class="form-group">
                    <label>Select Course</label>
                    <select  name="s_id" class="js-example-basic-multiple w-100" >
                    <option value="" hidden>Select Course</option>
                      <?php
                     
                      
                      
                      $stmt=$admin->ret("SELECT * FROM `subject` INNER JOIN `course` ON course.c_id=subject.c_id where subject.c_id='$cid'");
                      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                      ?>
                      <option value="<?php echo $row['s_id'] ?>"><?php echo $row['s_name']?></option>
                    <?php } ?>
                    </select>
                  </div>
                 
                  
                  
                  <div class="form-group">
  <label>Add Content</label>
  <div class="input-group col-xs-12">
    <input type="file" name="img" class="file-upload-default" accept="image/*" >
    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" required>
    <span class="input-group-append">
      <button class="file-upload-browse btn btn-primary" type="button">Add</button>
    </span>
  </div>
</div>

                   
                   
                   <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleTextarea1">Date</label>
                      <input class="form-control" type="date" name="date" id="exampleTextarea1" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleTextarea1">Time</label>
                      <input class="form-control" type="time" name="time" id="exampleTextarea1" required>
                    </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Discription</label>
                      <textarea class="form-control" name="discription" id="exampleTextarea1" rows="4" required></textarea>
                    </div>
                    <button type="submit" name="add" class="btn btn-primary mr-2">Submit</button>
          
                  </form>
                </div>
              </div>
            </div>
         
          
          
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <script>
        function showUser(bid) {
        
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;

                }
            }
            xmlhttp.open("GET", "ajax_subject.php?c_id=" + bid, true);
            xmlhttp.send();
        }
    </script>
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
