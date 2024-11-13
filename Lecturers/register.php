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
  <title>Lecturer register</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
 
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
 

  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images\logo\favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images\logo\logo1.png" alt="logo">
              </div>
              <h4>Hello Teacher! New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" action="controller/register.php" method="POST" enctype="multipart/form-data" novalidate>
              <div class="row">
                <div class="form-group col-md-6">
                  
                  <input type="text" name="name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" required  pattern="[a-zA-Z][a-zA-Z ]{2,}">
                                <div class="invalid-feedback">
                  * Valid  name is required.
                </div>
                </div>
                <div class="form-group col-md-6">
                  
                  <input type="tel"  name="phoneno" class="form-control form-control-lg" id="exampleInputPhoneNo" placeholder="Phone no" required pattern="[0-9]{10}">
                                <div class="invalid-feedback">
                  * Valid  Number is required.
                </div>
                </div>
                </div>
                <div class="form-group">
                <input type="email"  name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                <div class="invalid-feedback">
                  * Valid  Email is required.
                </div>
                </div>
                <div class="form-group">
                  <input type="text"  name="add" class="form-control form-control-lg" id="exampleInputAddress" placeholder="Address" required>
                                <div class="invalid-feedback">
                  * Valid  address is required.
                </div>
                </div>
               
                <div class="form-group">
                      <label>Experience</label>
                      <input type="file" name="img" class="file-upload-default" required>
                      
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" >                       
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        
                      </div>
                      <div class="invalid-feedback">
                  * Image is required.
                </div>
                    </div>
                    <div class="form-group">
                    <label>Select Course</label>
                    <select class="js-example-basic-single w-100" name="course" required>
                      <option value="">Select Course</option>
                      <?php 
                      $stmt=$admin->ret("SELECT * FROM `course`");
                      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                      ?>
                      <option value="<?php  echo $row['c_id']?>"><?php echo $row['c_name']?></option>
                      <?php } ?>
                    </select>
                    <div class="invalid-feedback">
                  * Select Course is required.
                  </div>
           
                               
                </div>
                <div class="form-group">
                  <input type="text"  name="acc" class="form-control form-control-lg" id="exampleInputCollegeName" placeholder="Account Number" required  pattern="[0-9]{2,}">
                                <div class="invalid-feedback">
                  * Valid  Account Number is required.
                </div>
                </div>
                <div class="form-group">
                  <input type="text"  name="ifsc" class="form-control form-control-lg" id="exampleInputCollegeName" placeholder="IFSC CODE" required  >
                                <div class="invalid-feedback">
                  * Valid  IFSC CODE is required.
                </div>
                </div>
                <div class="form-group">
                  <input type="password"  name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                <div class="invalid-feedback">
                  * Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters
                </div>
                </div>
               
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="register">Register</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  
  <script>
    (function() {
      'use strict'

      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByTagName('form')

        // Loop over them and prevent submission
        Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault()
              event.stopPropagation()
            }
            form.classList.add('was-validated')
          }, false)
        })
      }, false)
    }())
  </script>
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
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
</body>

</html>
