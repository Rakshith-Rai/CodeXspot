<?php
include 'config.php';
$admin = new Admin();
$lid = $_SESSION['lid'];
if(!isset($_SESSION['lid'])){
  header('location:login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>View requested link</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
</head>
<link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
<!-- endinject -->
<!-- Plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="css/vertical-layout-light/style.css">
<!-- endinject -->
<link rel="shortcut icon" href="images\logo\favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php
    include 'header.php';
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php
      include 'sidebar.php';
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">



            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Requested class</h4>
                 
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            SI.No
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Course
                          </th>
                          <th>
                            Subject
                          </th>
                          <th>
                            Date
                          </th>
                          <th>
                            Time
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
  <?php
  $i=1;
  $stmt = $admin->ret("SELECT * FROM `join_class` INNER JOIN `course` ON course.c_id=join_class.c_id INNER JOIN `subject` ON subject.s_id=join_class.s_id INNER JOIN `student` ON student.st_id=join_class.st_id INNER JOIN `manage_class` ON manage_class.mc_id=join_class.mc_id WHERE join_class.l_id='$lid'");
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  ?>
    <tr>
      <td>
      <?php echo $i++ ?>
      </td>
      <td>
        <?php echo $row['st_name'] ?>
      </td>
      <td>
        <?php echo $row['c_name'] ?>
      </td>
      <td>
        <?php echo $row['s_name'] ?>
      </td>
      <td>
        <?php echo $row['m_date'] ?>
      </td>
      <td>
        <?php echo $row['m_time'] ?>
      </td>
      <td>
        <?php
        if ($row['j_status'] == 'pending') {
        ?>
          <a href="controller/update_status.php?accept=<?php echo $row['j_id'] ?>&st_id=<?php echo $row['st_id'] ?>"><button class="btn btn-success">Accept <i class="mdi mdi-check"></i></button></a>
          <a href="controller/update_status.php?cancel=<?php echo $row['j_id'] ?>&st_id=<?php echo $row['st_id'] ?>"><button class="btn btn-danger">Reject <i class="mdi mdi-delete"></i></button></a>
        <?php } elseif ($row['j_status'] == 'canceled') { ?>
          <button class="btn btn-danger">Cancelled</button>
        <?php } elseif ($row['j_status'] == 'accepted') {  ?>
          <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal<?php echo $row['j_id'] ?>" data-whatever="@mdo">Add Link</button>
        <?php } ?>
      </td>
    </tr>
  <?php } ?>
</tbody>

<?php
$stmt = $admin->ret("SELECT * FROM `join_class` INNER JOIN `course` ON course.c_id=join_class.c_id INNER JOIN `subject` ON subject.s_id=join_class.s_id INNER JOIN `manage_class` ON manage_class.mc_id=join_class.mc_id WHERE join_class.l_id='$lid'");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
  <div class="modal fade" id="exampleModal<?php echo $row['j_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="controller/class_link.php" method="POST">
            <input type="hidden" name="st_id" id="" value="<?php echo $row['st_id'] ?>">
            <input type="hidden" name="c_id" value="<?php echo $row['c_id'] ?>" id="">
            <input type="hidden" name="s_id" value="<?php echo $row['s_id'] ?>" id="">
            <input type="hidden" name="mc_id" value="<?php echo $row['mc_id'] ?>" id="">
            <input type="hidden" name="j_id" value="<?php echo $row['j_id'] ?>" id="">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Recipient:</label>
              <input type="text" class="form-control" name="link" id="recipient-name">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="clink">Send message</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>

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
  <script>
    function displaySelectedCourse() {
      var selectElement = document.querySelector('[name="c_id"]');
      var selectedCourse = selectElement.value;
      var selectedCourseSpan = document.getElementById("selectedCourse");
      selectedCourseSpan.textContent = selectedCourse;
    }
  </script>
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
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- End custom js for this page-->

</body>

</html>