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
    <title>Lecturer profile</title>
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
    <link rel="shortcut icon" href="images\logo\favicon.png"/>
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
                                        <div class="row">
  <div style="flex: 1;">
    <h1>Information</h1>
  </div>
  <div style="margin-right: 20px;">
    <button class="btn btn-light mt-3" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Edit <i class="mdi mdi-pencil"></i></button>
  </div>
</div>

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
                                                <!-- <div class="bio-row">
                                                    <p><span>College Name </span>: <?php echo $row['college_name'] ?></p>
                                                </div> -->
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

                                                            <a href="controller/<?php echo $row['experience'] ?>" target="_blank">
                                                                <img src="controller/<?php echo $row['experience'] ?>" alt="" style="width: 200px; height: 200px;">
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
              

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="controller/update_profile.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="lid" value="<?php echo $lid ?>" id="">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $row['l_name'] ?>" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" name="email" value="<?php echo $row['l_email'] ?>" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" name="phoneno" value="<?php echo $row['phone_no'] ?>" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Address:</label>
            <input type="text" class="form-control" name="add" value="<?php echo $row['address'] ?>" id="recipient-name">
          </div>
          <!-- <div class="form-group">
            <label for="recipient-name" class="col-form-label">College Name:</label>
            <input type="text" class="form-control" name="clgname" value="<?php echo $row['college_name'] ?>" id="recipient-name">
          </div> -->
          <div class="form-group">
              <label>Select Course</label>
              <select name="c_id" class="form-control">
                <option value="">Select Course</option>
                <?php
                  $stmt1 = $admin->ret("SELECT * FROM `course`");
                  while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                    // Check if the current course is the one selected in the loop iteration
                    $selected = ($row1['c_id'] == $row['c_id']) ? 'selected' : '';
                    ?>
                    <option value="<?php echo $row1['c_id'] ?>" <?php echo $selected ?>>
                      <?php echo $row1['c_name'] ?>
                    </option>
                <?php } ?>
              </select>
            </div>
          <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img" class="file-upload-default" >
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" value="<?php echo $row['experience']?>" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="upadte_profile" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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