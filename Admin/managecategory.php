<?php 
include 'config.php';
$admin=new Admin();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add Course</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
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
    <?php include 'header.php'?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
     
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
     <?php include 'sidebar.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Course</h4>
                  
                  <form class="forms-sample"action="controller/managecategory.php" method="POST" >
                  
                    <div class="form-group">
                      <label for="exampleInputUsername1">Course Name</label>
                      <input type="text" name="c_name" class="form-control" required id="exampleInputUsername1" placeholder="course name">
                    </div>
                   
                    <button type="submit" class="btn btn-primary mr-2" name="course">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            
          <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Subject</h4>
                  
                  <form class="forms-sample"action="controller/managecategory.php" method="POST" >
                  <div class="form-group">
                    <label>Select Course</label>
                    <select class="js-example-basic-multiple w-100" name="c_id" >
                      <option value="">Select Course</option>
                      <?php $stmt=$admin->ret("SELECT * FROM `course` ");
                      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                      ?>
                      <option value="<?php echo $row['c_id'] ?>"><?php echo $row['c_name']?></option>
                    <?php } ?>
                    </select>
                  </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Subject Name</label>
                      <input type="text" name="s_name" class="form-control" required id="exampleInputUsername1" placeholder="subject name">
                    </div>
                   
                    <button type="submit" class="btn btn-primary mr-2" name="subject">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
             <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Courses</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                        <th>
                            SI.No
                          </th>
                          <th>
                            Course Name
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $i=1;

                          $stmt=$admin->ret("SELECT * FROM `course`");
                          while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

                          
                          ?>
                        <tr>
                          <td class="py-1">
                            <?php echo $i++?>
                          </td>
                          <td>
                           <?php echo $row['c_name'] ?>
                          </td>
                          <td> <a href="" data-toggle="modal" data-target="#exampleModal1<?php echo $row['c_id'] ?>" data-whatever="@mdo"><i class="mdi mdi-eye" style="font-size: 30px;color:green" ></i></a> 
                       <a href="controller/deletecategory.php?c_id=<?php echo $row['c_id'] ?>"> <i class="mdi mdi-delete" style="font-size: 30px;color:red"></i></a></td>
                          


<div class="modal fade" id="exampleModal1<?php echo $row['c_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">update category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="controller/updatecategory.php" method="POST">
          <input type="hidden" name="cid" value="<?php echo $row['c_id'] ?>" id="">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">subject:</label>
            <input type="text" class="form-control" name="c_name" value="<?php echo $row['c_name'] ?>" id="recipient-name">
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="course"class="btn btn-primary">update</button>
      </div>
      </form>
    </div>
  </div>
</div>
                        </tr>
                        <?php } ?>
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Subjects</h4>
                 
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                        <th>
                            SI.No
                          </th>
                          <th>
                            Subject Name
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $i=1;

                          $stmt=$admin->ret("SELECT * FROM `subject`");
                          while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

                          
                          ?>
                        <tr>
                          <td class="py-1">
                            <?php echo $i++?>
                          </td>
                          <td>
                           <?php echo $row['s_name'] ?>
                          </td>
                          <td> <a href="" data-toggle="modal" data-target="#exampleModal<?php echo $row['s_id'] ?>" data-whatever="@mdo"><i class="mdi mdi-eye" style="font-size: 30px;color:green" ></i></a> 
                       <a href="controller/deletecategory.php?s_id=<?php echo $row['s_id'] ?>"> <i class="mdi mdi-delete" style="font-size: 30px;color:red"></i></a></td>
                          


<div class="modal fade" id="exampleModal<?php echo $row['s_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">update category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="controller/updatecategory.php" method="POST">
          <input type="hidden" name="sid" value="<?php echo $row['s_id'] ?>" id="">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">subject:</label>
            <input type="text" class="form-control" name="s_name" value="<?php echo $row['s_name'] ?>" id="recipient-name">
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="subject"class="btn btn-primary">update</button>
      </div>
      </form>
    </div>
  </div>
</div>
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
           
            
           
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
         
        </footer>
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
